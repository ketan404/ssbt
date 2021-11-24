<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
class UserProfileController extends Controller
{
    //
    function save(Request $req){
        $profile=new UserProfile;
        $profile->user_id=Auth::user()->id;
        $profile->name=$req->name;
        $profile->s_o_d_o=$req->s_o_d_o;
        $profile->m_o=$req->m_o;
        $profile->date_of_birth=date('Y-m-d', strtotime($req->input('date_of_birth')));
        $profile->father_name=$req->father_name;
        $profile->father_s_o=$req->father_s_o;
        $profile->father_m_o=$req->father_m_o;
        $profile->father_dob=date('Y-m-d', strtotime($req->input('father_dob')));
        $profile->mother_name=$req->mother_name;
        $profile->mother_d_o=$req->mother_d_o;
        $profile->mother_m_o=$req->mother_m_o;
        $profile->mother_husband=$req->mother_husband;
        $profile->mother_dob=date('Y-m-d', strtotime($req->input('mother_dob')));
        $profile->spouse_name=$req->spouse_name;
        $profile->spouse_d_o=$req->spouse_d_o;
        $profile->spouse_m_o=$req->spouse_m_o;
        $profile->spouse_husband=$req->spouse_husband;
        $profile->spouse_dob=date('Y-m-d', strtotime($req->input('spouse_dob')));
        $profile->permanent_address=$req->p_vill.' '.$req->p_po.' '.$req->p_building_no.' '.$req->p_flat_no.' '.$req->p_tech.' '.$req->p_dist.' '.$req->p_state.' '.$req->p_pin;
        $profile->temporary_address=$req->t_vill.' '.$req->t_po.' '.$req->t_building_no.' '.$req->t_flat_no.' '.$req->t_nearby.' '.$req->t_tech.' '.$req->t_dist.' '.$req->t_state.' '.$req->t_pin;
        $profile->mobile_no=$req->mobile_no;
        $profile->mobile_r=$req->mobile_r;
        $profile->id_proof_no=$req->id_proof_no;

        $profile->save();
        return redirect('/');
    }

}
