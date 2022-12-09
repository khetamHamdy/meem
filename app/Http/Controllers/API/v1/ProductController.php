<?php

namespace App\Http\Controllers\API\v1;


use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Category;
use App\Models\ChangePrice;
use App\Models\ChatMessage;
use App\Models\ChatRecipient;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Report;
use App\Models\Token;
use App\Models\User;
use App\Models\Setting;
use App\Notifications\ProductNotification;
use App\Traits\imageTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Throwable;


class ProductController extends Controller
{
    protected $paginateTotal = '';
    protected $settings = '';

    use imageTrait;

    public function __construct()
    {
        $this->settings = Setting::orderBy('id', 'desc')->first();
        $this->paginateTotal = $this->settings->paginateTotal;
    }


    public function storeProduct(Request $request)
    {

        $roles = [
            'price' => ['required', 'numeric', 'min:1'],
            'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image'],
            'type' => ['required', 'in:new,old'],
        ];
        $validator = Validator::make($request->all(), $roles);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' => implode("\n", $validator->messages()->all())]);
        }
        if (!auth('api')->check()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' => __('api.you_must_login_to_pay_on_pickup')]);
        } else {

            DB::beginTransaction();
            try {
                $item = new Product();

                $item->price = $request->get('price');
                $item->title = $request->get('title');
                $item->description = $request->get('description');
                $item->type = $request->get('type');

                if ($request->hasFile('image')) {
                    $item->image = $this->storeImage($request->file('image'), 'product', $item->getRawOriginal('image'), 442, 614);
                }
                $item->save();
                if ($item) {
                    Notification::send(Auth::guard('api')->user(), new ProductNotification($item, false));
                }

                if ($files = $request->file('images')) {
                    foreach ($files as $file) {
                        $image_name = md5(rand(1000, 10000));
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name . '.' . $ext;
                        $upload_path = 'uploads/productImages/';
                        $image_url = $upload_path . $image_full_name;
                        $file->move($upload_path, $image_full_name);

                        $item->productImages()->create(
                            ['product_id' => $item->id, 'image' => $image_url]);
                    }
                }
                if ($request->categories) {
                    $item->categories()->sync($request->input('categories', []));
                }
                DB::commit();
                return response()->json(['status' => true, 'code' => 200,
                    'message' => __('api.ok'), 'item' => $item]);

            } catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            }
        }
        return response()->json(['status' => false, 'code' => 200,
            'message' => __('api.whoops')]);
    }

    public function myProducts(Request $request)
    {
        $items_active = Product::where(['user_id' => auth('api')->id(), 'status' => 'active'])
            ->with(['user', 'categories'])->orderByDesc('id')->paginate($this->settings->paginateTotal)->items();

        $items_notActive = Product::where(['user_id' => auth('api')->id(), 'status' => 'not_active'])
            ->with(['user', 'categories'])->orderByDesc('id')->paginate($this->settings->paginateTotal)->items();
        $message = __('api.ok');


        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items active' => $items_active,
            'items not active' => $items_notActive]);
    }

    public function Home()
    {
        $items = Category::with('parent')->where('status', '=', 'active')
            ->orderByDesc('id')->paginate($this->settings->paginateTotal)->makeHidden(['parent_id', 'icon', 'name']);

        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $items, 'is_more' => count($items)]);
    }

    public function publicMarket($category_id)
    {

        $item = Category::where('parent_id', $category_id)->first();
        $product_ids = $item->products->pluck('id')->toArray();

        $items = Product::where('status', 'active')->whereIn('id', $product_ids)->with(['user', 'categories'])->orderByDesc('id')->get();

        $categories = Category::where('status', '=', 'active')->where('parent_id', $category_id)->with(['children'])->get()->makeHidden(['parent_id', 'icon', 'name']);
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $items, 'categories' => $categories, 'is_more' => count($items)]);

    }

    public function filter_data()
    {
        $types = ['new', 'old'];
        $categories = Category::where('status', '=', 'active')->get();
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'categories' => $categories, 'types' => $types]);

    }

    public function filter(Request $request)
    {
        $items = Product::filter()->where('status', '=', 'active')
            ->orderByDesc('id')->paginate($this->settings->paginateTotal)->items();

        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $items, 'is_more' => count($items)]);
    }

