<x-app-layout>
<div class="flex jutify-center my-5">
    <form action="{{route('church.add')}}" method="post" class=" w-1/2 p-3 mx-auto my-5 gap-3 ">
        @csrf
            {{-- Church name --}}
            <div>
                <x-input-label for="church" :value="__('Church Name')" />
                <x-text-input id="church" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            {{-- District --}}
            <div class="sm:col-span-3 w-full mt-3">
                <x-input-label for="district" :value="__('Choose District')" />
                <div class="mt-2 w-full">
                    <select id="district" name="district_id" autocomplete="district" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>Select District</option>
                        @foreach ($districts as $district)
                            <option value=" {{$district->id}} ">{{$district->name}}</option>
                        @endforeach
                    </select>
                    <div class="mt-3"> 
                    <x-input-error class="mt-2" :messages="$errors->get('disrtict')" />
                </div>
                </div>
            </div>

        <x-primary-button class="w-full text-center text-md text-indigo-600"> {{ __('ADD') }} </x-primary-button>
    </form>
</div>
</x-app-layout>