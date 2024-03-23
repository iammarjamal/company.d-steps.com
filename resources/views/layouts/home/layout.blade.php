@extends('layouts.app') @section('slot')
<div class="flex flex-col items-center justify-center phone:mt-6 tab:mt-6 laptop:mt-6 desktop:mt-8">
    
    <!-- Body -->
    <main>
        {{ $slot }}
    </main>
    <!-- Body -->

</div>
@endsection