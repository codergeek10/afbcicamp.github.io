{{-- <x-primary-button x-data x-on:click="$dispatch('open-modal', 'Register for Camp')">Register for Camp</x-primary-button>
<x-modal name="Register for Camp">
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="select-none flex justify-end text-md dark:text-gray-300">
            <span x-data x-on:click="$dispatch('close-modal', 'Register for Camp')">X</span>
        </div>

        <div class="max-w-xl">
            @include('auth.camp-registration')
        </div>
    </div>
    <div class="flex items-center gap-4 p-4">
        <x-danger-button x-data x-on:click="$dispatch('close-modal', 'Register for Camp')">Close</x-danger-button>
    </div>
</x-modal> --}}

<form action="{{ route('registration.form') }}" method="get">
    @csrf
    <x-primary-button> Register for Camp </x-primary-button>
</form>