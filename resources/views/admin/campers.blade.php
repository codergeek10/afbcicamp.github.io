<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link class="font-semibold text-lg" :href="route('users')" :active="request()->routeIs('users')">  {{-- class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" --}}
                {{ __('Accounts') }}
            </x-nav-link>

            <x-nav-link class="font-semibold text-lg" :href="route('users.campers')" :active="request()->routeIs('users.campers')">
                {{ __('Registrants') }}
            </x-nav-link>
        </div>
        <div class="flex gap-4 items-center">
            <p class="text-white">Total Registrants:</p>
            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white sm:size-10">
                <div class="text-blue-500 font-bold text-xl"> {{ $camperCount }} </div>
            </div>
        </div>
    </div>
</x-slot>
<div class="flex justify-between my-5 mx-5">
  <div class="flex gap-8">
    <div class="flex gap-4 items-center">
      <span class="bg-lime-600 rounded text-white text-xs p-1"> {{ __('CONFIRMED') }} </span>
      <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white sm:size-10">
          <div class="text-blue-500 font-bold text-xl"> {{ $confirmed }} </div>
      </div>
    </div>

    <div class="flex gap-4 items-center">
      <span class="bg-red-600 rounded text-white text-xs p-1"> {{ __('UNCONFIRMED') }} </span>
      <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white sm:size-10">
          <div class="text-blue-500 font-bold text-xl"> {{ $unconfirmed }} </div>
      </div>
    </div>
  </div>

  <div class="">
    <x-primary-button class="bg-blue-500 text-white" href="{{--route('add_camper')--}}"> {{__('Add New Camper')}} </x-primary-button></a>
  </div>
</div>
    <div class="p-3">
        <ul role="list" class="divide-y divide-gray-100">
            @forelse ($campers as $camper)
            <li class="flex justify-between gap-x-6 py-5">
              <div class="flex min-w-0 gap-x-4">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src=" {{asset('img/Free_Camp_Logo.jpg')}} " alt="">
                <div class="min-w-0 flex-auto">
                  <p class="text-sm font-semibold leading-6 text-gray-900"> 
                      <a href="" class="text-2sm text-blue-500">{{$camper['firstname']}} {{$camper['lastname']}}</a> {{-- {{route('camper.info', ['id' => $camper->id])}} --}}
                  </p>
                  <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$camper->email}}</p>
                </div>
              </div>
              <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                @if(!empty($camper->order_id))
                  <span class="bg-lime-600 rounded text-white text-xs p-1"> {{ __('CONFIRMED') }} </span>
                @endif
                  <span class="bg-red-600 rounded text-white text-xs p-1"> {{ __('UNCONFIRMED') }} </span>
                <p class="mt-1 text-xs leading-5 text-gray-500">Registered at: <time datetime="2023-01-23T13:23Z">{{$camper->created_at}}</time></p>
              </div>
            </li>                
            @empty
              <p class="text-lg text-white text-bold">No Camper found</p>
            @endforelse
        </ul>
        <div class="d-flex justify-content-center mt-3">
            {{ $campers->links() }}
        </div>
    </div>

</x-app-layout>