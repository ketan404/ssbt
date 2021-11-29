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
        $profile->p_vill=$req->p_vill;
        $profile->p_po=$req->p_po;
        $profile->p_building_no=$req->p_building_no;
        $profile->p_flat_no=$req->p_flat_no;
        $profile->p_tech=$req->p_tech;
        $profile->p_dist=$req->p_dist;
        $profile->p_state=$req->p_state;
        $profile->p_pin=$req->p_pin;
        $profile->t_vill=$req->t_vill;
        $profile->t_po=$req->t_po;
        $profile->t_building_no=$req->t_building_no;
        $profile->t_flat_no=$req->t_flat_no;
        $profile->t_nearby=$req->t_nearby;
        $profile->t_tech=$req->t_tech;
        $profile->t_dist=$req->t_dist;
        $profile->t_state=$req->t_state;
        $profile->t_pin=$req->t_pin;
        $profile->mobile_no=$req->mobile_no;
        $profile->mobile_r=$req->mobile_r;
        $profile->id_proof_no=$req->id_proof_no;

        $profile->save();
        return redirect('/');
    }

}
