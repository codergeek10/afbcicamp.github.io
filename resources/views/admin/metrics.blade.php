<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Metrics Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-4 gap-8 mb-8">
                
                @include('admin.metrics.male')
                @include('admin.metrics.female')
                @include('admin.metrics.confirmed')
                @include('admin.metrics.unconfirmed')
                
            </div>
            @include('admin.metrics.church') 
        </div>
    </div>
</x-app-layout>