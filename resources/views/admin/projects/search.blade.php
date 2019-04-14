@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel" style="padding: 10px;">
                    <div class="panel-header">
                        <h2>Оптимальные проекты</h2>
                    </div>
                    <div class="panel-body">
                        <form id="myForm">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            Сколько денег вы готовы вложить
                                        </label>
                                        <input class="form-control" type="number" name="money"
                                               placeholder="Введите сколько денег вы готовы вложить" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            Сфера
                                        </label>
                                        <select name="sphere_id" class="form-control" required>
                                            @foreach($spheres as $sphere)
                                                <option value="{{$sphere->id}}">{{$sphere->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="search">Искать</button>
                            </div>
                        </form>

                        <div class="container-fluid" id="results">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('datatable')
    @include('layouts.datatable')
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            var form = $('#myForm');
            form.on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url: "{{route('api/search')}}",
                    data: form.serialize(),
                    success: function (resp) {
                        $results = $('#results');
                        $results.html('');
                        console.log(resp);
                        var results = '';
                        for(var i = 0 ; i < resp.length; i++){
                            results +=getDiv(resp[i]);
                        }
                        $results.html(results);

                        for(var i = 0 ; i < resp.length; i++){
                            createLineChart(resp[i]['skolko_poluchite'],resp[i]['god'],resp[i]['project_id']);
                        }

                    }
                });
            });


            function getDiv(arr){
                var text = "<div class='panel' style='padding: 10px'><h4>Наименование проекта: <a href='/projects/"+arr['project_id']+"'>"+arr['title']+"</a></h4>" +
                    "<div class='panel-body'><p>"
                    +"Годовой доход за один процент проекта: " +arr['godovoy_dohod_za_odin_procent']+ '<br>'
                    +"Осталось собрать денег: "+arr['ostalos']+ '<br>'
                    +"ID проекта: "+arr['project_id']+ '\n'
                    +"Общая нужная для сбора сумма проекта: "+arr['project_sum']+ '<br>'
                    +"Сколько получите : "+arr['skolko_poluchite']+ '<br>'
                    +"Сейчас собрано денег: "+arr['sobrannie_dengi']+ '<br>'
                    +"Ваши деньги в процентах проекта: "+arr['vawi_dengi_procentah_projecta']+
                    "</p></div>" +
                    "<canvas id='project"+arr['project_id']+"'></canvas>" +
                "</div>";
                return text;
            }

            function createLineChart(skolko , god, projectId){

                var years = [];

                for(i = 1; i <=god; i++){
                    years.push(i);
                }

                var money = [];

                for(i = 1; i <=god; i++){
                    money.push(i*skolko);
                }

                var data = {
                    labels: years,
                    datasets: [
                        {
                            label: "Prime and Fibonacci",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: money
                        }
                    ]
                };
                var ctx = document.getElementById("project"+ projectId).getContext("2d");
                var options = { };
                var lineChart = new Chart(ctx , {
                    type: "line",
                    data: data,
                });
            }
        });
    </script>

    {{--godovoy_dohod_za_odin_procent: 1231--}}
    {{--ostalos: 18--}}
    {{--ostalos_procentov: 14.634146341463415--}}
    {{--project_id: 1--}}
    {{--project_sum: 123--}}
    {{--skolko_poluchite: 123100--}}
    {{--sobrannie_dengi: 105--}}
    {{--title: "123"--}}
    {{--vawi_dengi_procentah_projecta: 100--}}
@endsection