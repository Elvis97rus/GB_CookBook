@extends('layouts.app')
@include('admin.menu')
@section('content')

    <div class="container-lg">

        @forelse($recipes as $recipe)

            <li class="list-group-item">
                <div style="display: flex; justify-content: space-between; align-items: center;" class="alert @if ($recipe->is_true) alert-success @else alert-danger @endif " role="alert">
                    <div>
                        <h2>{{$recipe->name}}</h2>
                        <a href="{{ route('admin.editRecipe', $recipe) }}" class="badge bg-warning" style='color: white; margin: 10px;'>Редактировать</a>
                    </div>

                    <div>
                        @if ($recipe->is_true)
                            <a href="{{ route('admin.moderationToggleRecipe', $recipe) }}" class="btn btn-danger">Запретить</a>
                        @else
                            <a href="{{ route('admin.moderationToggleRecipe', $recipe) }}" class="btn btn-success">Разрешить</a>
                        @endif
                    </div>
                </div>
            </li>

        @empty
            <h1  class="display-1">Рецептов нет</h1>
        @endforelse

    </div>

@endsection
