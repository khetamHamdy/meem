<?php

namespace App\Http\Controllers\WEB\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Language;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Quote;
use App\Models\Service;
use Illuminate\Http\Request;
use Validator;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        $this->services = Service::query()->where('status','active')->get();
        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,
            'product' => $this->services,
        ]);
    }


    public function index()
    {
        $services =Service::where('status','active')->get();
        return view('website.home',[
            'product'=>$services,
        ]);
    }
    public function about()
    {
        $page = Page::where('id',1)->first();
        return view('website.about',[
            'page'=>$page
        ]);
    }
    public function services()
    {
        $services =Service::where('status','active')->get();
        return view('website.product',['product'=>$services]);
    }
    public function service($id)
    {
        $service =Service::where('status','active')->findOrFail($id);
        $services =Service::where('id','!=',$id)->where('status','active')->get();

        return view('website.service',[
            'service'=>$service,
            'product'=>$services,
        ]);
    }
    public function partners()
    {
        return view('website.partners');
    }
    public function team()
    {
        return view('website.team');
    }
    public function chairman()
    {
        $item= Page::where('id',2)->first();
        return view('website.chairman',[
            'item'=>$item
        ]);
    }
    public function projects()
    {
        return view('website.projects');
    }

    public function contact()
    {
        return view('website.contact');
    }
    public function storeQuote (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'mobile' => 'required',
            'country_code' => 'required|numeric',
            'service_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => implode("\n", $validator->messages()->all()),'errors'=>$validator->errors(), 'code' => 400]);
        }
        $servicesIdes='';
        foreach($request->get('service_id') as $service){
            $servicesIdes=$servicesIdes.$service.',';
        }
        $quote = new Quote();
        $quote->name = $request->get('name');
        $quote->email = $request->get('email');
        $quote->mobile = $request->get('country_code').$request->get('mobile');
        $quote->message = $request->get('message');
        $quote->service_id = $servicesIdes;
        $quote->save();
//todo
// After a successful form submission – solution shall send confirmation email to the user
// After a successful form submission – solution shall send an email notification to super admin.
        return response()->json(['status' => true, 'code' => 200]);
    }







}
