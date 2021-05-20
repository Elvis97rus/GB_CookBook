@extends('layouts.app')
@include('admin.menu')
@section('content')

    <div class="container-lg">
        <h1  class="display-1">Редакция рецептов</h1>
        <a href="{{ route('admin.createRecipes') }}" class="btn btn-success">Создать новый рецепт</a>

        <div class="row row-cols-auto">
            @forelse($recipes as $recipe)
            <div class="col" style="margin-bottom: 1em">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$recipe->image ?? asset('/images/default.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$recipe->name}}</h5>
                        <p class="card-text">{{$recipe->info}}</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.editRecipe', $recipe) }}" class="btn btn-warning">Редактировать</a>
                        <a href="{{ route('admin.destroyRecipes', $recipe) }}" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>

        @empty
            <h1  class="display-1">Рецептов нет</h1>
        @endforelse

        </div>



@endsection
