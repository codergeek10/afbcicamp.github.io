<div class="flex flex-col justify-center items-center block max-w-sm p-6 bg-white border border-gray-200 
rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 
dark:hover:bg-gray-700 ">

    @if ($male > $female)

        <h5 class="mb-2 text-9xl font-bold tracking-tight text-gray-900 dark:text-white"> 
            {{$male}} 
        </h5>
        <p class="font-normal text-gray-700  text-lg dark:text-lime-400 flex gap-4}}"> 
            {{ __('Male') }} 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
            </svg>
        </p>
        
    @else
        <h5 class="mb-2 text-9xl font-bold tracking-tight text-gray-900 dark:text-white"> 
            {{$male}} 
        </h5>
        <p class="font-normal text-gray-700  text-lg dark:text-red-400 flex gap-4}}"> 
            {{ __('Male') }} 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
            </svg>
        </p>
    @endif
</div>