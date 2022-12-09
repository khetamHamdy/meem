<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Traits\imageTrait;

class CategoryController extends Controller
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
                if (can(['categories-show', 'categories-create', 'categories-edit', 'categories-delete'])) {
                    return $next($request);
                }
            } elseif ($route_name == 'create' || $route_name == 'store') {
                if (can('categories-create')) {
                    return $next($request);
                }
            } elseif ($route_name == 'edit' || $route_name == 'update') {
                if (can('categories-edit')) {
                    return $next($request);
                }
            } elseif ($route_name == 'destroy' || $route_name == 'delete') {
                if (can('categories-delete')) {
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
        $items = Category::filter()->orderBy('id', 'desc')->paginate($this->settings->paginateTotal);
        return view('admin.categories.home', [
            'items' => $items,
        ]);
    }


    public function create()
    {
        $parent = category::all();
        $status = ['active' => 'Active', 'not_active' => 'Not Active'];
        return view('admin.categories.create', compact('status', 'parent'));
    }

    public function store(Request $request)
    {
        $roles = [
            'icon' => 'required',
        ];
        $locales = Language::all()->pluck('lang');

        $this->validate($request, $roles);

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }

        $item = new Category();
        if ($request->parent_id) {
            $item->parent_id = $request->parent_id;
        }

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('icon')) {
            $item->icon = $this->storeImage($request->file('icon'), 'categories', $item->getRawOriginal('icon'));
        }

        $item->save();
        if ($item) {
            return redirect()->back()->with('status', __('cp.create'));
        }
    }


    public function edit($id)
    {
        $parent = category::all();
        $status = ['active' => 'Active', 'not_active' => 'Not Active'];
        $item = Category::where('id', $id)->first();
        return view('admin.categories.edit', [
            'item' => $item,
            'status' => $status,
            'parent' => $parent
        ]);
    }

    public function update(Request $request, $id)
    {
        $roles = [
            'icon' => 'sometimes',
            'status' => ['required', 'in:active,not_active'],
        ];
        $locales = Language::all()->pluck('lang');
        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }
        $this->validate($request, $roles);

        $item = Category::query()->findOrFail($id);
        $item->parent_id = $request->parent_id;
        $item->status = $request->status;

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('icon')) {
            $item->icon = $this->storeImage($request->file('icon'), 'categories', $item->getRawOriginal('icon'));
        }

        $item->save();
        return redirect()->back()->with('status', __('cp.update'));
    }
}
