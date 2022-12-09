<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fqa;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Traits\imageTrait;

class FqaController extends Controller
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
                if (can(['fqa-show', 'fqa-create', 'fqa-edit', 'fqa-delete'])) {
                    return $next($request);
                }
            } elseif ($route_name == 'create' || $route_name == 'store') {
                if (can('fqa-create')) {
                    return $next($request);
                }
            } elseif ($route_name == 'edit' || $route_name == 'update') {
                if (can('fqa-edit')) {
                    return $next($request);
                }
            } elseif ($route_name == 'destroy' || $route_name == 'delete') {
                if (can('fqa-delete')) {
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
        $items = Fqa::filter()->orderBy('id', 'desc')->paginate($this->settings->paginateTotal);
        return view('admin.fqa.home', [
            'items' => $items,
        ]);
    }


    public function create()
    {
        $status = ['active' => 'Active', 'not_active' => 'Not Active'];
        return view('admin.fqa.create', compact('status'));
    }

    public function store(Request $request)
    {
        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['order_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new Fqa();

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->order = $request->get('order_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
        }


        $item->save();
        if ($item) {
            return redirect()->back()->with('status', __('cp.create'));
        }
    }


    public function edit($id)
    {
        $status = ['active' => 'Active', 'not_active' => 'Not Active'];
        $item = Fqa::where('id', $id)->first();
        return view('admin.fqa.edit', [
            'item' => $item,
            'status' => $status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $roles = [
            'status' => ['required', 'in:active,not_active'],
        ];
        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['order_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);
        $item = Fqa::query()->findOrFail($id);

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->order = $request->get('order_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
        }

        $item->save();
        return redirect()->back()->with('status', __('cp.update'));
    }
}
