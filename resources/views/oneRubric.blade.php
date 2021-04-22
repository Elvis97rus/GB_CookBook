@extends('layouts.app')

@section('content')
    <div class="home_container flex flex-col">

        @include('parts.sidebar')

        <div class="main w-5/6 w-full pl-10 pt-10 pr-9">

            @include('parts.header')

            <div class="body">
                @include('parts.separator')

                <div class="recipes-block mb-8">
                    <div class="title uppercase text-2xl text-center mb-4 mt-4">Рецепты рубрики "{{$rubric->name}}"</div>
                    <div class="body">
                        <div class="filter w-3/5 m-auto text-center">
                            <ul class="flex cursor-pointer justify-between">
                                <li class="block list-none selected">Новые рецепты</li>
                                <li class="block list-none ">Популярные</li>
                                <li class="block list-none ">Рекомендуем</li>
                            </ul>
                        </div>
                        <div class="mt-8 flex justify-between flex-wrap">
                            @forelse($recipe as $item)
                                <div class="recipe-item flex">
                                    <div class="photo"><img src="{{$item->image ?? asset('/images/default.jpg')}}" alt="img" class="m-auto"></div>
                                    <a href="{{ route('show', $item->id) }}">
                                    <div class="description flex flex-col justify-between">
                                        <div class="top flex flex-col justify-between">
                                            <div class="title">{{$item->name}}</div>
                                            <div class="short-info m-auto">
                                                <ul class="flex justify-between m-auto text-center">
                                                    <li class="block list-none"><span class="material-icons">timer</span> {{$item->time}}</li>
                                                    <li class="block list-none"><span class="material-icons">whatshot</span>
                                                        Сложность {{$item->level}}</li>
                                                    <li class="block list-none"><span class="material-icons">directions_run</span> 125 ккал</li>
                                                </ul>
                                            </div>
                                            <div class="ingredients mt-4 mb-4">{{$item->description}}</div>
                                            <div class="ingredients mt-4 mb-4">{{$item->ingredients}}</div>
                                        </div>
                                        <div class="bot like-share flex justify-between">
                                            <div class="likes"><span class="material-icons">favorite_border</span>&nbsp;<span class="count">{{$item->likes}}</span></div>
                                            <div class="share">
                                                <a href="#"><img src="{{asset('/images/icons/vk.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('/images/icons/fb.png')}}" alt=""></a>
                                                <a href="#"><img src="{{asset('/images/icons/ok.png')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @empty
                                <p>Рубрики нет</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                @include('parts.separator')
            </div>
        </div>

        @include('parts.footer')

    </div>
@endsection
