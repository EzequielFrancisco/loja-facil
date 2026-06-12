@props(['href' => '#'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/30 focus:outline-none focus:bg-blue-50 dark:focus:bg-blue-900/30 transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</a>