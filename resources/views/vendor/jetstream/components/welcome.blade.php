<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
	<!--
        <x-jet-application-logo class="block h-12 w-auto" />
	-->
    </div>

    <div class="mt-8 text-2xl">
        Welcome to CFE Dashboard
    </div>

    <div class="mt-6 text-gray-500">
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Categories</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
			Children For Environment is a platform to educate and sensitize children about the beauty, magnificence, and importance of nature to enable them to grow up as nature loving and preserving adults given that the children of today will become the leaders of tomorrow	
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Payments</div>
        </div>

        <div class="ml-12">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                           @if(Session::has('alert-' . $msg))
                                                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                                                <div class="mt-6 text-gray-900 leading-7 font-semibold ">
                                                <span style="color:green; font-weight:bold;">{{ Session::get('alert-' . $msg) }}</span>
                                                </div>
                                                </div>
                                           @endif
                                        @endforeach

		@php $cents = 100; @endphp
            <div class="mt-2 text-sm text-gray-500">
			@php
				$user_details = \App\Models\Profile::where('user_id',auth()->user()->id)->first();
				$member_expiry_date = $user_details->member_expiry_date;
				$today= date('Y-m-d');
				
				
			@endphp
                        <div>
				@if(!empty($member_expiry_date))
				Membership Validity: {{ $member_expiry_date }}
				@endif
				@if(empty($member_expiry_date))
				<x-jet-button class="ml-4">
                            		<a href="/plans">Subscribe</a>
                		</x-jet-button>
				@elseif($today >= $member_expiry_date)
				<x-jet-button class="ml-4">
                            		<a href="/payments/premium">Renew</a>
                		</x-jet-button>
				@endif

                        </div>

            </div>

                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Details</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
			Children For Environment is a platform to educate and sensitize children about the beauty, magnificence, and importance of nature to enable them to grow up as nature loving and preserving adults given that the children of today will become the leaders of tomorrow	
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Reports</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
			Children For Environment is a platform to educate and sensitize children about the beauty, magnificence, and importance of nature to enable them to grow up as nature loving and preserving adults given that the children of today will become the leaders of tomorrow	
            </div>
        </div>
    </div>
</div>
