<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Content Form') }}
        </h2>
    </x-slot>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    			<div class="mt-6 text-gray-500">
			
</div> 

<form class="bg-white rounded px-8 pt-6 pb-8 mb-4 align=center w-full " method="post" action="/admin/save-content">
{{@csrf_field()}}
	
<input type="hidden" name="id" value="{{$content->id}}" />
<div class="ml-12">
      <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="title" >
        Title
      </label>
      <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="title" type="text" name="title" value="@if(!empty($content->id)){{$content->title}}@endif" placeholder="Title" required autofocus autocomplete="title">
    	</div>
		<span class="field_error">
		@error('title')
		{{$message}}
		@enderror
		</span>
		</br>
	<div class="ml-12">
	@php
           $tagged = $content->tagged;
           foreach($tagged as $row){
                $tag_name[$content->id] = $row->tag_name;
           }
        @endphp
      	<label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="title" >
        Category Tag
      	</label>
             <select class="form-input rounded-md shadow-sm mt-1 block w-full" id="category_id" name="category_id">
                @foreach($categories as $c)
                <!--option value="{{ $c->id }}" @if($c->id == $content->category_id) selected @endif>{{ $c->category_name }}</option-->
                <option value="{{ $c->category_name }}" @if($c->category_name == $tag_name[$content->id]) selected @endif>{{ $c->category_name }}</option>
                @endforeach
             </select>
    	</div>
		<br />
			
	<div class="ml-12">
    	<label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;"  for="description">
        Description
      	</label>
          
<textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" id="description" name="description" type="text"  placeholder="Description" required autofocus autocomplete="decsription">
    {{$content->description}}
	</textarea>
</div>
		</br>
		<div class="ml-12">
            <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="photo">
			Photo
			</label>
		<input class="form-input rounded-md shadow-sm mt-1 block w-full" id="photo" type="file" accept="image/*" name="photo" value="@if(!empty($content->id)){{$content->photo}}@endif" placeholder="Photo" required autofocus autocomplete="photo">
		</div>		
		<span class="field_error">
		@error('photo')
		{{$message}}
		@enderror
		</span>
		</br>
				
		<div class="ml-12">
    <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="video_code">
       Video Code
      </label>
          
<textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" id="video_code" name="video_code" type="text"  placeholder="Video_Code" autofocus autocomplete="video_code">
    {{$content->video_code}}
	</textarea>
</div>
            
			
	</br>			
	<div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
     <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled">
    Save
     </button>
     <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled" onclick="document.location='/admin/contentlist';">
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
