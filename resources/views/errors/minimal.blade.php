@php $title = $__env->yieldContent('code'); @endphp

@extends('layouts.app')
@section('slot')
<!-- Body -->
<main x-show="body" x-cloak>
  <div class="grid h-screen px-4 bg-white place-content-center dark:bg-zinc-900">
      <div class="flex flex-col gap-4 text-center">
          <h1 class="font-bold text-gray-300 text-9xl dark:text-gray-600">@yield('code')</h1>
      </div>
  </div>
</main>
<!-- Body -->
@endsection