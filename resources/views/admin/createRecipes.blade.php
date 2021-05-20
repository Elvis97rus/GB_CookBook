@extends('layouts.app')
@include('admin.menu')

@section('content')

    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST"
                              action="@if (!$recipe->id){{ route('admin.createRecipes') }}@else{{ route('admin.updateRecipes', $recipe) }}@endif"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nameRecipe">Название рецепта</label>
                                <input type="text"
                                       name="name"
                                       id="nameRecipe"
                                       class="form-control"
                                       value="{{ old('name') ?? $recipe->name}}"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="urlRecipe">URL рецепта</label>
                                <input type="text"
                                       name="slug"
                                       id="urlRecipe"
                                       class="form-control"
                                       value="{{ old('slug') ?? $recipe->slug}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="newsTitle">Описание рецепта</label>
                                <input type="text"
                                       name="description"
                                       id="newsTitle"
                                       class="form-control"
                                       value="{{ old('description') ?? $recipe->description}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="levelRecipe">Сложность:</label>
                                    <select name="level"
                                            id="levelRecipe">
                                        <option value="1" @if ($recipe->level == 1) {{'disabled hidden selected'}}} @else @endif>*</option>
                                        <option value="2" @if ($recipe->level == 2) {{'disabled hidden selected'}}} @else @endif>**</option>
                                        <option value="3" @if ($recipe->level == 3) {{'disabled hidden selected'}}} @else @endif>***</option>
                                        <option value="4" @if ($recipe->level == 4) {{'disabled hidden selected'}}} @else @endif>****</option>
                                        <option value="5" @if ($recipe->level == 5) {{'disabled hidden selected'}}} @else @endif>*****</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="kitchensRecipe">Выбрана: </label>
                                <select name="kitchen_id" id="kitchensRecipe">
                                    @foreach($kitchens  as $kitchen)
                                        @if ($kitchen->id == $recipe->kitchen_id)
                                            <option value="{{$kitchen->id}}" disabled hidden selected>{{$kitchen->name}}</option>
                                        @else
                                            <option value="{{$kitchen->id}}">{{$kitchen->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="slidecontainer">
                                    <input type="range"
                                           min="1"
                                           max="240"
                                           value="{{ old('time') ?? $recipe->time}}"
                                           class="slider"
                                           name="time"
                                           id="range-time-value">
                                    <div>
                                        <span>до</span>
                                        <span id="cook-time-val"></span>
                                        <span>мин.</span></div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ingredientsRecipe">Ингридиенты</label>
                                <input type="text"
                                       name="ingredients"
                                       id="ingredientsRecipe"
                                       class="form-control"
                                       value="{{ old('ingredients') ?? $recipe->ingredients}}"
                                       required>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">Нажмите что выбрать файл...</label>
                                    <input type="file"
                                           class="custom-file-input"
                                           id="customFile"
                                           name="image"
                                           >
                                </div>

                            </div>


                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit"
                                       value="@if ($recipe->id)Изменить @else Добавить @endif">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
