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

    @include('parts.separator')

    <div class="bot-line flex flex-col justify-between">
        <div class="title uppercase text-2xl text-center mb-4 mt-4">Подбор рецептов</div>
        <div class="search-form">
            <form action="{{ route('sort') }}" class="flex justify-center flex-wrap" method="GET">
                @csrf
                <div class="criteria w-4/8 mr-4">
                    <select name="kitchen-type" id="reciepe-search-field-2">
                        <option value="" disabled hidden selected>Любая кухня</option>
                        @foreach($kitchens  as $kitchen)
                            <option value="{{$kitchen->id}}">{{$kitchen->name}}</option>
                        @endforeach
                    </select>
                    <select name="difficulty" id="reciepe-search-field-3">
                        <option value="" disabled hidden selected>Сложность</option>
                        <option value="1">*</option>
                        <option value="2">**</option>
                        <option value="3">***</option>
                        <option value="4">****</option>
                        <option value="5">*****</option>
                    </select>
                    <div class="cook-time-range">
                        <div class="slidecontainer">
                            <input type="range" min="1" max="240"
                                   value="60" class="slider"
                                   name="volume" id="volume">
                            <div><span>до</span> <span id="cook-time-value"></span> <span>мин.</span></div>
                        </div>
                    </div>
                </div>
                <input type="text" class="ingredients block mr-4" name="ingredients" placeholder="Ингредиенты, детали...">
                <a href="{{ route('sort') }}"><input type="submit" value="Подобрать рецепт" class="submit-btn text-white"></a>
            </form>
        </div>
    </div>
</div>