//    public function SimilarProduct($product_id)
//    {
//
//        $items = Product::with('categories')->inRandomOrder()->take(4)->get();
//        $message = __('api.ok');
//        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $items, 'is_more' => count($items)]);
//    }

    public function product_details($id)
    {
        $user = Product::where('user_id', '!=', Auth::guard('api')->id())->first();
        if ($user) {
            Product::where('id', $id)->update(['count_views' => DB::raw('count_views + ' . 1)]);
        }

        $chat_messages_count = User::where('id', Auth::guard('api')->id())->withCount('chatMessages')->first()
            ->makeHidden(['user_name', 'email', 'mobile', 'notifications', 'id', 'gender', 'date', 'status', 'facebook',
                'twitter', 'instagram', 'image', 'opening_status', 'is_deleted']);

        $item = Product::where('status', '=', 'active')->where('id', $id)->with(['user', 'productImages'])
            ->orderByDesc('id')->first();

        $SimilarProduct = Product::where('id', '!=', $id)->whereHas('categories', function ($q) use ($item) {
            $q->whereIn('category_id', $item->categories->pluck('id')->toArray());
        }
        )->take(5)->get();

        if (!$item) {
            return response()->json(['status' => false, 'code' => 200, 'message' => __('api.product_not_found')]);
        }
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'chat messages count' => $chat_messages_count, 'message' => $message, 'items' => $item,
            'SimilarProduct' => $SimilarProduct]);
    }

    public function add_comment_product(Request $request, $product_id)
    {

        if (!auth('api')->check()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' => __('api.you_must_login_to_pay_on_pickup')]);
        } else {

            $roles = [
                'description' => ['required', 'string'],
            ];
            $validator = Validator::make($request->all(), $roles);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'code' => 200,
                    'message' => implode("\n", $validator->messages()->all())]);
            }

            $items = new Comment();
            $items->user_id = Auth::guard('api')->id();
            $items->product_id = $product_id;
            $items->description = $request->get('description');
            $items->save();

            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'item' => $items]);
        }
        $message = __('api.whoops');
        return response()->json(['status' => false, 'message' => $message,]);
    }

    public function get_comment_product($product_id)
    {
        $item = Comment::where('product_id', $product_id)->with(['user'])
            ->orderByDesc('id')->get()->makeHidden(['user_id', 'product_id', 'updated_at']);

        if (!$item) {
            return response()->json(['status' => false, 'code' => 200, 'message' => __('api.product_not_found')]);
        }
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $item]);
    }

    public function add_Report_product(Request $request, $product_id)
    {

        if (!auth('api')->check()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' => __('api.you_must_login_to_pay_on_pickup')]);
        } else {

            $roles = [
                'description' => ['required', 'string'],
            ];
            $validator = Validator::make($request->all(), $roles);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'code' => 200,
                    'message' => implode("\n", $validator->messages()->all())]);
            }

            $items = new Report();
            $items->user_id = Auth::guard('api')->id();
            $items->product_id = $product_id;
            $items->description = $request->get('description');
            $items->save();

            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'item' => $items]);
        }
        $message = __('api.whoops');
        return response()->json(['status' => false, 'message' => $message,]);
    }

    public function get_Report_product($product_id)
    {
        $item = Report::where('product_id', $product_id)->with(['user'])
            ->orderByDesc('id')->get();

        if (!$item) {
            return response()->json(['status' => false, 'code' => 200, 'message' => __('api.product_not_found')]);
        }
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $item]);
    }

    public function advertiserAccount()
    {
        $user_id = Auth::guard('api')->id();
        return User::with(['products'])->where('id', $user_id)
            ->withCount('products as count_product')->first();
    }

    public function changePrice($product_id)
    {
        $user_id = Auth::guard('api')->id();

        if (!$user_id || !$product_id) {
            $message = __('api.whoops');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        }

        if (ChangePrice::where('user_id', auth('api')->id())->where('product_id', $product_id)->exists()) {
            ChangePrice::where('user_id', auth('api')->id())->where('product_id', $product_id)->delete();
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);

        } else {
            $changePrice = new ChangePrice();
            $changePrice->product_id = $product_id;
            $changePrice->user_id = $user_id;
            $changePrice->save();

            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
        }
    }

    public function updateProduct(Request $request, $product_id)
    {
        $roles = [
            'price' => ['sometimes', 'numeric', 'min:1'],
            'title' => ['sometimes', 'string', 'min:5'],
            'description' => ['sometimes', 'string'],
            'image' => ['sometimes', 'image'],
            'type' => ['sometimes', 'in:new,old'],
        ];
        $validator = Validator::make($request->all(), $roles);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' => implode("\n", $validator->messages()->all())]);
        }
        if (!auth('api')->check()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' => __('api.you_must_login_to_pay_on_pickup')]);
        } else {

            DB::beginTransaction();
            try {
                $data = $request->all();
                $item = Product::query()->findOrFail($product_id);

                if ($request->hasFile('image')) {
                    $data['image'] = $this->storeImage($request->file('image'), 'product', 'image', 442, 614);
                }

                if ($request->has('price')) {
                    $user_ids = $item->changePrice->pluck('user_id')->toArray();
                    $users = User::whereIn('id', $user_ids)->get();
                    Notification::send($users, new ProductNotification($item, true));
                }
                $product = Product::query()->findOrFail($product_id)->update($data);
                if ($files = $request->file('images')) {
                    foreach ($files as $file) {
                        $image_name = md5(rand(1000, 10000));
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name . '.' . $ext;
                        $upload_path = 'uploads/productImages/';
                        $image_url = $upload_path . $image_full_name;
                        $file->move($upload_path, $image_full_name);

                        $item->productImages()->create(
                            ['product_id' => $item->id, 'image' => $image_url]);
                    }
                }
                if ($request->categories) {
                    $item->categories()->sync($request->input('categories', []));
                }
                DB::commit();
                return response()->json(['status' => true, 'code' => 200,
                    'message' => __('api.ok'), 'item' => $item]);

            } catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            }
        }
        return response()->json(['status' => false, 'code' => 200,
            'message' => __('api.whoops')]);
    }

    public function editProduct($product_id)
    {
       $item= Product::where('id', $product_id)->with('categories', 'productImages')->get();
        $message = __('api.whoops');
        return response()->json(['status' => false, 'code' => 200, 'message' => $message, 'item'=>$item]);
    }

}
