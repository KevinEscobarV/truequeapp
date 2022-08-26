@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 transition-colors bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium'
            : 'flex items-center p-2 hover:bg-gray-700 hover:text-white transition-colors bg-gray-800 text-gray-300 px-3 py-2 rounded-md text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span aria-hidden="true">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        {{ $path }}
      </svg>
    </span>
    <span class="ml-2 text-sm"> {{ $slot }} </span>  
</a>