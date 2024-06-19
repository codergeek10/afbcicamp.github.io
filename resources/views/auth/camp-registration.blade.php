<x-app-layout>
    <div class="m-8">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Camp Registration') }}
            </h2>
        </header>

        <form method="POST" action="{{ route('registration.camp') }}" class="mt-6 space-y-6">
            @csrf

            {{-- First name --}}
            <div>
                <x-input-label for="firstname" :value="__('First Name')" />
                <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('first_name', $user->firstname)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
            </div>

            {{-- Last name --}}
            <div>
                <x-input-label for="lastname" :value="__('Last Name')" />
                <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('last_name', $user->lastname)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
            </div>

            {{-- Email --}}
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            {{-- Phone Number --}}
            <div>
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            {{-- Genders --}}
            <fieldset class="flex">
                <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Gender</legend>
                <div class="flex items-center gap-x-3">
                    <x-input-label for="male" :value="__('Male')" />
                    <x-radio-input id="male" name="gender" value="male" class="ms-2" />
                    <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                </div>

                <div class="flex items-center ms-3">
                    <x-input-label for="female" :value="__('Female')" />
                    <x-radio-input id="female" name="gender" value="female" class="ms-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                </div>
            </fieldset>

            {{-- Age group --}}
            <div class="sm:col-span-3">
                <x-input-label for="age" :value="__('Choose you age group')" />
                <div class="mt-2">
                    <select id="age" name="age_group" autocomplete="age-group" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm sm:max-w-xs sm:text-sm sm:leading-6" :value="old('age_group')">
                    <option selected>Choose your age group</option>
                    <option value="13-15">13-15</option>
                    <option value="16-19">16-19</option>
                    <option value="20-25">20-25</option>
                    <option value="26 & Over">26 & Over</option>
                    </select>
                </div>
            </div>

            {{-- Allergies and Illnesses --}}
            <fieldset class="flex">
                <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Do you have any allergies or illnesses?</legend>
                <div class="flex items-center gap-x-3">
                    <x-input-label for="illness_no" :value="__('No')" />
                    <x-radio-input id="illness_no" name="illness" :value="__('no')" class="ms-2" />
                    <x-input-error class="mt-2" :messages="$errors->get('illness')" />
                </div>

                <div class="flex items-center ms-3">
                    <x-input-label for="illness_yes" :value="__('Yes')" />
                    <x-radio-input id="illness_yes" name="illness" :value="__('yes')" class="ms-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('illness')" />
                </div>
            </fieldset>

            <div>
                <x-input-label for="illness_type" :value="__('Type of illness')" />
                <x-text-area id="illness_type" name="illness_type" ></x-text-area>
                <x-input-error class="mt-2" :messages="$errors->get('illness_type')" />
            </div>

            {{-- Emergency Contacts --}}
            <fieldset>
                <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Emergency Contacts</legend>
                {{-- Contact 1 --}}
                <fieldset class="mt-3">
                    <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300 mb-2">Contact 1</legend>
                    <div>
                        <x-input-label for="contact_1" :value="__('Full Name')" />
                        <x-text-input id="contact_1" name="contact_1_name" type="text" class="mt-1 block w-full" :value="old('contact_1_name')" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_1_name')" />
                    </div>

                    <div>
                        <x-input-label for="contact_1_phone" :value="__('Phone Number')" />
                        <x-text-input id="contact_1_phone" name="contact_1_phone" type="tel" class="mt-1 block w-full" :value="old('contact_1_phone')" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_1_phone')" />
                    </div>
                </fieldset>
                {{-- Contact 2 --}}
                <fieldset class="mt-3">
                    <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300 mb-2">Contact 2</legend>
        
                    <div>
                        <x-input-label for="contact_2" :value="__('Full Name')" />
                        <x-text-input id="contact_2" name="contact_2_name" type="text" class="mt-1 block w-full" :value="old('contact_2_name')" autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_2_name')" />
                    </div>
        
                    <div>
                        <x-input-label for="contact_2_phone" :value="__('Phone Number')" />
                        <x-text-input id="contact_2_phone" name="contact_2_phone" type="tel" class="mt-1 block w-full" :value="old('contact_2_phone')" autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_2_phone')" />
                    </div>
                </fieldset>
            </fieldset>

            {{-- Membership --}}
            <fieldset class="flex">
                <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Are you a member of the Assemblies of the First Born?</legend>
                <div class="flex items-center gap-x-3">
                    <x-input-label for="membership_no" :value="__('No')" />
                    <x-radio-input id="membership_no" name="membership" value="no" class="ms-2" />
                    <x-input-error class="mt-2" :messages="$errors->get('membership')" />
                </div>

                <div class="flex items-center ms-3">
                    <x-input-label for="membership_yes" :value="__('Yes')" />
                    <x-radio-input id="membership_yes" name="membership" value="yes" class="ms-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('membership')" />
                </div>
            </fieldset>

            {{-- Church --}}
            <div class="sm:col-span-3">
                <x-input-label for="church_id" :value="__('Choose you Church')" />
                <div class="mt-2">
                    <select id="church_id" name="church_id" autocomplete="church" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>Choose your church</option>
                    @foreach ($churches as $church)
                        <option value=" {{$church->id}} ">{{$church->name}}</option>
                    @endforeach
                    </select>
                    {{-- <div class="mt-3">
                        <x-input-label for="other_church_id" :value="__('If church name is not listed above')" />
                        <x-text-input id="other_church_id" name="church_id" type="tel" class="mt-1 block w-full" :value="old('church')" autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('church')" />
                    </div> --}}
                </div>
            </div>

            {{-- First Time Camper --}}
            <fieldset class="flex">
                <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Are you a first time camper?</legend>
                <div class="flex items-center gap-x-3">
                    <x-input-label for="attendance_no" :value="__('No')" />
                    <x-radio-input id="attendance_no" name="attendance" value="no" class="ms-2" />
                    <x-input-error class="mt-2" :messages="$errors->get('attendance')" />
                </div>

                <div class="flex items-center ms-3">
                    <x-input-label for="attendance_yes" :value="__('Yes')" />
                    <x-radio-input id="attendance_yes" name="attendance" value="yes" class="ms-2"/>
                    <x-input-error class="mt-2" :messages="$errors->get('attendance')" />
                </div>
            </fieldset>

            {{-- Youth Fellowship Roles --}}
            <div class="sm:col-span-3">
                <x-input-label for="role" :value="__('Choose you role')" />
                <div class="mt-2">
                    <select id="role" name="role_id" autocomplete="role" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected>Choose your Role</option>
                    @foreach ($roles as $role)
                        <option value=" {{$role->id}} ">{{$role->roles}}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            {{-- Expections or Comments --}}
            <div>
                <x-input-label for="comment" :value="__('State your Expections or Comments')" />
                <x-text-area id="comment" name="comment" ></x-text-area>
                <x-input-error class="mt-2" :messages="$errors->get('comment')" />
            </div>
            
            {{-- Save button --}}
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

            </div>
        </form>
    </div>
</x-app-layout>