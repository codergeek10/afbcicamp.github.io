<div class="grid grid-cols-4 gap-8 w-full">
    @foreach ($churches as $church)
        <div class="flex flex-col justify-center items-center block max-w-sm p-6 bg-white border border-gray-200 
                    rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 
                    dark:hover:bg-gray-700 ">

            

                <h5 class="mb-2 text-9xl font-bold tracking-tight text-gray-900 dark:text-white"> 
                    {{$church['count']}} 
                </h5>
                <p class="font-normal text-gray-700  text-lg dark:text-lime-400 flex gap-4}}"> 
                    {{ $church['name'] }} 
                </p>
        </div>
    @endforeach
</div>