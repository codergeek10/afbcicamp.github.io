<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Camp Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your camp profile information.") }}
        </p>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Your Registration Code is ") }} <span class="font-bold text-white"> {{ $user->registrant->registration_Code }} </span>
        </p>
    </header>

    <form method="POST" action="{{ route('registration.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        {{-- First name --}}
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>

        {{-- Last name --}}
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="_email" :value="__('Email')" />
            <x-text-input id="_email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
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
            <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->registrant->phone)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        {{-- Genders --}}
        <fieldset class="flex">
            <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Gender</legend>
            <div class="flex items-center gap-x-3">
                <x-input-label for="male" :value="__('Male')" />
                <x-radio-input id="male" name="gender" :value="__('Male')" class="ms-2" />
                <x-input-error class="mt-2" :messages="$errors->get('male')" />
            </div>

            <div class="flex items-center ms-3">
                <x-input-label for="female" :value="__('Female')" />
                <x-radio-input id="female" name="gender" :value="__('Female')" class="ms-2"/>
                <x-input-error class="mt-2" :messages="$errors->get('female')" />
            </div>
        </fieldset>

        {{-- Age group --}}
        <div class="sm:col-span-3">
            <x-input-label for="age" :value="__('Choose you age group')" />
            <div class="mt-2">
              <select id="age" name="age_group" autocomplete="age-group" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm sm:max-w-xs sm:text-sm sm:leading-6">
                <option value="13-15" {{ old('age_group', $user->registrant->age_group) === '13-15' ? 'selected' : '' }}>13-15</option>
                <option value="16-19" {{ old('age_group', $user->registrant->age_group) === '16-19' ? 'selected' : '' }}>16-19</option>
                <option value="20-25" {{ old('age_group', $user->registrant->age_group) === '20-25' ? 'selected' : '' }}>20-25</option>
                <option value="26 & Over" {{ old('age_group', $user->registrant->age_group) === '26 & Over' ? 'selected' : '' }}>26 & Over</option>
              </select>
            </div>
        </div>

        {{-- Allergies and Illnesses --}}
        <fieldset class="flex">
            <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Do you have any allergies or illnesses?</legend>
            <div class="flex items-center gap-x-3">
                <x-input-label for="illness_no" :value="__('No')" />
                <x-radio-input id="illness_no" name="illness" :value="__('no')" class="ms-2" />
                <x-input-error class="mt-2" :messages="$errors->get('no')" />
            </div>

            <div class="flex items-center ms-3">
                <x-input-label for="illness_yes" :value="__('Yes')" />
                <x-radio-input id="illness_yes" name="illness" :value="__('yes')" class="ms-2"/>
                <x-input-error class="mt-2" :messages="$errors->get('yes')" />
            </div>
        </fieldset>

        {{-- Illness Type --}}
        <div>
            <x-input-label for="illness_type" :value="__('Type of illness')" />
            <x-text-area id="illness_type" name="illness_type" :value="old('illness_type', $user->registrant->illness_type)"></x-text-area>
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
                    <x-text-input id="contact_1" name="contact_1_name" type="text" class="mt-1 block w-full" :value="old('contact_1_name', $user->registrant->contact_1_name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('contact_1_name')" />
                </div>

                <div>
                    <x-input-label for="contact_1_phone" :value="__('Phone Number')" />
                    <x-text-input id="contact_1_phone" name="contact_1_phone" type="tel" class="mt-1 block w-full" :value="old('contact_1_phone', $user->registrant->contact_1_phone)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('contact_1_phone')" />
                </div>
            </fieldset>
            {{-- Contact 2 --}}
            <fieldset class="mt-3">
                <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300 mb-2">Contact 2</legend>
    
                <div>
                    <x-input-label for="contact_2" :value="__('Full Name')" />
                    <x-text-input id="contact_2" name="contact_2_name" type="text" class="mt-1 block w-full" :value="old('contact_2_name', $user->registrant->contact_2_name)" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('contact_2_name')" />
                </div>
    
                <div>
                    <x-input-label for="contact_2_phone" :value="__('Phone Number')" />
                    <x-text-input id="contact_2_phone" name="contact_2_phone" type="tel" class="mt-1 block w-full" :value="old('contact_2_phone', $user->registrant->contact_2_phone)" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('contact_2_phone')" />
                </div>
            </fieldset>
        </fieldset>

        {{-- Membership --}}
        <fieldset class="flex">
            <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Are you a member of the Assemblies of the First Born?</legend>
            <div class="flex items-center gap-x-3">
                <x-input-label for="membership_no" :value="__('No')" />
                <x-radio-input id="membership_no" name="membership" :value="__('no')" class="ms-2" />
                <x-input-error class="mt-2" :messages="$errors->get('no')" />
            </div>

            <div class="flex items-center ms-3">
                <x-input-label for="membership_yes" :value="__('Yes')" />
                <x-radio-input id="membership_yes" name="membership" :value="__('yes')" class="ms-2"/>
                <x-input-error class="mt-2" :messages="$errors->get('yes')" />
            </div>
        </fieldset>

        {{-- Church --}}
        <div class="sm:col-span-3">
            <x-input-label for="_church" :value="__('Choose you Church')" />
            <div class="mt-2">
              <select id="_church" name="church_id" autocomplete="church" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm sm:max-w-xs sm:text-sm sm:leading-6">
               @foreach ($churches as $church)
                    <option value=" {{$church->id}}" {{ old('church_id', $user->registrant->church_id) === $church->id ? 'selected' : '' }}>{{$church->name}}</option>
                @endforeach
              </select>
              {{-- <div class="mt-3">
                <x-input-label for="church" :value="__('If church name is not listed above')" />
                <x-text-input id="church" name="church_id" type="tel" class="mt-1 block w-full" autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('church_id')" />
            </div> --}}
            </div>
        </div>

        {{-- First Time Camper --}}
        <fieldset class="flex">
            <legend class="text-md font-semibold leading-6 text-gray-700 dark:text-gray-300">Are you a first time camper?</legend>
            <div class="flex items-center gap-x-3">
                <x-input-label for="attendance_no" :value="__('No')" />
                <x-radio-input id="attendance_no" name="attendance" :value="__('no')" class="ms-2" />
                <x-input-error class="mt-2" :messages="$errors->get('no')" />
            </div>

            <div class="flex items-center ms-3">
                <x-input-label for="attendance_yes" :value="__('Yes')" />
                <x-radio-input id="attendance_yes" name="attendance" :value="__('yes')" class="ms-2"/>
                <x-input-error class="mt-2" :messages="$errors->get('yes')" />
            </div>
        </fieldset>

        {{-- Youth Fellowship Roles --}}
        <div class="sm:col-span-3">
            <x-input-label for="role" :value="__('Choose you role')" />
            <div class="mt-2">
                <select id="role" name="role_id" autocomplete="role" 
                    class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 
                            rounded-md shadow-sm sm:max-w-xs sm:text-sm sm:leading-6">
                
                @foreach ($roles as $role)
                    <option value=" {{$role->id}} " {{ old('role_id', $user->registrant->role_id) === $role->id ? 'selected' : '' }}>{{$role->roles}}</option>
                @endforeach
                </select>
            </div>
        </div>

        {{-- Expections or Comments --}}
        <div>
            <x-input-label for="comment" :value="__('State your Expections or Comments')" />
            <x-text-area id="comment" name="comment" :value="old('comment', $user->registrant->comment)"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
        </div>
        
        {{-- Save button --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
