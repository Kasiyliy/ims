@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-header" style="padding: 10px;">
                        <h2>Добавить инвестицию</h2>
                        <a  class="btn btn-primary btn-sm" href="{{route('investment.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('investment.store')}}" method="post">
                            <div class="form-group">
                                <label for="name">Сколько инвестиций хотите привлечь?</label>
                                <input type="number" name="price" class="form-control" placeholder="Инвестиции" required>
                            </div>

                            <div class="form-group">
                                <label for="project">Проект</label>
                                <select name="project_id" class="form-control">
                                    @foreach($projects as $project)
                                        <option {{app('request')->input('projectId') == $project->id ? 'selected' : '' }} value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                </select>
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