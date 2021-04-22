@extends('layouts.app')

@include('admin.menu')

@section('content')
    <div class="container">
        <div class="col-12">
            <img src="{{$rubric->image ?? asset('/images/defaultRubric.png')}}" class="card-img-top" style="height: 200px; width: 200px;" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$rubric->name}}</h5>
                <form
                    method="POST"
                    action="@if (!$rubric->id){{ route('admin.createRubrics') }}@else{{ route('admin.updateRubrics', $rubric) }}@endif"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">

                        <label for="exampleInputRubricName" class="form-label">Изменить название</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            id="exampleInputRubricName"
                            value="{{ old('name') ?? $rubric->name}}">

                        <label for="exampleInputRubricSlug" class="form-label">URL</label>
                        <input type="text"
                               name="slug"
                               class="form-control"
                               id="exampleInputRubricSlug"
                               value="{{ old('slug') ?? $rubric->slug}}">

                        <div class="custom-file">
                                <label class="custom-file-label" for="customFile">Нажмите что выбрать файл...</label>
                                <input type="file"
                                       class="custom-file-input"
                                       id="customFile"
                                       name="image">
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-warning" type="submit"
                               value="@if ($rubric->id)Изменить @else Добавить @endif">
                    </div>
                </form>

                <ul class="list-group list-group-flush">
                    @if (!$rubric->id)
                        <p>Пока что еще нет рецептов</p>
                    @else
                        @forelse($recipes as $recipe)
                            <li class="btn btn-light">{{$recipe->name}} <a href="{{ route('admin.destroyRecipeRubric', [$rubric, $recipe]) }}" class="btn btn-danger"> X</a></li>
                        @empty
                            <p>Пока что еще нет рецептов</p>
                        @endforelse
                            <a href="{{ route('admin.addRecipesRubric', $rubric) }}" class="btn btn-success">Добавить рецепты</a>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
