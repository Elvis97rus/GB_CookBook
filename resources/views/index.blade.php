@extends('layouts.app')

@section('content')

    <div class="home_container flex flex-col">
        @include('parts.sidebar')
    <div class="main w-5/6 w-full pl-10 pt-10 pr-9">
        @include('parts.header')
        <div class="body">
            <div class="hot-tags-top m-auto text-center pt-10 pb-10">
                <div class="row row-1">
                    <div class="tag-item">
                        <img src="{{asset('images/top-tags/1_1.png')}}" class="" alt="">
                        <div class="info info-big">
                            <div class="tag">Блюдо дня</div>
                            <a href="{{ route('show', $bestRecipes->id) }}"><span class="name">{{$bestRecipes->name}}</span></a>
                            <div class="hr flex justify-between w-1/4 m-auto">
                                <img src="{{asset('images/icons/spoon_fork.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tag-item">
                        <img src="{{asset('images/top-tags/1_2.png')}}" class="" alt="">
                        <div class="info info-big">
                            <div class="tag">лучший сложный рецепт недели</div>
                            <a href="{{ route('show', $maxLevelRecipes->id) }}"><span class="name">{{$maxLevelRecipes->name}}</span></a>
                            <div class="hr flex justify-between w-1/4 m-auto">
                                <img src="{{asset('images/icons/spoon_fork.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-2">
                    @forelse($rubrics as $rubric)
                        <a href="{{ route('showRubric', $rubric->id) }}" class="tag-item">
                            <div class="long-item">
                                <div class="info">
                                    <span class="tag"></span>
                                    <span class="name">{{$rubric->name}}</span>
                                </div>
                                <img src="{{$rubric->image ?? asset('/images/defaultRubric.png')}}" class="" alt="">
                            </div>
                        </a>
                    @empty
                        <p>Рубрик нет</p>
                    @endforelse
                </div>
            </div>

            @include('parts.separator')

            <div class="recipes-block mb-8">
                <div class="title uppercase text-2xl text-center mb-4 mt-4">Рецепты</div>
                <div class="body">
                    <div class="filter w-3/5 m-auto text-center">
                        <ul class="flex cursor-pointer justify-between">
                            <li class="block list-none selected">Новые рецепты</li>
                            <li class="block list-none ">Популярные</li>
                            <li class="block list-none ">Рекомендуем</li>
                        </ul>
                    </div>
                    <div class="mt-8 flex justify-between flex-wrap">
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
                                        <div class="likes">
                                            <a href="#"
                                               @if (in_array($recipe->id, $wishlistArr))
                                                 class="addToWishlist liked"
                                               @else
                                                   @guest
                                                     class="goToLogin"
                                                   @else
                                                     class="addToWishlist"
                                                   @endguest
                                               @endif
                                               data-recipe-id="{{ $recipe->id }}"
                                               @guest
                                               @else
                                               data-user-id="{{Auth::user()->id}}"
                                               @endguest
                                            >
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
                </div>
            </div>

            @include('parts.separator')

            <div class="hot-pick  flex flex-col justify-between">
                <div class="title uppercase text-2xl text-center mb-4 mt-4">#ГОРЯЧАЯПОДБОРКА</div>

                <div class="body flex mt-10 justify-between">

                    @foreach($kitchens as $kitchen)

                        <div class="hot-pick-item"><a href="{{ route('showKitchen', $kitchen->id) }}"><span>{{$kitchen->name}}</span> </a></div>

                    @endforeach

                </div>

            </div>

            <div class="top-authors w-4/5 flex flex-col justify-between m-auto">
                <div class="title uppercase text-2xl text-center mb-4 mt-4">Топ авторов</div>
                <div class="body flex mt-4 justify-between">
                    @foreach($users as $user)
                        <div class="author-item" style="text-align: center">{{ $user->foto }}</div>
                    @endforeach
                </div>
    </div>
        @include('parts.footer')
</div>
@endsection
