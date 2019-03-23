@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel" style="padding: 10px">
                    <div class="panel-header">
                        <h2>Изменить проект</h2>
                        <a  class="btn btn-primary btn-sm" href="{{route('project.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('project.update' ,['id'=>$project->id])}}" method="post">
                            <div class="form-group">
                                <label>Наименование</label>
                                <input type="text" name="title" value="{{$project->title}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Краткое описание проекта</label>
                                <textarea name="short_description" class="form-control" required>{{$project->short_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Подробное описание проекта </label>
                                <textarea name="description" class="form-control" required>{{$project->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Отрасль инвестирования</label>
                                <select name="sphere_id" class="form-control">
                                    @foreach($spheres as $sphere)
                                        <option {{$project->sphere_id == $sphere->id ? 'selected': '' }} value="{{$sphere->id}}">{{$sphere->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Дата начала проекта</label>
                                <input type="date" name="start_date" value="{{$project->start_date}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Дата окончания проекта</label>
                                <input type="date" name="end_date" value="{{$project->end_date}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Страна</label>
                                <input type="text" name="country" value="{{$project->country}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Город</label>
                                <input type="text" name="city" value="{{$project->city}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Общая стоимость проекта</label>
                                <input type="text" name="overall_price" value="{{$project->overall_price}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Срок инвестирования (лет) </label>
                                <input type="text" name="investment_time" value="{{$project->investment_time}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Годовая чистая прибыль </label>
                                <input type="text" name="year_profit" value="{{$project->year_profit}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Описание текущего состояния проекта </label>
                                <textarea name="current_description" class="form-control" required>{{$project->current_description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-control">
                                    <input type="checkbox" name="business_plan" {{$project->business_plan == 1 ? 'checked' : ''}}>
                                    Есть бизнесплан
                                </label>
                                <label class="form-control">
                                    <input type="checkbox" name="document"  {{$project->document == 1  ? 'checked' : ''}}>
                                    Есть лицензии и разрешительные документы
                                </label>
                                <label class="form-control">
                                    <input type="checkbox" name="asses_provided" {{$project->asses_provided == 1  ? 'checked' : ''}}>
                                    Проведена экспертная оценка
                                </label>
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Изменить">
                            </div>
                            @if($errors)
                                @foreach($errors->all() as $error)
                                    <p class="m-1 text-danger">{{$error}}</p>
                                @endforeach
                            @endif
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