<div class="sidebar w-1/6 m-0 h-screen fixed hidden">
    <div class="text-2xl text-center mt-8 mb-8 title">
        <a href="/">COOK BOOK</a>
    </div>

    <ul class="menu text-center">
        @foreach($kitchens  as $kitchen)
            <li class="uppercase"><a href="{{ route('showKitchen', $kitchen->id) }}">{{$kitchen->name}}</a></li>
        @endforeach
    </ul>

</div>
