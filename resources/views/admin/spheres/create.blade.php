@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px">
                    <div class="panel-header">
                        <h2>Добавить категорию</h2>
                        <a  class="btn btn-primary btn-sm" href="{{route('sphere.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('sphere.store')}}" method="post">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Наименование" required>
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block" value="Добавить">
                            </div>
                        </form>
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