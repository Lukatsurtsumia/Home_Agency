@extends('layouts.main')

@section('content')

{{-- Slide SHOW --}}
   @include('website.slide-show')

   {{-- Services --}}
   @include('website.services')

   {{-- --Calculator --}}
    @include('website.calculator')
   {{-- Portfolio --}}
   @include('website.portfolio.portfolio')

    {{-- Map --}}
    @include('website.map')

   {{-- About --}}
    @include('website.about')

    
     {{-- contact --}}
    @include('website.contact')

  
    

@endsection