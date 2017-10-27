<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Work;
use App\City;
use App\Country;
use App\Service;
use App\Mission;
use App\MissRequests;
use App\SerRequests;
use DB;
use Auth;
use App;

class CompController extends Controller
{

    public function acceptMissionRequest($miss_id, $user_id, $proc){
        if($proc == 'accept'){
            MissRequests::where('miss_miss_id', intval($miss_id))->where('miss_req_user', intval($user_id))->where('miss_req_status', 'pending')->update([
                'miss_req_status' => 'accepted'
            ]);
        }else{
            MissRequests::where('miss_miss_id', intval($miss_id))->where('miss_req_user', intval($user_id))->where('miss_req_status', 'pending')->update([
                'miss_req_status' => 'rejected'
            ]);
        }

        return redirect()->back();
    }
    public function showMissionRequests($miss_id){
        if(Auth::guard('comp')->user()->comp_sort == 'bene_comp' || Auth::guard('comp')->user()->comp_sort = 'both_comp'){
            $miss_requests = DB::table('miss_requests')
                           ->leftJoin('missions', 'missions.miss_id' , '=', 'miss_requests.miss_miss_id')
                           ->leftJoin('users', 'users.u_id', '=', 'miss_requests.miss_req_user')
                           ->where('missions.miss_comp', Auth::guard('comp')->user()->comp_id)
                           ->where('miss_requests.miss_miss_id', intval($miss_id))
                           ->where('miss_requests.miss_req_status', 'pending')
                           ->select('missions.*',
                                    'miss_requests.*',
                                    'users.u_id',
                                    'users.u_username',
                                    'users.u_fname',
                                    'users.u_lname')
                           ->get();

            return view('comps.miss-requests')->with('miss_requests', $miss_requests);
        }else{
            return redirect()->back();
        }
    }

    public function acceptServiceRequest($ser_id, $user_id, $proc){
        if($proc == 'accept'){
            SerRequests::where('ser_ser_id', intval($ser_id))->where('ser_req_user', intval($user_id))->where('ser_req_status', 'pending')->update([
                'ser_req_status' => 'accepted'
            ]);
        }else{
            SerRequests::where('ser_ser_id', intval($ser_id))->where('ser_req_user', intval($user_id))->where('ser_req_status', 'pending')->update([
                'ser_req_status' => 'rejected'
            ]);
        }

        return redirect()->back();
    }
    
    public function showServiceRequests($serv_id){
        if(Auth::guard('comp')->user()->comp_sort == 'doner_comp' || Auth::guard('comp')->user()->comp_sort = 'both_comp'){
        $ser_requests = DB::table('ser_requests')
                      ->leftJoin('services', 'services.serv_id' , '=', 'ser_requests.ser_ser_id')
                      ->leftJoin('users', 'users.u_id', '=', 'ser_requests.ser_req_user')
                      ->where('services.serv_comp', Auth::guard('comp')->user()->comp_id)
                      ->where('ser_requests.ser_ser_id', intval($serv_id))
                      ->where('ser_requests.ser_req_status', 'pending')
                      ->select('services.*',
                               'ser_requests.*',
                               'users.u_id',
                               'users.u_username',
                               'users.u_fname',
                               'users.u_lname')
                      ->get();
        
        return view('comps.ser-requests')->with('ser_requests', $ser_requests);
        }else{
            return redirect()->back();
        }
    }
    
    public function compDB(){
        $comp = Auth::guard('comp')->user();
        $countries = Country::all();
        $cities = City::all();
        $services = Service::where('serv_comp', $comp->comp_id)->get();
        $missions = Mission::where('miss_comp', $comp->comp_id)->get();
        return view('comps.index')
            ->with('services', $services)
            ->with('missions', $missions)
            ->with('cities', $cities)
            ->with('countries', $countries)
            ->with('comp', (object) $comp->toArray());
    }
    
