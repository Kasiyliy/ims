@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px">
                    <div class="panel-header">
                        <h2>Изменить пользователя</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h3>Email: {{$user->email}}</h3>
                            <h3>Роль: {{$user->role->name}}</h3>
                            <div class="col-sm-6">
                                <form action="{{route('profileUpdate')}}" method="post">
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Наименование" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Номер телефона</label>
                                        <input type="text" value="{{$user->phone_number}}" name="phone_number" class="form-control" placeholder="Номер телефона" required>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" value="Изменить">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{route('profileUpdatePassword')}}" method="post">
                                    <div class="form-group">
                                        <label for="name">Пароль</label>
                                        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Повторите пароль</label>
                                        <input type="password" name="repassword" class="form-control" placeholder="Повторите пароль" required>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" value="Изменить">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection