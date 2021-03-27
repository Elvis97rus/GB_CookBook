@extends('layouts.app')

@section('content')
<div class="home_container flex flex-col">
    <div class="sidebar w-1/6 m-0 h-screen fixed hidden">
        <div class="text-2xl text-center mt-8 mb-8 title">
            <a href="/">COOK BOOK</a>
        </div>

        <ul class="menu text-center">
            <li class="uppercase"><a href="#">рецепты</a></li>
            <li class="uppercase"><a href="#">продукты</a></li>
            <li class="uppercase"><a href="#">как приготовить</a></li>
            <li class="uppercase"><a href="#">кулинарная книга</a></li>
            <li class="uppercase"><a href="#">здоровье</a></li>
            <li class="uppercase"><a href="#">авторы</a></li>
        </ul>

    </div>
    <div class="main w-5/6 w-full pl-10 pt-10 pr-9">
        <div class="header">
            <div class="top-line flex justify-between text-gray-400">
                <div class="left w-1/12 flex justify-around">
                    <span class="menu-btn material-icons">menu</span>
                    <span class="self-center material-icons">search</span>
                </div>
                <div class="right">
                    <span class="pr-6 pl-2 material-icons">notifications</span>
                    <span class="pr-8 pl-2 material-icons">people</span>
                </div>
            </div>
            <div class="hr flex justify-between">
                <hr>
                <img src="{{ asset('images/head_logo.png') }}" alt="">
                <hr>
            </div>
            <div class="bot-line flex flex-col justify-between">
                <div class="title uppercase text-2xl text-center mb-4 mt-4">Подбор рецептов</div>
                <div class="search-form">
                    <form action="" class="flex justify-center flex-wrap">
                        <div class="criteria w-4/8 mr-4">
                            <select name="dish-type" id="reciepe-search-field-1">
                                <option value="1" selected>Выпечка и десерты</option>
                                <option value="2">Гарниры</option>
                                <option value="3">Напитки</option>
                            </select>
                            <select name="kitchen-type" id="reciepe-search-field-2">
                                <option value="" disabled hidden selected>Любая кухня</option>
                                    @foreach($kitchens  as $kitchen)
                                        <option value="{{$kitchen->id}}">{{$kitchen->name}}</option>
                                    @endforeach
                            </select>
                            <select name="difficulty" id="reciepe-search-field-3">
                                <option value="" disabled hidden selected>Сложность</option>
                                <option value="2">*</option>
                                <option value="3">**</option>
                                <option value="4">***</option>
                                <option value="5">****</option>
                            </select>
                        </div>
                        <input type="text" class="ingredients block mr-4" name="ingredients" placeholder="Ингредиенты, детали...">
                        <input type="submit" value="Подобрать рецепты" class="submit-btn text-white">
                    </form>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="hot-tags-top m-auto text-center pt-10 pb-10">
                <div class="row row-1">
                    <div class="tag-item">
                        <img src="{{asset('images/top-tags/1_1.png')}}" class="" alt="">
                        <div class="info info-big">
                            <div class="tag">Блюдо дня</div>
                            <span class="name">Название и описание Рубрики</span>
                            <div class="hr flex justify-between w-1/4 m-auto">
                                <img src="{{asset('images/icons/spoon_fork.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tag-item">
                        <img src="{{asset('images/top-tags/1_2.png')}}" class="" alt="">
                        <div class="info info-big">
                            <div class="tag">лучшие рецепты недели</div>
                            <span class="name">Название и описание Рубрики</span>
                            <div class="hr flex justify-between w-1/4 m-auto">
                                <img src="{{asset('images/icons/spoon_fork.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-2">
                    <div class="tag-item">
                        <div class="long-item">
                            <div class="info">
                                <span class="tag"></span>
                                <span class="name">Название и описание Рубрики</span>
                            </div>
                            <img src="{{asset('images/top-tags/2_1.png')}}" class="" alt="">
                        </div>
                    </div>

                    <div class="tag-item comp">
                        <div class="short-item">
                            <img src="{{asset('images/top-tags/2_2_1.png')}}" class="" alt="">
                            <div class="info">
                                <span class="tag"><span class="material-icons">whatshot</span> &nbsp; полезное</span>
                                <span class="name">Название и описание Рубрики</span>
                            </div>
                        </div>
                        <div class="short-item">
                            <img src="{{asset('images/top-tags/2_2_2.png')}}" class="" alt="">
                            <div class="info">
                                <span class="tag"></span>
                                <span class="name">Название и описание Рубрики</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-3">
                    <div class="tag-item comp">
                        <div class="short-item">
                            <img src="{{asset('images/top-tags/3_1_1.png')}}" class="" alt="">
                            <div class="info">
                                <span class="tag"></span>
                                <span class="name">Название и описание Рубрики</span>
                            </div>
                        </div>
                        <div class="short-item">
                            <img src="{{asset('images/top-tags/3_1_2.png')}}" class="" alt="">
                            <div class="info">
                                <span class="tag"></span>
                                <span class="name">Название и описание Рубрики</span>
                            </div>
                        </div>
                    </div>

                    <div class="tag-item">
                        <div class="long-item">
                            <div class="info">
                                <span class="tag"></span>
                                <span class="name">Название и описание Рубрики</span>
                            </div>
                            <img src="{{asset('images/top-tags/3_2.png')}}" class="" alt="">
                        </div>
                    </div>

                </div>
            </div>

            <div class="hr flex justify-between">
                <hr>
                <img src="{{ asset('images/head_logo.png') }}" alt="">
                <hr>
            </div>

            <div class="recipes-block">
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
                        @foreach($recipes as $recipe)
                        <div class="recipe-item flex">
                            <div class="photo"><img src="/images/{{$recipe->image}}" alt="img"></div>
                            <a href="{{ route('show', $recipe->id) }}">
                                <div class="description flex flex-col justify-between">
                                    <div class="top flex flex-col justify-between">
                                        <div class="title">{{$recipe->name}}</div>
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
                                        <div class="likes"><span class="material-icons">favorite_border</span>&nbsp;<span class="count">{{$recipe->likes}}</span></div>
                                        <div class="share">
                                            <a href="#"><img src="{{asset('/images/icons/vk.png')}}" alt=""></a>
                                            <a href="#"><img src="{{asset('/images/icons/fb.png')}}" alt=""></a>
                                            <a href="#"><img src="{{asset('/images/icons/ok.png')}}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="hr flex justify-between mt-8">
                <hr>
                <img src="{{ asset('images/head_logo.png') }}" alt="">
                <hr>
            </div>

            <div class="hot-pick  flex flex-col justify-between">
                <div class="title uppercase text-2xl text-center mb-4 mt-4">#ГОРЯЧАЯПОДБОРКА</div>
                <div class="body flex mt-10 justify-between">
                    <div class="hot-pick-item"><span>похмельные рецепты</span></div>
                    <div class="hot-pick-item"><span>масленица</span></div>
                    <div class="hot-pick-item"><span>рецепты для детей</span></div>
                    <div class="hot-pick-item"><span>здоровое питание</span></div>
                </div>
            </div>

            <div class="top-authors w-4/5 flex flex-col justify-between m-auto">
                <div class="title uppercase text-2xl text-center mb-4 mt-4">Топ авторов</div>
                <div class="body flex mt-4 justify-between">
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                    <div class="author-item"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer w-5/6 w-full">
        <div class="subscribe w-1/3">
            <form action="#" id="subscribe">
                <p class="top">ПОДПИШИТЕСЬ НА РАССЫЛКУ РЕЦЕПТОВ И СОВЕТОВ</p>
                <div class="bot">
                    <input type="text" name="email" placeholder="Адрес электронной почты">
                    <button type="submit" form="subscribe"><span class="material-icons">arrow_forward_ios</span></button>
                </div>
            </form>
        </div>
        <div class="nav flex justify-between">
            <div class="menu">
                <ul class="flex justify-between">
                    <li><a href="#">ГЛАВНАЯ</a></li>
                    <li><a href="#">РЕЦЕПТЫ</a></li>
                    <li><a href="#">ИДЕИ</a></li>
                    <li><a href="#">ЖУРНАЛ</a></li>
                    <li><a href="#">АВТОРЫ</a></li>
                    <li><a href="#">РЕКЛАМА</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="socials">
                <a href="#"><img src="{{'images/icons/vk.png'}}" alt=""></a>
                <a href="#"><img src="{{'images/icons/fb.png'}}" alt=""></a>
                <a href="#"><img src="{{'images/icons/insta.png'}}" alt=""></a>
                <a href="#"><img src="{{'images/icons/gpl.png'}}" alt=""></a>
            </div>
        </div>
    </div>
</div>
@endsection