    public function updateSettings(Request $req){
        // return $req;
        $username_exists = Company::where('comp_username', $req->username)->first();

        if($username_exists != null){
            $new_user = Auth::guard('comp')->user()->comp_username;
            $comp_msg = false;
        }else{
            $new_user = $req->username;
            $comp_msg = true;
        }
        
        if($req->username == Auth::guard('comp')->user()->comp_username)
            $comp_msg = 'same';

        
        $data = [
            'comp_username' => $new_user,
            'comp_name' => $req->name,
            'comp_name_en' => $req->name_en,
            'comp_work' => $req->work,
            'comp_email' => $req->email,
            'comp_password' => sha1($req->password),
            'comp_lnumber' => $req->lnumber,
            'comp_phone' => $req->phone,
            'comp_manager' => $req->manager,
            'comp_owner' => $req->owner,
            'comp_country' => $req->country,
            'comp_city' => $req->city,
            'comp_location' => $req->location,
        ];

        Company::where('comp_id', Auth::guard('comp')->user()->comp_id)->update($data);
        return [
            'success' => true,
            'username' => $comp_msg
        ];
    }
    
    public function settings(){
        $comp = (object) Auth::guard('comp')->user()->toArray();
        $comp = DB::table('companies')
              ->leftJoin('countries', 'countries.country_id' , '=', 'companies.comp_country')
              ->leftJoin('cities', 'cities.city_id' , '=', 'companies.comp_city')
              ->leftJoin('works', 'works.work_id' , '=', 'companies.comp_work')
              ->select('companies.*', 'countries.*', 'cities.*', 'works.*')
              ->where('companies.comp_email', $comp->comp_email)
              ->where('companies.comp_id', $comp->comp_id)
              ->first();
        $works =  Work::all();
        $countries =  Country::all();
        $cities =  City::all();
        return view('comps.settings')
            ->with('works', $works)
            ->with('countries', $countries)
            ->with('cities', $cities)
            ->with('comp', $comp)
            ->with('user_in', $this->user_in);
    }

