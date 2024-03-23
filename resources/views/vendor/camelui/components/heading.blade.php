@props([ 
    // Add Custom Class
    'class' => !empty($class) ? $class : null,

    // Select Size
    'size' => !empty($label) ? $label : 'xs'
])

<div>
    <h1 class="font-bold text-black dark:text-white {{ $class }}
    {{ $size == 'none' ? null : null }}
    {{ $size == 'xs' ? 'text-xs md:text-sm lg:text-md xl:text-lg' : null }}
    {{ $size == 'sm' ? 'text-sm md:text-md lg:text-lg xl:text-xl' : null }}
    {{ $size == 'md' ? 'text-md md:text-lg lg:text-xl xl:text-2xl' : null }}
    {{ $size == 'lg' ? 'text-lg md:text-xl lg:text-2xl xl:text-3xl' : null }}
    {{ $size == 'xl' ? 'text-xl md:text-2xl lg:text-3xl xl:text-4xl' : null }}
    {{ $size == '2xl' ? 'text-2xl md:text-3xl lg:text-4xl xl:text-5xl' : null }}
    {{ $size == '3xl' ? 'text-3xl md:text-4xl lg:text-5xl xl:text-6xl' : null }}
    {{ $size == '4xl' ? 'text-4xl md:text-5xl lg:text-6xl xl:text-7xl' : null }}"
    >
        {{ $slot }}
    </h1>
</div>