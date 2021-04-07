@extends('layouts.app')

@section('content')
    <div class="home_container flex flex-col">

        @include('parts.sidebar')

        <div class="main w-5/6 w-full pl-10 pt-10 pr-9">
    @include('parts.header')

            <div class="body">
    @include('parts.separator')

                  {{ var_dump($data) }}

    @include('parts.separator')
            </div>

        </div>

        @include('parts.footer')
    </div>
@endsection
