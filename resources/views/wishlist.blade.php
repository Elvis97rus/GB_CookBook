@extends('layouts.app')

@section('content')
    <div class="home_container flex flex-col">
        @include('parts.sidebar')
        <div class="main w-5/6 w-full pl-10 pt-10 pr-9">

            <div class="header">
                <div class="top-line flex justify-between text-gray-400">
                    <div class="left w-1/12 flex justify-around">
                        <span class="menu-btn material-icons">menu</span>
                        <!--span class="self-center material-icons">search</span-->
                    </div>
                    <div class="right">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <span class="pr-6 pl-2 material-icons">notifications</span>
                            <span class="pr-8 pl-2 material-icons">people</span>

                            <h1>{{ Auth::user()->name }}</h1>

                            @if (Auth::user()->is_admin)
                                <a href="{{ route('admin.index') }}">админка</a>
                            @endif
                            <h1>ссылка на редакцию профиля</h1>
                            <h1><a href="/wishlist"><3 Wishlist</a></h1>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>

            </div>

            <div class="body">
                @include('parts.separator')

                <div class="recipes-block mb-8">
                    <div class="title uppercase text-2xl text-center mb-4 mt-4">Избранные Рецепты</div>
                    <div class="mt-8 flex justify-between flex-wrap">
                    @if (isset($data))
                        <div class="mt-8 flex justify-between flex-wrap">
                            @forelse($data as $recipe)
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
                                            <div class="likes">
                                                <a href="#"
                                                   @if (in_array($recipe->id, $wishlistArr))
                                                     class="addToWishlist liked"
                                                   @else
                                                     class="addToWishlist"
                                                   @endif
                                                   data-recipe-id="{{ $recipe->id }}"
                                                   data-user-id="{{ Auth::user()->id }}">
                                                    <span class="material-icons">favorite_border</span>&nbsp;
                                                    <span class="count">{{$recipe->likes}}</span>
                                                </a>
                                            </div>
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
                        </div>
                    @else
                        <p>Нет data</p>
                    @endif
                </div>
                </div>
                @include('parts.separator')
            </div>
        </div>
        @include('parts.footer')
    </div>
@endsection
