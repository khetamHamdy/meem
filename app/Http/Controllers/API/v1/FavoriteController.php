<?php

namespace App\Http\Controllers\API\v1;


use App\Models\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->paginate = 10;

    }

    public function getMyFavorite(Request $request)
    {
        if (auth('api')->check()) {
            $favorites = Favorite::query()->where('user_id', auth('api')
                ->user()->id)->with('product')->paginate($this->paginate)->items();
            if (count($favorites) > 0) {
                $check = ($this->paginate > count($favorites)) ? false : true;
                $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $favorites, 'is_more' => $check]);
            } else {
                $message = __('api.NoFavorite');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'items' => $favorites, 'is_more' => false]);
            }

        }

    }

    public function addAndRemoveFromFavorite(Request $request, $product_id)
    {

        if (auth('api')->check()) {
            if (Favorite::where('user_id', auth('api')->id())->where('product_id', $product_id)->exists()) {
                Favorite::where('user_id', auth('api')->id())->where('product_id', $product_id)->delete();
                $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message]);

            } else {
                $fevorite = new Favorite();
                $fevorite->user_id = auth('api')->user()->id;
                $fevorite->product_id = $product_id;
                $fevorite->save();
            }

            if ($fevorite) {
                $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message]);

            } else {
                $message = __('api.not_found');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message]);

            }
        }
    }




    // public function addFavorite(Request $request)
    // {
    //     if (!(Favorite::query()->where('company_id' ,$request->company_id)->first()
    //                   && Favorite::query()->where('user_id' ,auth()->user()->id)->first() )){
    //         Favorite::query()->create([
    //             'user_id' => auth()->user()->id,
    //             'company_id' => $request->company_id
    //         ]);
    //       $message = __('api.ok');
    //       return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
    //         }
    //     else{
    //         $message = __('api.theCompanyExists');
    //       return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
    //     }

    // }

    // public function removeFromFavorite($id)
    // {
    //     Favorite::where('user_id', auth()->user()->id)->where('company_id', $id)->delete();
    //   $count = Favorite::where('user_id', auth()->user()->id)->count();

    //     return response()->json(['status' => true, 'code' => 200, 'message' => 'success','count'=>$count]);
    // }

}







