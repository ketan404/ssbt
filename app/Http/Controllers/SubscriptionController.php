<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;


class SubscriptionController extends Controller
{
    //
	public function index() {
        $plans = Plans::get();

        return view('subscriptions.plans', compact('plans'));
        }

	

############
}### Class ends
