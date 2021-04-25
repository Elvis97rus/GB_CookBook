@extends('layouts.app')

@section('content')
    <div class="home_container flex flex-col">

        @include('parts.sidebar')

        <div class="main w-5/6 w-full pl-10 pt-10 pr-9">
    @include('parts.header')

            <div class="body">

    @include('parts.separator')
            <div class="recipes-block mb-8">
                <div class="body">
                    <div class="mt-8 flex justify-between flex-wrap">
                    @if (isset($recipes))
                            @forelse($recipes as $recipe)
                                <div class="recipe-item flex">
                                    <a href="{{ route('show', $recipe->id) }}"><div class="photo" style="background: url({{$recipe->image ?? asset('/images/default.jpg')}}) no-repeat center"></div></a>
                                    <div class="description flex flex-col justify-between">
                                        <div class="top flex flex-col justify-between">
                                            <a href="{{ route('show', $recipe->id) }}"><div class="title">{{$recipe->name}}</div></a>
                                            <div class="short-info m-auto">
                                                <ul class="flex justify-between m-auto text-center">
                                                    <li class="block list-none"><span class="material-icons">timer</span> {{$recipe->time}}</li>
                                                    <li class="block list-none"><span class="material-icons">whatshot</span>
                                                        Сложность {{$recipe->level}}</li>
                                                    <li class="block list-none"><span class="material-icons">directions_run</span> 125 ккал</li>
                                                </ul>
                                            </div>
                                            <div class="ingredients mt-4 mb-4">{{$recipe->description}}</div>
                                        </div>
                                        <div class="bot like-share flex justify-between">
                                            <div class="share">
                                                <a href="#"><img src="{{asset('/images/icons/vk.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('/images/icons/fb.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('/images/icons/ok.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Нет рецептов</p>
                            @endforelse
                    @endif
                </div>
                </div>
            </div>
    @include('parts.separator')
            </div>
        </div>
        @include('parts.footer')
    </div>
@endsection
