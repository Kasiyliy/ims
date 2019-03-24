@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel panel-primary" style="padding: 10px">
                    <div class="panel-header">
                        <a class="btn btn-primary btn-sm" href="{{route('home')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <h3>Предпрениматель: {{$project->user->name}}</h3>

                        @if($project->overallSum >= $project->sum())
                        @if(\Illuminate\Support\Facades\Auth::user()->isInvestor() )
                            <div class="text-right">
                                <button type="button" class="btn btn-danger  mr-1" data-toggle="modal"
                                        data-target="#exampleModal">
                                    Подать заявку на инвестицию <span class="fa fa-mail-forward"></span>
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{route('investment.store')}}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Заявка</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Сумма</label>
                                                    <input type="number" min="0" class="form-control" name="price">
                                                    <input type="hidden" name="project_id" value="{{$project->id}}">
                                                </div>
                                                {{csrf_field()}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Отмена
                                                </button>
                                                <input type="submit" value="Подать" class="btn btn-danger btn-sm mr-1">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @else
                            <div class="alert alert-success">
                                <ul>
                                    Проект собрал нужную сумму
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Наименование</label>: {{$project->title}}
                                </div>
                                <div class="form-group">
                                    <label>Краткое описание проекта</label>: {{$project->short_description}}
                                </div>
                                <div class="form-group">
                                    <label>Подробное описание проекта </label>: {{$project->description}}
                                </div>
                                <div class="form-group">
                                    <label>Отрасль инвестирования</label>: {{$project->sphere->name}}
                                </div>
                                <div class="form-group">
                                    <label>Дата начала проекта</label>: {{$project->start_date}}
                                </div>
                                <div class="form-group">
                                    <label>Дата окончания проекта</label>: {{$project->end_date}}
                                </div>
                                <div class="form-group">
                                    <label>Страна</label>: {{$project->country}}
                                </div>
                                <div class="form-group">
                                    <label>Город</label>: {{$project->city}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Общая стоимость проекта</label>: {{$project->overall_price}}
                                </div>
                                <div class="form-group">
                                    <label>Срок инвестирования (лет) </label>: {{$project->investment_time}}
                                </div>
                                <div class="form-group">
                                    <label>Годовая чистая прибыль </label>: {{$project->year_profit}}
                                </div>
                                <div class="form-group">
                                    <label>Описание текущего состояния
                                        проекта </label>: {{$project->current_description}}
                                </div>

                                <div class="form-group">
                                    <label>Есть бизнесплан:</label> {{$project->business_plan == 1 ? 'Есть' : 'Нет'}}
                                </div>
                                <div class="form-group">
                                    <label>Есть лицензии и разрешительные
                                        документы: </label> {{$project->document == 1  ? 'Есть' : 'Нет'}}
                                </div>
                                <div class="form-group">
                                    <label>Проведена экспертная
                                        оценка:</label> {{$project->asses_provided == 1  ? 'Есть' : 'Нет'}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Инвесторы</h2>
                                <table class="table table-hover table-responsive">
                                    <thead>
                                    <th>ID</th>
                                    <th>Цена</th>
                                    <th>Инвестор</th>
                                    <th>Номер телефона</th>
                                    <th>Дата трансфера</th>
                                    </thead>
                                    <tbody>
                                    @foreach($investments as $investment)
                                        <tr>
                                            <td>{{$investment->id}}</td>
                                            <td>{{$investment->price}}</td>
                                            <td>{{$investment->user->name}}</td>
                                            <td>{{$investment->user->phone_number}}</td>
                                            <td>{{$investment->user->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-sm-6">
                                <h2>Статистика</h2>
                                <canvas id="barChart" width="100%" height="50%"></canvas>
                            </div>
                            @if(count($investments) > 0)
                                <div class="col-sm-6">
                                    <canvas id="pieChart" width="100%" height="50%"></canvas>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        var ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Надо собрать', 'Собрано'],
                datasets: [{
                    label: 'Статистика по собранной сумме' ,
                    data: [{{$project->overall_price}}, {{$project->sum()}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx2 = document.getElementById('pieChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        @foreach($investments as $investment)
                        {{$investment->price}},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach($investments as $investment)
                        dynamicColors(),
                        @endforeach
                    ],
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    @foreach($investments as $investment)
                    '{{$investment->user->name}}',
                    @endforeach
                ]
            },
            options: Chart.defaults.pie
        });
    </script>
@endsection