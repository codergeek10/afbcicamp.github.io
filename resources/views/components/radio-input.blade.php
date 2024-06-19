@props(['disabled' => false])

<input type="radio" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-4 w-4 border-gray-300 dark:text-indigo-600 focus:ring-indigo-600']) !!}>
