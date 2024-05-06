@extends('layouts.app') 

@section('slot')
<div class="flex flex-row items-center justify-center w-full h-full min-h-screen md:bg-bottom">
    <div class="flex flex-col w-full max-w-2xl py-12 sm:px-4 md:px-16 lg:px-24 xl:px-32">
        <!-- Logo -->
        <div class="flex flex-row items-center">
            <div class="flex flex-row items-end justify-start w-full mb-5">
                <a class="flex justify-start" href="{{ route('home.index') }}" wire:navigate>
                    <img class="w-auto h-12" src="{{ asset('assets') }}/images/brand/logo.png" alt="logo" />
                </a>
            </div>
            <div class="flex flex-row items-center justify-end w-full gap-1">
                <x-darkmode />
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