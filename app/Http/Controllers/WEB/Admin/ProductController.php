<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Language;
use App\Models\productCategories;
use App\Models\ProductImage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Traits\imageTrait;
use Throwable;

class ProductController extends Controller
{

    use imageTrait;

    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,
        ]);


        $route = Route::currentRouteAction();
        $route_name = substr($route, strpos($route, "@") + 1);
        $this->middleware(function ($request, $next) use ($route_name) {

            if ($route_name == 'index') {
                if (can(['products-show', 'products-create', 'products-edit', 'products-delete'])) {
                    return $next($request);
                }
            } elseif ($route_name == 'create' || $route_name == 'store') {
                if (can('products-create')) {
                    return $next($request);
                }
            } elseif ($route_name == 'edit' || $route_name == 'update') {
                if (can('products-edit')) {
                    return $next($request);
                }
            } elseif ($route_name == 'destroy' || $route_name == 'delete') {
                if (can('products-delete')) {
                    return $next($request);
                }
            } else {
                return $next($request);
            }
            return redirect()->back()->withErrors(__('cp.you_dont_have_permission'));
        });

    }

    public function index()
    {
        $items = Product::filter()->orderBy('id', 'desc')->paginate($this->settings->paginateTotal);
        return view('admin.product.home', [
            'items' => $items,
        ]);
    }


    public function create()
    {
        $categories = Category::latest()->get();
        $type = ['new' => 'New', 'old' => 'Old'];
        return view('admin.product.create', ['categories' => $categories, 'type' => $type]);
    }

    public function store(Request $request)
    {
        $roles = [
            'price' => ['required', 'numeric', 'min:1'],
            'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image'],
            'type' => ['required', 'in:new,old'],

        ];

        $this->validate($request, $roles);
        DB::beginTransaction();
        try {
            $item = new Product();

            $item->price = $request->price;
            $item->title = $request->title;
            $item->description = $request->description;
            $item->type = $request->type;

            if ($request->hasFile('image')) {
                $item->image = $this->storeImage($request->file('image'), 'product', $item->getRawOriginal('image'), 442, 614);
            }
            $item->save();

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
            if ($request->category_id) {
                $item->categories()->sync($request->input('category_id', []));
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->back()->with('status', __('cp.create'));
    }

    public function edit($id)
    {
        $item = Product::with(['categories','productImages'])->where('id', $id)->first();

        $categories = Category::all();

        $type = ['new' => 'New', 'old' => 'Old'];
        $status = ['active' => 'Active', 'not_active' => 'Not Active'];
        return view('admin.product.edit', [
            'item' => $item,
            'categories' => $categories,
            'type' => $type,
            'status' => $status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $roles = [
            'price' => ['required', 'numeric', 'min:1'],
            'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string'],
            'image' => ['sometimes', 'image'],
            'type' => ['required', 'in:new,old'],
        ];

        $this->validate($request, $roles);
        DB::beginTransaction();
        try {
            $item = Product::query()->findOrFail($id);

            $item->price = $request->price;
            $item->title = $request->title;
            $item->description = $request->description;
            $item->type = $request->type;
            $item->status = $request->status;

            if ($request->hasFile('image')) {
                $item->image = $this->storeImage($request->file('image'), 'product', $item->getRawOriginal('image'), 442, 614);
            }
            $item->save();

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
            if ($request->category_id) {
                $item->categories()->sync($request->input('category_id', []));
            }

            DB::commit();
            return redirect()->back()->with('status', __('cp.update'));
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteProductImage($product_image_id)
    {
        $ProductImage = ProductImage::findOrFail($product_image_id);
        $ProductImage->delete();
        return response()->json(['message' => 'Product Image Deleted']);
    }

    public function show($id)
    {
        $item = Product::query()->find($id);
        return view('admin.product.sideMenu', compact('item'));
    }

    public function comments($id)
    {
        $item = Product::query()->with(['productComments'])->find($id);
        return view('admin.product.comments', compact('item'));
    }

    public function reports($id)
    {
        $item = Product::query()->with(['productReports'])->find($id);
        return view('admin.product.reports', compact('item'));
    }

    public function getItems($req, $product_id, Request $request)
    {
        $product = Product::findOrFail($product_id);
        if ($req === 'comments') {
            $item = Product::query()->with(['productComments'])->find($product_id);
            $view = view('admin.product.component.comments', ['item' => $item])->render();
            return response()->json(['items' => $view]);
        }
        if ($req === 'reports') {
            $item = Product::query()->with(['productReports'])->find($product_id);
            $view = view('admin.product.component.reports', ['item' => $item])->render();
            return response()->json(['items' => $view]);
        }
        if ($req === 'home') {
            $view = view('admin.product.component.statistics', ['item' => $product])->render();
            return response()->json(['items' => $view]);
        }
    }
}
