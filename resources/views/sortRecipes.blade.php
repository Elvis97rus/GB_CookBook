@extends('layouts.app')

@section('content')
    <div class="home_container flex flex-col">

        @include('parts.sidebar')

        <div class="main w-5/6 w-full pl-10 pt-10 pr-9">
    @include('parts.header')

            <div class="body">
    @include('parts.separator')

                <div class="mt-8 flex justify-between flex-wrap">
                    @if (isset($data))
                        @forelse($data as $item)
                            <div class="recipe-single-item text-center w-4/5 m-auto">
{{--                                <div class="photo" style="background: url('/images/{{$item->image}}') no-repeat center"></div>--}}
                                <a href="{{ route('show', $item->id) }}">
                                    <div class="description flex flex-col justify-between">
                                        <div class="top flex flex-col justify-between">
                                            <div class="title">{{$item->name}}</div>
                                            <div class="photo"><img src="{{$item->image ?? asset('/images/default.jpg')}}" alt="img" class="m-auto"></div>
                                            <div class="short-info m-auto">
                                                <ul class="flex justify-between m-auto text-center">
                                                    <li class="block list-none"><span class="material-icons">timer</span> {{$item->time}}</li>
                                                    <li class="block list-none"><span class="material-icons">whatshot</span>
                                                        Сложность {{$item->level}}</li>
                                                    <li class="block list-none"><span class="material-icons">directions_run</span> 125 ккал</li>
                                                </ul>
                                            </div>
                                            <div class="ingredients mt-4 mb-4">{{$item->description}}</div>
                                        </div>
                                        <div class="bot like-share flex justify-between">
{{--                                            <div class="likes">--}}
{{--                                                <a href="#"--}}
{{--                                                   @if (in_array($item->id, $wishlistArr))--}}
{{--                                                    class="addToWishlist liked"--}}
{{--                                                   @else--}}
{{--                                                   @guest--}}
{{--                                                    class="goToLogin"--}}
{{--                                                   @else--}}
{{--                                                    class="addToWishlist"--}}
{{--                                                   @endguest--}}
{{--                                                   @endif--}}
{{--                                                    data-recipe-id="{{ $item->id }}"--}}
{{--                                                   @guest--}}
{{--                                                   @else--}}
{{--                                                    data-user-id="{{Auth::user()->id}}"--}}
{{--                                                    @endguest--}}
{{--                                                >--}}
{{--                                                    <span class="material-icons">favorite_border</span>&nbsp;--}}
{{--                                                    <span class="count">{{$item->likes}}</span>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}

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
                            <p>Рецепт не найден</p>
                        @endforelse
                    @endif
                </div>

    @include('parts.separator')
            </div>
        </div>
        @include('parts.footer')
    </div>
@endsection
