@extends('layouts.app')

@include('admin.menu')

@section('content')
    <div class="container">
    <h1  class="display-1">Редакция рубрик</h1>
    <a href="{{ route('admin.createRubrics') }}" class="btn btn-success">Создать новую рубрику</a>

    <div class="row">
    @forelse($rubrics as $rubric)
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$rubric->image ?? asset('/images/default.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$rubric->name}}</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.editRubric', $rubric) }}" class="btn btn-warning">Редактировать</a>
                    <a href="{{ route('admin.destroyRubric', $rubric) }}" class="btn btn-danger">Удалить</a>
                </div>
            </div>
        </div>

    @empty
        <h1  class="display-1">Рецептов нет</h1>
    @endforelse
    </div>
    </div>
@endsection
