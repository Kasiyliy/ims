@extends('layouts.admin')
@section('styles')
    <style>
        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header text-center">Главная</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="panel-group">
                            <div class="alert alert-warning">
                                <div class="panel-body">Проекты ждущие сбора средсв</div>
                                <button class="btn btn-success" onclick="listView()"><i class="fa fa-bars"></i> Лист</button>
                                <button class="btn btn-danger" onclick="gridView1()"><i class="fa fa-th-large"></i> Клетка</button>
                                <button class="btn btn-primary" onclick="gridView2()"><i class="fa fa-th-large"></i> Клетка2</button>
                            </div>
                        </div>

                        @foreach($projects as $project)
                            @if($project->overall_price >  $project->sum())
                            <div class="column">
                                <div class="info-box" style="padding: 5px">
                                    <p class="text-center text-success">Проект: {{$project->title}}</p>
                                    <p style="margin: 5px">Краткое описание: {{$project->short_description}}</p>
                                    <blockquote class="blockquote-reverse" style="margin: 5px;">
                                        <p>Нужная сумма: {{$project->overall_price}}</p>
                                        <p>Собранная сумма: {{$project->sum()}}</p>
                                        <footer>Предприниматель: {{$project->user->name}}</footer>
                                    </blockquote>
                                    <br>

                                        <a href="{{route('project.details', ['id' => $project->id])}}" class="btn btn-success text-right">Читать дальше...</a>

                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user()->isEntrepreneur())
                        <div class="row">
                            <div class="alert alert-info">
                                <div class="panel-body">Мои проекты</div>
                            </div>


                            @foreach($myProjects as $project)

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box" style="padding: 5px">
                                            <p class="text-center text-success">Проект: {{$project->title}}</p>
                                            <p style="margin: 5px">Краткое описание: {{$project->short_description}}</p>
                                            <blockquote class="blockquote-reverse" style="margin: 5px;">
                                                <p>Нужная сумма: {{$project->overall_price}}</p>
                                                <p>Собранная сумма: {{$project->sum()}}</p>
                                                <footer>Предприниматель: {{$project->user->name}}</footer>
                                            </blockquote>
                                            <br>

                                            <a href="{{route('project.details', ['id' => $project->id])}}" class="btn btn-success text-right">Читать дальше...</a>

                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                            @endforeach

                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        var elements = document.getElementsByClassName("column");

        // Declare a loop variable
        var i;

        // List View
        function listView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "100%";
            }
        }

        function gridView1() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "50%";
            }
        }
        function gridView2() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "25%";
            }
        }
    </script>
@endsection