@props([
  // Add Custom Class
  'class' => !empty($class) ? $class : null,

  // Customize Backgraound
  'backgraound' => !empty($backgraound) ? $backgraound : 'normal',

  // Customize Border
  'borderColor' => !empty($borderColor) ? $borderColor : 'normal',
  'borderSize' => !empty($borderSize) ? $borderSize : 'normal',

  // Customize Rounded
  'rounded' => !empty($rounded) ? $rounded : 'normal',
])

<div class=
  "
  {{ $class }} 

  {{ $backgraound == 'none' ? '' : null }}
  {{ $borderColor == 'normal' ? 'bg-zinc-50 dark:bg-zinc-800' : null }}

  {{ $borderColor == 'none' ? '' : null }}
  {{ $borderColor == 'normal' ? 'border-zinc-200 dark:border-zinc-600' : null }}

  {{ $borderSize == 'none' ? 'border-0' : null }}
  {{ $borderSize == 'normal' ? 'border' : null }}
  {{ $borderSize == '2' ? 'border-2' : null }}
  {{ $borderSize == '4' ? 'border-4' : null }}
  {{ $borderSize == '8' ? 'border-8' : null }}

  {{ $rounded == 'none' ? 'rounded-none' : null }}
  {{ $rounded == 'sm' ? 'rounded-sm' : null }}
  {{ $rounded == 'normal' ? 'rounded' : null }}
  {{ $rounded == 'md' ? 'rounded-md' : null }}
  {{ $rounded == 'lg' ? 'rounded-lg' : null }}
  {{ $rounded == 'xl' ? 'rounded-xl' : null }}
  {{ $rounded == '2xl' ? 'rounded-2xl' : null }}
  {{ $rounded == '3xl' ? 'rounded-3xl' : null }}
  {{ $rounded == 'full' ? 'rounded-full' : null }}
  shadow sm:p-2 md:p-4 lg:p-6 xl:p-8
  "
  >
  {{ $slot }}
</div>