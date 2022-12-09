<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Admin;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Subadmin;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $users_count = User::where('is_deleted', '0')->count();
        $product_count = Product::count();
        $contact_count = Contact::count();

        return view('admin.home.dashboard')->with(compact('users_count',
             'product_count', 'contact_count'));
    }


    public function changeStatus($model, Request $request)
    {
        $role = "";
        if ($model == "admins") $role = 'App\Models\Admin';
        if ($model == "category") $role = 'App\Models\Category';
        if ($model == "contacts") $role = 'App\Models\Contact';
        if ($model == "users") $role = 'App\Models\User';
        if ($model == "logs") $role = 'App\Models\Activity';
        if ($model == "roles") $role = 'App\Models\Role';
        if ($model == "product") $role = 'App\Models\Product';
        if ($model == "fqa") $role = 'App\Models\Fqa';
        if ($model == "comments") $role = 'App\Models\Comment';
        if ($model == "reports") $role = 'App\Models\Report';

        if ($role != "") {
            if ($request->action == 'delete') {
                $role::query()->whereIn('id', $request->IDsArray)->delete();
            } else {
                if ($request->action) {
                    $role::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->action]);
                }
            }

            return $request->action;
        }
        return false;


    }


}
