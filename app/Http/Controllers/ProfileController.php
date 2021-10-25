<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Session;

class ProfileController extends Controller
{
    //
	public function index(){
        $profiles = Profile::all();
        return view('admin.account_profile_list', ['profiles'=>$profiles, 'activePage'=>'Profiles','titlePage'=>'Profiles']);
        }

        public function addEditProfile($user_id){
        $profile_details = Profile::where('user_id',$user_id)->first();
	$profile_id= '';
	if(!empty($profile_details)){
	$profile_id = $profile_details->id;
	}
	
        if(empty($profile_id)){
            $profile = new Profile();
        }
        else{
            $profile = Profile::find($profile_id);
        }
        return view('account_profile', ['profile'=>$profile, 'activePage'=>'Profile Management','titlePage'=>'Profile Management']);
        }

	public function save(Request $request){
	$user_id = auth()->user()->id;
        $profile_details = Profile::where('user_id',$user_id)->first();
	$profile_id= '';
	if(!empty($profile_details)){
	$profile_id = $profile_details->id;
	}
        if(empty($profile_id)){
            $e = new Profile;
         }
         else{
            $e = Profile::where('user_id',$user_id)->first();
         }
	$e->user_id = auth()->user()->id;
        $e->parents_name = $request->input('parents_name');
        $e->class = $request->input('class');
        $e->school = $request->input('school');
        $e->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
        $e->city = $request->input('city');
        $e->parents_email = $request->input('parents_email');
        $e->parents_mobile = $request->input('parents_mobile');
	$today= date('Y-m-d');
	//$e->member_expiry_date = date('Y-m-d', strtotime("+3 months", strtotime($today)));
	//$e->member_expiry_date = date('Y-m-d', strtotime($today));
        try{
            $e->save();
            Session::flash('alert-success', 'Profile saved successfully!');
         }
         catch(\Exception $e){
            Session::flash('alert-danger', $e->getMessage());
         }
                return redirect('/account/profile/'.$user_id);
        }

	public function validateProfile(Request $request){
		$user_id = auth()->user()->id;
		## Check parents_email, parents_mobile, class, school

		$profile = Profile::where('user_id',$user_id)->first();
		if(!empty($profile->class) && !empty($profile->school) && !empty($profile->parents_email) && !empty($profile->parents_mobile))
		{
			return view('dashboard');
		}
		else{
            		Session::flash('alert-danger', 'Please fill necessary information');
			return redirect('/account/profile/'.$user_id);
		}

	}


##########
} ## Class ends
