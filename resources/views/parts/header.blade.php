<div class="header">
    <div class="top-line flex justify-between text-gray-400">
        <div class="left w-1/12 flex justify-around">
            <span class="menu-btn material-icons">menu</span>
            <!--span class="self-center material-icons">search</span-->
        </div>
        <div class="right">
            <span class="pr-6 pl-2 material-icons">notifications</span>
            <span class="pr-8 pl-2 material-icons">people</span>
        </div>
    </div>

    @include('parts.separator')

    <div class="bot-line flex flex-col justify-between">
        <div class="title uppercase text-2xl text-center mb-4 mt-4">Подбор рецептов</div>
        <div class="search-form">
            <form action="" class="flex justify-center flex-wrap">
                <div class="criteria w-4/8 mr-4">
                    {{--                            <select name="dish-type" id="reciepe-search-field-1">--}}
                    {{--                                <option value="1" selected>Выпечка и десерты</option>--}}
                    {{--                                <option value="2">Гарниры</option>--}}
                    {{--                                <option value="3">Напитки</option>--}}
                    {{--                            </select>--}}
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
                <input type="submit" value="Подобрать рецепты" class="submit-btn text-white">
            </form>
        </div>
    </div>
</div>
