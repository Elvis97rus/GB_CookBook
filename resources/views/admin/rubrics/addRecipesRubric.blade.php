@extends('layouts.app')

@include('admin.menu')

@section('content')
    <div class="container">
    <ul class="list-group">
    @forelse($recipes as $recipe)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $recipe->name }}

                @if ($recipe->rubric_id == $rubric->id)
                    <span class="badge bg-primary rounded-pill"><a href="{{ route('admin.destroyRecipeRubric', [$rubric, $recipe]) }}" class="btn btn-danger">Удалить с рубрики</a></span>
            @else
                    <span class="badge bg-primary rounded-pill"><a href="{{ route('admin.addRecipeRubric', [$rubric, $recipe]) }}" class="btn btn-success">Добавить</a></span>
            @endif
            </li>
    @empty

    @endforelse
    </ul>
    </div>
@endsection
