@extends('layouts.admin')

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

                        @foreach($projects as $project)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box" style="padding: 5px">
                                    <p class="text-center text-success">Проект: {{$project->title}}</p>
                                    <p style="margin: 5px">Краткое описание: {{$project->short_description}}</p>
                                    <blockquote class="blockquote-reverse" style="margin: 5px;">
                                        <p>Нужная сумма: {{$project->overall_price}}</p>
                                        <p>Собранная сумма: {{$project->sum()}}</p>
                                        <footer>Предпрениматель: {{$project->user->name}}</footer>
                                    </blockquote>
                                    <br>

                                        <a href="{{route('project.details', ['id' => $project->id])}}" class="btn btn-success text-right">Читать дальше...</a>

                                </div>
                                <!-- /.info-box -->
                            </div>
                        @endforeach

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
