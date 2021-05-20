@extends('layouts.app')

@include('admin.menu')

@section('content')
    <div class="container-lg" style='display: flex; flex-direction: column;'>
    <h1  class="display-4">Управление пользователями</h1>
    <a href="createUser" class="btn btn-outline-success" style='align-self:flex-end;'>Создать</a>


    <div class="card" style="margin-top: 1rem;">
        <ul class="list-group list-group-flush">
            @forelse($users as $user)
                <li class="list-group-item">
                    <div style='display: flex; justify-content: space-between; align-items: center;'>
                        <div>
                            {{$user->id}}. {{$user->name}}
                            @if ($user->is_admin)
                                <span class="badge bg-success" style='color: white; margin-left: 10px;'>Админ</span>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('admin.editUser', $user) }}" class="btn btn-outline-warning">Редактировать</a>
                            <a href="{{ route('admin.destroyUser', $user) }}" class="btn btn-outline-danger">Удалить</a>
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">Пользователей нет.</li>
            @endforelse
        </ul>
    </div>
    </div>
@endsection
