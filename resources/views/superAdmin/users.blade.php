<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link class="font-semibold text-lg" :href="route('users')" :active="request()->routeIs('users')">  {{-- class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" --}}
                    {{ __('Accounts') }}
                </x-nav-link>

                <x-nav-link class="font-semibold text-lg" :href="route('users.campers')" :active="request()->routeIs('users.campers')">
                    {{ __('Campers') }}
                </x-nav-link>
            </div>
            <div class="flex gap-4 items-center">
                <p class="text-white">Total Users:</p>
                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white sm:size-10">
                    <div class="text-blue-500 font-bold text-xl"> {{ $userCount }} </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                       <thead class="whitespace-nowrap text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">{{ __('User ID') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Name') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Email') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Email Status') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('User Type') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Created_at') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Updated_at') }}</th>
                            @superadmin
                                <th scope="col" class="px-6 py-3">{{ __('') }}</th>
                            @endsuperadmin
                        </tr>
                       </thead>
                       <tbody>
                        @foreach ($users as $user)
                            <tr class=" whitespace-nowrap odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user['id'] }} 
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $user['firstname'] }} {{ $user['lastname'] }} </td>
                                <td class="px-6 py-4"> {{ $user['email'] }} </td>
                                <td class="px-6 py-4">
                                     @if( $user->hasVerifiedEmail() )
                                        <span class="bg-lime-600 rounded text-white text-xs p-1"> {{ __('VERIFIED') }} </span>
                                     @else
                                        <span class="bg-red-600 rounded text-white text-xs p-1"> {{ __('NOT VERIFIED') }} </span>
                                     @endif
                                </td>
                                <td class="px-6 py-4"> {{ $user['user_type'] }} </td>
                                <td class="px-6 py-4"> {{ $user['created_at'] }} </td>
                                <td class="px-6 py-4"> {{ $user['updated_at'] }} </td>
                                @superadmin
                                    <td class="px-6 py-4">
                                        @if($user->user_type != 1)
                                            <form action="{{route('make.admin',['user_id'=>$user['id']])}}" method="POST">
                                                @csrf
                                                @method('patch')
                                                @if($user->user_type == 3)
                                                    <x-primary-button class="h-9 w-100">Make Admin</x-primary-button>
                                                @else
                                                    <x-primary-button>Remove Admin</x-primary-button>
                                                @endif
                                            </form>
                                        @endif
                                    </td>
                                @endsuperadmin
                            </tr>
                        @endforeach
                       </tbody>
                    </table>
                </div>
                <div class="mt-3 text-center">
                    {{ $users->links() }}
                    @if (session('admin'))
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __(session('admin')) }}</p>
                    @endif

                    @if (session('normal'))
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 3000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __(session('normal')) }}</p>
                @endif
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>