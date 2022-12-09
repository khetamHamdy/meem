<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    private $locales = '';
    use imageTrait;

    public function __construct()
    {
        $this->locales = Language::all();
        view()->share([
            'locales' => $this->locales,
        ]);

        $route = Route::currentRouteAction();
        $route_name = substr($route, strpos($route, "@") + 1);
        $this->middleware(function ($request, $next) use ($route_name) {
            if (can('settings')) {
                return $next($request);
            }
            if ($route_name == 'index') {
                if (can(['settings-show', 'settings-edit'])) {
                    return $next($request);
                }
            } elseif ($route_name == 'edit' || $route_name == 'update') {
                if (can('settings-edit')) {
                    return $next($request);
                }
            } else {
                return $next($request);
            }
            return redirect()->back()->withErrors(__('cp.you_dont_have_premession'));
        });
    }


    public function image_extensions()
    {

        return array('jpg', 'png', 'jpeg', 'gif', 'bmp', 'pdf', 'svg', 'txt', 'docx', 'doc', 'ppt', 'xls', 'zip', 'rar');

    }


    public function index()
    {

        $item = Setting::query()->first();
        return view('admin.settings.edit', ['item' => $item]);
    }

    public function system_maintenance()
    {
        $item = Setting::query()->first();
        return view('admin.settings.editMaintanense', ['item' => $item]);
    }


    public function update(Request $request)
    {

        $roles = [
            'app_image' => 'image',
            'info_email' => 'email',
            'mobile' => 'numeric',
            'twitter' => 'url',
            'paginateTotal' => 'numeric',
            'instagram' => 'url',
            'facebook' => 'url',
        ];
        $setting = Setting::query()->findOrFail(1);

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['app_name_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        foreach ($locales as $locale) {
            $setting->translate($locale)->app_name = $request->get('app_name_' . $locale);
        }

        $setting->info_email = trim($request->get('info_email'));
        $setting->mobile = trim($request->get('mobile'));
        $setting->paginateTotal = trim($request->get('paginateTotal'));
        $setting->instagram = trim($request->get('instagram'));
        $setting->twitter = trim($request->get('twitter'));
        $setting->facebook = trim($request->get('facebook'));

        if ($request->hasFile('app_logo')) {
//            $setting->app_logo = $this->storeImage($request->file('app_logo'), 'settings', $setting->getRawOriginal('app_logo'));

            $name = time() . "_" . rand(10000, 99999) . "." . $request->file('app_logo')
                    ->getClientOriginalExtension();
            $request->file('app_logo')->move("uploads/", $name);
            $setting->app_logo = 'uploads/' . $name;
        }

        if ($request->hasFile('app_image')) {
//            $setting->app_image = $this->storeImage($request->file('app_image'), 'settings', $setting->getRawOriginal('app_image'));

            $name = time() . "_" . rand(10000, 99999) . "." . $request->file('app_image')
                    ->getClientOriginalExtension();
            $request->file('app_image')->move("uploads/", $name);
            $setting->app_image = 'uploads/' . $name;
        }

        if ($request->hasFile('favicon')) {
//            $setting->favicon = $this->storeImage($request->file('favicon'), 'settings', $setting->getRawOriginal('favicon'));

            $name = time() . "_" . rand(10000, 99999) . "." . $request->file('favicon')
                    ->getClientOriginalExtension();
            $request->file('favicon')->move("uploads/", $name);
            $setting->favicon = 'uploads/' . $name;
        }
        $setting->save();

        return redirect()->back()->with('status', __('cp.update'));
    }


    public function update_system_maintenance(Request $request)
    {
        $setting = Setting::query()->findOrFail(1);
        if ($request->get('is_maintenance_mode') == 'on') {
            $setting->is_maintenance_mode = '1';
        } else {
            $setting->is_maintenance_mode = '0';
        }

        if ($request->get('is_allow_register') == 'on') {
            $setting->is_allow_register = '1';
        } else {
            $setting->is_allow_register = '0';
        }

        if ($request->get('is_allow_login') == 'on') {
            $setting->is_allow_login = '1';
        } else {
            $setting->is_allow_login = '0';
        }


        $setting->save();

        if ($request->get('is_maintenance_mode') == 'on') {
            \Artisan::call('down');
            $setting->is_maintenance_mode = '1';
        } else {
            \Artisan::call('up');
            $setting->is_maintenance_mode = '0';
        }
        $setting->save();
        return redirect()->back()->with('status', __('cp.update'));
    }


}
