
@push('js')
<link rel="stylesheet" href="/css/all.min.css" />
<link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="/css/jquery-ui.css" />
<script src="/js/jquery-3.5.1.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/jquery-ui.js"></script>




<script type="text/javascript">
    $(document).ready(function() {
    $('#users').DataTable( {
        "columnDefs": [{
            "targets":[3],
            "orderable":false,
            "className":"text-right",
        }]
    } );
} );
    function showDeleteDialog(id){
$('#delete_id').val(id);
$("#deletedialog").dialog({
        title:'Are you sure?',
        dialogClass: "alert"
});
}


</script>

@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management ') }}
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
		<div class="mt-6 text-gray-900">
		<div class="table-responsive">
		<div class="row">
                  <div class="col-12 text-right">
                    <a href="/admin/user-form/new" class="btn btn-sm btn-primary" title="Add New User"><i class="fa fa-plus" aria-hidden="true"></i></i></a></i></a>
                  </div>
                </div>
				</br>
		
        <table id="users" class="display table responsive" >
            <thead>
                <tr>
					
                    <th>Name</th>
                	<th>Email</th>
					<th class="text-right">Created</th>
                    <th class="text-right">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
				<tr>
				
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				
				<td>{{ $user->created_at }}</td>
				<td class="text-right">
				<a href="{{"/admin/user-form/".$user['id']}}" ><i class="fa fa-edit" aria-hidden="true"></i></a>
				<button  id="opener"  onclick=" showDeleteDialog({{$user->id}});"><span class="fas fa-trash-alt"></span></button>

            <div id="deletedialog" style="display:none;" class="bg-grey">
                
                <form name="deletedoc" method="post" action="/admin/user/delete">
                @csrf
			
                <input type="hidden" id="delete_id" name="id" value="{{ $user->id }}" />
                        This action can not be undone.
                        <div class="flex items-center justify-end px-4 py-3 sm:px-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled">Delete</button>
                        <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 m-1" wire:loading.attr="disabled" onclick="document.location='/admin/associatelist/';">Cancel</button>
                        </div>
                </form>

           </div>


		   	</td>
			</tr>
				
				@endforeach
				
            </tbody>
        </table>
		</div><!-- table-responsive -->
		</div><!-- mt-6 -->
		</div><!-- p-6 -->
    </div>
</div>
</div>
</x-app-layout>