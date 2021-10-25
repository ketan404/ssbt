<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Form') }}
        </h2>
    </x-slot>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="overflow-hidden shadow-xl sm:rounded-lg">
           <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    			<div class="mt-6 text-gray-500"> 
			</div> 

<form class="bg-white rounded px-8 pt-6 pb-8 mb-4 align=center w-full " method="post" action="/admin/save-user">
{{@csrf_field()}}
	<input type="hidden" name="id" value="{{$user->id}}" />

<div class="ml-12">
      <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="name" >
        Name
      </label>
      <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="name" type="text" name="name" value="@if(!empty($user->id)){{$user->name}}@endif" placeholder="Name" required autofocus autocomplete="name">
    	</div>
		<span class="field_error">
		@error('name')
		{{$message}}
		@enderror
		</span>
		
			
			       
			<div class="ml-12">
            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="email">
			Email
			</label>
		<input class="form-input rounded-md shadow-sm mt-1 block w-full" id="email" type="text" name="email" value="@if(!empty($user->id)){{$user->email}}@endif" placeholder="Email" required autofocus autocomplete="email">
		</div>		
		<span class="field_error">
		@error('email')
		{{$message}}
		@enderror
		</span>
		</br>
		
		<div class="ml-12">
            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="email">
			Password
			</label>
		<input class="form-input rounded-md shadow-sm mt-1 block w-full" id="password" type="password" name="password" value="@if(!empty($user->id)){{$user->password}}@endif" placeholder="Password" required autofocus autocomplete="password">
		</div>		
		<span class="field_error">
		@error('email')
		{{$message}}
		@enderror
		</span>
            
			
	</br>			
	<div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
     <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled">
    Save
     </button>
     <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled" onclick="document.location='/admin/userslist';">
    Cancel
     </button>
   </div>



</form>

<style>
.field_error{color:red;}
</style>
</div>
        </div>
    </div>
 
</x-app-layout>