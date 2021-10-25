<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Plans;
use \App\Models\User;
use \App\Models\Profile;
use Session;

class PaymentController extends Controller
{
    //
    public function index() {
        $data = [
            'intent' => auth()->user()->createSetupIntent()
        ];

        return view('subscriptions.payment')->with($data);
    }
	
    public function store(Request $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $plan = Plans::where('identifier', $request->plan)
            ->orWhere('identifier', 'basic')
            ->first();
        
        #$request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);
        $request->user()->newSubscription($request->plan, $plan->stripe_id)->create($request->token);

	$user_id = auth()->user()->id;
	$profile = Profile::where('user_id',$user_id)->first();
	$today= date('Y-m-d');
	if($request->plan == 'standard'){
	$profile->member_expiry_date = date('Y-m-d', strtotime("+3 months", strtotime($today)));
	}
	else{
	$profile->member_expiry_date = date('Y-m-d', strtotime("+6 months", strtotime($today)));
	}
	try{
	    $profile->save();
            Session::flash('alert-success', 'Profile saved successfully!');
         }
         catch(\Exception $e){
            Session::flash('alert-danger', $e->getMessage());
         }
                return redirect('/account/profile/'.$user_id);


        //return back();
    }

############
} ### Class ends
