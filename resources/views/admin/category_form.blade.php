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
		@if(empty($category->id))
            	{{ __('New Category') }}
		@else
		{{ __('Edit Category') }}
		@endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
	        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    			<div class="mt-6 text-gray-500">
				<form name="save-category" action="/admin/savecategory" method="post" enctype='multipart/form-data'>
				<input type="hidden" name="category_id" value="{{ $category->id }}" />	
				@csrf	
        <!-- Event Title -->
		<div class="ml-12">
             <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="category_name">Category Title <label style="color:red;">*</label></label>
             <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="category_name" name="category_name" type="text" value="{{ $category->category_name }}" required>
        </div>

	<br />
	<div class="ml-12">
             <label class="block font-medium text-sm" style=" font-size: 15px;font-weight:bold;" for="teacher">Choose Parent Category<label style="color:red;">*</label></label>
          <select name="parent" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                <option value="">---Select Parent---</option>
                <option value="0" @if($category->parent == 0) selected @endif>Main</option>
                @foreach($parents as $parent)
                <option value="{{ $parent->id }}" @if($category->parent == $parent->id) selected @endif>{{ $parent->category_name }}</option>
                @endforeach
                </select>
        </div>
        

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
     <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled" style="margin:1%;" >
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