    public function uploadCover(Request $req){
        $custom_adds = mb_substr(sha1(sha1(Auth::guard('comp')->user()->comp_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::guard('comp')->user()->comp_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        Company::where('comp_email',Auth::guard('comp')->user()->comp_email)->update([
            'comp_cover' => $image->image_name
        ]);

        return ['success' => true];
    }
    
    public function upload(Request $req){
        $custom_adds = mb_substr(sha1(sha1(Auth::guard('comp')->user()->comp_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::guard('comp')->user()->comp_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        Company::where('comp_email',Auth::guard('comp')->user()->comp_email)->update([
            'comp_logo' => $image->image_name
        ]);
        return ['success' => true];
    }

    public function newService(Request $rq){
        if(Auth::guard('comp')->user()->comp_sort == 'doner_comp' || Auth::guard('comp')->user()->comp_sort == 'both_comp'){
        $data = [
            'serv_name' => $rq->name,
            'serv_points' => $rq->points,
            'serv_location' => $rq->location,
            'serv_country' => $rq->country,
            'serv_city' => $rq->city,
            'serv_range' => $rq->range,
            'serv_desc' => $rq->desc,
            'serv_comp' => Auth::guard('comp')->user()->comp_id,
        ];

        if($rq->range == '1'){
            $data['serv_start_date'] = $rq->start_date;
            $data['serv_end_date'] = $rq->end_date;
        }
        
        Service::insert($data);
        return [
            'msg' => 'created',
            'success' => true
        ];
        }else{
            return [
                'msg' => "Unable to create new service  , you have no permissions",
                'success' => false
            ];
        }
    }
    
    public function uploadServiceLogo(Request $req){
        $last_serv = Service::where('serv_comp',Auth::guard('comp')->user()->comp_id)->orderby('serv_id', 'desc')->first();
        $custom_adds = mb_substr(sha1(sha1(Auth::guard('comp')->user()->comp_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::guard('comp')->user()->comp_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        Service::where('serv_comp',Auth::guard('comp')->user()->comp_id)->where('serv_id', $last_serv->serv_id)->update([
            'serv_logo' => $image->image_name
        ]);
        return ['success' => true];
    }

    
    public function newMiss(Request $rq){
        if(Auth::guard('comp')->user()->comp_sort == 'bene_comp' || Auth::guard('comp')->user()->comp_sort == 'both_comp'){
        $data = [
            'miss_name' => $rq->name,
            'miss_points' => $rq->points,
            'miss_location' => $rq->location,
            'miss_country' => $rq->country,
            'miss_city' => $rq->city,
            'miss_range' => $rq->range,
            'miss_desc' => $rq->desc,
            'miss_comp' => Auth::guard('comp')->user()->comp_id,
        ];
        if($rq->range == '1'){
            $data['miss_start_date'] = $rq->start_date;
            $data['miss_end_date'] = $rq->end_date;
        }

        Mission::insert($data);
        return [
            'msg' => 'created',
            'success' => true
        ];
        }else{
            return [
                'msg' => "Unable to create new mission  , you have no permissions",
                'success' => false
            ];
        }
    }
    
    public function uploadMissLogo(Request $req){
        $last_miss = Mission::where('miss_comp',Auth::guard('comp')->user()->comp_id)->orderby('miss_id', 'desc')->first();
        $custom_adds = mb_substr(sha1(sha1(Auth::guard('comp')->user()->comp_email) . time()), 0, 7) . "_" . mb_substr(md5(sha1(Auth::guard('comp')->user()->comp_email) . time() * time()), -10);
        $image = $this->uploadImageCrop($req->image, $custom_adds);
        Mission::where('miss_comp',Auth::guard('comp')->user()->comp_id)->where('miss_id', $last_miss->miss_id)->update([
            'miss_logo' => $image->image_name
        ]);
        return ['success' => true];
    }
    
    public function login(){
        return view('comps.login')->with('user_in', $this->user_in);;
    }
    
    public function loginPost(Request $req){
        $auth = Company::where('comp_email',$req->email)->where('comp_password',sha1($req->password))->first();
        // echo var_dump($auth);
        // die();
        if($auth){
            if(request('remember') == true || request('remember') == false)
                $remember = request('remember');
            else
                $remember = false;
            Auth::guard('comp')->login($auth, $remember);
            // return redirect('compd');
            return [
                'status' => true,
                'panel' => route('compd'),
                'msg' => 'Logged in!!'
            ];
            
        }else{
            return [
                'status' => false,
                'msg' => 'Unable To login, Password or email not correct'
            ];
        }
    }
    
    public function register(){
        return view('comps.register')->with('user_in', $this->user_in);;
    }

    public function registerPost(){
        
            $comp = new Company;
            $this->validate(request(),[
                'laccept'=>'required',
                'comp_name'=>'required|min:4',
                'comp_name_en'=>'required|min:4',
                'comp_type'=>'required',
                'comp_sort'=>'required',
                'comp_email'=>'required|string|email',
                'comp_password'=>'required|min:6',
            ]);
            if(!isset($errors)){
                $comps = Company::where('comp_email', request('comp_email'))->get();
                
                if(count($comps) > 0){
                    $resp = [
                        "errors" => [
                            'err1' => "This email already exists!!",
                        ],
                        "status" => false,
                    ];
                }else{
                    $comp->insert([
                        "comp_confirm_code" => '123123',
                        "comp_name" => request('comp_name'),
                        "comp_name_en" => request('comp_name_en'),
                        "comp_type" => request('comp_type'),
                        "comp_sort" => request('comp_sort'),
                        "comp_email" => request('comp_email'),
                        "comp_password" => sha1(request('comp_password')),
                    ]);

                    $login = Company::where('comp_email', request('comp_email'))->where('comp_password', sha1(request('comp_password')))->first();
                    Auth::guard('comp')->login($login, false);
                    
                    $resp = [
                        "errors" => [],
                        "status" => true,
                        "msg" => "registered!!"
                    ];
                }
            }else{
                $resp = [
                    "errors" => $errors,
                    "status" => false,
                    "msg" => "fields required!"
                ];
            }
            
            return $resp;
    }

    // confirm comp
    public function confirmComp($ccode){
        $code_exists = Company::where('comp_confirm_code', $ccode)->first();
        if($code_exists){
            Company::where('comp_confirm_code', $ccode)->update([ 'comp_confirmed' => true ]);
            return redirect('compd');
        }
        else
            dd('no');
    }
}
