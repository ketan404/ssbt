@extends('layouts.cfe')
@section('content')
<link rel="stylesheet" href="/css/all.min.css" />
<link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="/css/jquery-ui.css" />
<script src="/js/jquery-3.5.1.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<script type="text/javascript">
$( function() {
    $( "#date_of_birth" ).datepicker();
  } );
</script>

<script type="text/javascript">
$( function() {
    $( "#father_dob" ).datepicker();
  } );
</script>

<script type="text/javascript">
$( function() {
    $( "#mother_dob" ).datepicker();
  } );
</script>

<script type="text/javascript">
$( function() {
    $( "#spouse_dob" ).datepicker();
  } );
</script>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
	        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <form action="/save_profile" method="POST" enctype="multipart/form-data">
				@csrf
                <div class="container" style="margin-top:40px;margin-bottom:40px;">
                    <!--row1-->
                    <div class="row">
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Name: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="name" name="name" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">S/O/D/O: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="s_o_d_o" name="s_o_d_o" type="text" required>              
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">M/O: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="m_o" name="m_o" type="text" required>                  
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-span-8">
                            <label class="block font-medium text-sm" for="date_of_birth">Date Of Birth <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="date_of_birth" name="date_of_birth" type="text" value="" placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>

                    <!--row2-->
                    <div class="row" style="margin-top:30px;">
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Father's Name: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="father_name" name="father_name" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">S/O/: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="father_s_o" name="father_s_o" type="text" required>              
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">M/O: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="father_m_o" name="father_m_o" type="text" required>                  
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="member_expiry_date">Date Of Birth <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="father_dob" name="father_dob" type="text" value="" placeholder="YYYY-MM-DD" autocomplete="off" required>               
                        </div>
                    </div>

                    <!--row3-->
                    <div class="row" style="margin-top:30px;">
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Mother's Name: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mother_name" name="mother_name" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">D/O/: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mother_d_o" name="mother_d_o" type="text" required>              
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">M/O: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mother_m_o" name="mother_m_o" type="text" required>                  
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Husband's Name: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mother_husband" name="mother_husband" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="member_expiry_date">Date Of Birth <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mother_dob" name="mother_dob" type="text" value="" placeholder="YYYY-MM-DD" autocomplete="off" required>               
                        </div>
                    </div>


                    <!--row4-->
                    <div class="row" style="margin-top:30px;">
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Spouse Name: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="spouse_name" name="spouse_name" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">D/O/: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="spouse_d_o" name="spouse_d_o" type="text" required>              
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">M/O: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="spouse_m_o" name="spouse_m_o" type="text" required>                  
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Husband's Name: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="spouse_husband" name="spouse_husband" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="spouse_dob">Date Of Birth <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="spouse_dob" name="spouse_dob" type="text" value="" placeholder="YYYY-MM-DD" autocomplete="off" required>               
                        </div>
                    </div>


                    <!--row5-->
                    <div class="row" style="margin-top:30px;">
                        <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Permanent Address: <label style="color:red;">*</label></label>
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Vill: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_vill" name="p_vill" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">PO: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_po" name="p_po" type="text" required>              
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Building No: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_building_no" name="p_building_no" type="text" required>                  
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Flat No: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_flat_no" name="p_flat_no" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Tech: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_tech" name="p_tech" type="text" required>                
                        </div>
                        <div class="col-3">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Dist: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_dist" name="p_dist" type="text" required>                
                        </div>
                        <div class="col-3">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">State: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_state" name="p_state" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Pin: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="p_pin" name="p_pin" type="text" required>                
                        </div>
                    </div>


                    <!--row6-->
                    <div class="row" style="margin-top:30px;">
                        <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Temporary Address: <label style="color:red;">*</label></label>
                        <div class="col-6">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Vill: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_vill" name="t_vill" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">PO: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_po" name="t_po" type="text" required>              
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Building No: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_building_no" name="t_building_no" type="text" required>                  
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Flat No: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_flat_no" name="t_flat_no" type="text" required>                
                        </div>
                        <div class="col-2">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Nearby: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_nearby" name="t_nearby" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Tech: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_tech" name="t_tech" type="text" required>                
                        </div>
                        <div class="col-3">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Dist: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_dist" name="t_dist" type="text" required>                
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-3">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">State: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_state" name="t_state" type="text" required>                
                        </div>
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Pin: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="t_pin" name="t_pin" type="text" required>                
                        </div>
                        <div class="col-3">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Mobile: <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mobile_no" name="mobile_no" type="text" required>                
                        </div>
                        <div class="col-3">
                            <label class="block font-medium text-sm" style=" font-size: 15px;">Mobile(R): <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="mobile_r" name="mobile_r" type="text">                
                        </div>
                    </div>


                    <!--row7-->
                    <div class="row" style="margin-top:30px;">
                        <div class="col">
                            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;">Aadhar Proof: Aadhar Card/PAN Card/Driving License/Passport/Other Proof No. <label style="color:red;">*</label></label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="id_proof_no" name="id_proof_no" type="text" required>                
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" >Save</button>
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1">Cancel</button>
                </div>
                </form>
                
    			    
                </div>
            </div>
        </div>
    </div>

@endsection