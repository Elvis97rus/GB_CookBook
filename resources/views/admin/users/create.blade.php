@extends('layouts.app')
@include('admin.menu')

@section('content')

    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST"
                              action="@if (!$user->id){{ route('admin.createUser') }}@else{{ route('admin.updateUser', $user) }}@endif"
                              enctype="multipart/form-data">
                            @csrf
                            <p class="h2">Создание пользователя</p>
                            <div class="form-group">
                                <label for="nameUser">Имя</label>
                                <input type="text"
                                       name="name"
                                       id="nameUser"
                                       class="form-control"
                                       value="{{ old('name') ?? $user->name}}"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="emailUser">Email</label>
                                <input type="email"
                                       name="email"
                                       id="emailUser"
                                       class="form-control"
                                       value="{{ old('email') ?? $user->email}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="passwordUser">Пароль</label>
                                <input type="password"
                                       name="password"
                                       id="passwordUser"
                                       class="form-control"
                                       required
                                >
                            </div>
                            <div class="form-group">
                                <label for="adminUser">Дать права администратора?</label>
                                    <select name="is_admin"
                                            id="adminUser">
                                        <option value="0" @if (!$user->is_admin) {{'selected'}} @endif>Нет</option>
                                        <option value="1" @if ($user->is_admin) {{'selected'}} @endif>Да</option>
                                    </select>
                            </div>


                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit"
                                       value="@if ($user->id)Изменить @else Добавить @endif">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
