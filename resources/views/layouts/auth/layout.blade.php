@extends('layouts.app')

@section('slot')
<div class="flex flex-row items-center justify-center w-full h-full min-h-screen tab:bg-bottom">
    <div class="flex flex-col w-full max-w-2xl py-12 phone:px-4 tab:px-16 laptop:px-24 desktop:px-32">
        <!-- Logo -->
        <div class="flex flex-row items-center">
            <div class="flex flex-row items-end justify-start w-full mb-5">
                <x-logo />
            </div>
            <div class="flex flex-row items-center justify-end w-full gap-1">
                {{-- <x-general.language /> --}}
                <x-general.darkmode />
            </div>
        </div>
        <!-- Logo -->

        <!-- Body -->
        <div class="pt-4">
            {{ $slot }}
        </div>
        <!-- Body -->
    </div> 
</div>
@endsection
