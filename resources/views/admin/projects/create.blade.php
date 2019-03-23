@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px">
                    <div class="panel-header">
                        <h2>Добавить проект</h2>
                        <a  class="btn btn-primary btn-sm" href="{{route('project.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('project.store')}}" method="post">
                            <div class="form-group">
                                <label>Наименование</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Краткое описание проекта</label>
                                <textarea name="short_description" class="form-control" required>{{old('short_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Подробное описание проекта </label>
                                <textarea name="description" class="form-control" required>{{old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Отрасль инвестирования</label>
                                <select name="sphere_id" class="form-control">
                                    @foreach($spheres as $sphere)
                                        <option value="{{$sphere->id}}">{{$sphere->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Дата начала проекта</label>
                                <input type="date" name="start_date" value="{{old('start_date')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Дата окончания проекта</label>
                                <input type="date" name="end_date" value="{{old('end_date')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Страна</label>
                                <input type="text" name="country" value="{{old('country')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Город</label>
                                <input type="text" name="city" value="{{old('city')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Общая стоимость проекта</label>
                                <input type="text" name="overall_price" value="{{old('overall_price')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Срок инвестирования (лет) </label>
                                <input type="text" name="investment_time" value="{{old('investment_time')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Годовая чистая прибыль </label>
                                <input type="text" name="year_profit" value="{{old('year_profit')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Описание текущего состояния проекта </label>
                                <textarea name="current_description" class="form-control" required>{{old('current_description')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-control">
                                    <input type="checkbox" name="business_plan" value="1" >
                                    Есть бизнесплан
                                </label>
                                <label class="form-control">
                                    <input type="checkbox" name="document"  value="1">
                                    Есть лицензии и разрешительные документы
                                </label>
                                <label class="form-control">
                                    <input type="checkbox" name="asses_provided" value="1" >
                                    Проведена экспертная оценка
                                </label>
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

@section('scripts')
    <script>
        $("checkbox").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
            } else {
                $(this).attr('value', 'false');
            }

            $('#checkbox-value').text($('#checkbox1').val());
        });
    </script>
@endsection