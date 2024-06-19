<x-app-layout>

    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link class="font-semibold text-lg" 
            :href="route('church')" :active="request()->routeIs('church')">  {{-- class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" --}}
                {{ __('Churches') }}
            </x-nav-link>

            <x-nav-link class="font-semibold text-lg" 
            :href="route('church')" :active="request()->routeIs('church')">
                {{ __('Districts') }}
            </x-nav-link>

            <x-nav-link class="font-semibold text-lg" 
            :href="route('church')" :active="request()->routeIs('church')">
                {{ __('Zones') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end mx-6">
                    <form action="{{route('church.create')}}" method="get" class="my-5 d-flex justify-content-end">
                        <x-primary-button>{{ __('Create New Church') }}</x-primary-button>
                    </form>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="my-3 text-center">
                        {{ $churches->links() }}
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                       <thead class="whitespace-nowrap text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">{{ __('ID') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Name') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('District') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Zone') }}</th>
                            @superadmin
                                <th scope="col" class="px-6 py-3">{{ __('') }}</th>
                            @endsuperadmin
                        </tr>
                       </thead>
                       <tbody>
                        @forelse ($churches as $church)
                            <tr class=" whitespace-nowrap odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $church['id'] }} 
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $church['name'] }} </td>
                                <td class="px-6 py-4"> {{ $church->district->name }} </td>
                                <td class="px-6 py-4"> {{ $church->district->zone->name }} </td>
                                @superadmin
                                    <td class="px-6 py-4">
                                        
                                            <form action="{{route('make.admin',['user_id'=>$church['id']])}}" method="POST">
                                                @csrf
                                                @method('patch')
                                                    <x-danger-button class="h-9 w-100">Remove</x-danger-button>
                                            </form>
                                    </td>
                                @endsuperadmin
                            </tr>
                        @empty
                            <tr class=" whitespace-nowrap odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap"> {{ __('No Churches Found') }} </td>
                            </tr>
                        @endforelse
                       </tbody>
                    </table>
                </div>

                <div class="mt-3 text-center">
                    {{ $churches->links() }}
                </div>

            </div>
            
        </div>
    </div>
</x-app-layout>