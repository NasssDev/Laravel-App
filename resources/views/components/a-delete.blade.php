@php
    $classes = 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-red-500 hover:text-red-700 hover:border-orange-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a href="{{$href}}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
