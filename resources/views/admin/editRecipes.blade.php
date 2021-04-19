@extends('layouts.app')
@include('admin.menu')
@section('content')

    <div class="container">
        <h1  class="display-1">Редакция рецептов</h1>
        <a href="{{ route('admin.createRecipes') }}" class="btn btn-danger">Создать новый рецепт</a>

        <div class="row">



            @forelse($recipes as $recipe)
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$recipe->image ?? asset('/images/default.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$recipe->name}}</h5>
                        <p class="card-text">{{$recipe->info}}</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.editRecipe', $recipe) }}" class="card-link">Редактировать</a>
                        <a href="{{ route('admin.destroyRecipes', $recipe) }}" class="card-link">Удалить</a>
                    </div>
                </div>
            </div>

        @empty
            <h1  class="display-1">Рецептов нет</h1>

        @endforelse

        </div>



@endsection
