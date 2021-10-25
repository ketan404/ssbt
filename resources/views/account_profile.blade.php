@push('js')
<link rel="stylesheet" href="/css/all.min.css" />
<link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="/css/jquery-ui.css" />
<script src="/js/jquery-3.5.1.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/jquery-ui.js"></script>


<script type="text/javascript">
$( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
@endpush

<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
		{{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
                   @if(Session::has('alert-' . $msg))
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                                <div class="mt-6 text-gray-900 leading-7 font-semibold ">
                                        <span @if($msg == 'danger') style="color:red" @endif>{{ Session::get('alert-' . $msg) }}</span>
                                </div>
                        </div>
                   @endif
               @endforeach
	        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    			<div class="mt-6 text-gray-500">
				<form name="save-profile" action="/saveprofile" method="post" enctype='multipart/form-data'>
				<input type="hidden" name="profile_id" value="{{ $profile->id }}" />	
				@csrf	
        <!-- Event Title -->
		<div class="col-span-8">
             <label class="block font-medium text-sm" for="profile_name">Name<label style="color:red;">*</label></label>
             <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="profile_name" name="profile_name" type="text" value="{{ auth()->user()->name }}" required>
        </div>
	<br/>
	<div class="col-span-8 md:col-span-2">
        <label class="block font-medium text-sm"  for="profile_name">Mother/Father/Guardian Name</label>
        <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="parents_name" name="parents_name" type="text" value="{{ $profile->parents_name }}">
        </div>
	<br/>
	<div class="col-span-8">
          <label class="block font-medium text-sm" for="teacher">Class<label style="color:red;">*</label></label>
          <select name="class" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                <option value="">---Select Class---</option>
		@for($i=1;$i<=10;$i++)
		<option value="{{ $i }}" @if($profile->class == $i) selected @endif>{{ $i }}</option>
		@endfor	
          </select>
        </div>
	<br/>
	<div class="col-span-8">
        <label class="block font-medium text-sm"  for="school">School<label style="color:red;">*</label></label>
        <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="school" name="school" type="text" value="{{ $profile->school }}" required>
        </div>
	<br/>
	<div class="col-span-8">
             <label class="block font-medium text-sm" for="date_of_birth">Date Of Birth <label style="color:red;">*</label></label>
             <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="datepicker" name="date_of_birth" type="text" value="{{ $profile->date_of_birth }}" placeholder="YYYY-MM-DD" required>
        </div>
	<br/>
	<div class="col-span-8">
        <label class="block font-medium text-sm"  for="city">City<label style="color:red;">*</label></label>
        <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="city" name="city" type="text" value="{{ $profile->city }}" required>
        </div>
	<br/>
	<div class="col-span-8">
        <label class="block font-medium text-sm"  for="parents_email">Mother/Father/Guardian's Email<label style="color:red;">*</label></label>
        <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="parents_email" name="parents_email" type="text" value="{{ $profile->parents_email }}" required>
        </div>
	<br/>
	<div class="col-span-8">
        <label class="block font-medium text-sm"  for="city">Mother/Father/Guardian's Mobile<label style="color:red;">*</label></label>
        <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="parents_mobile" name="parents_mobile" type="text" value="{{ $profile->parents_mobile }}" required>
        </div>

        

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
     <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled">
    Save
     </button>
     <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled" onclick="document.location='/admin/content_categories';">
    Cancel
     </button>
   </div>
                            </div>
				</form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
