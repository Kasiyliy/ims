@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px;">
                    <div class="panel-header">
                        <h2>Инвестиции</h2>
                        <a class="btn btn-success btn-sm" href="{{route('investment.create')}}">Добавить</a>
                    </div>
                    <div class="panel-body">
                        <table id="dataTable" class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Сумма</th>
                                <th>Проект</th>
                                <th>Дата инвестиции</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($investments as $investment)
                                <tr>
                                    <td>{{$investment->id}}</td>
                                    <td>{{$investment->price}}</td>
                                    <td>{{$investment->project->title}}</td>
                                    <td>{{$investment->created_at}}</td>
                                    <td class="d-flex">

                                        <button type="button" class="btn btn-danger btn-xs mr-1" data-toggle="modal" data-target="#exampleModal{{$investment->id}}">
                                            Удалить
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$investment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{route('investment.delete', ['id' => $investment->id ])}}">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Предупреждение!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Вы точно хотите удалить?
                                                            {{csrf_field()}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                                            <input type="submit" value="Удалить" class="btn btn-danger btn-sm mr-1">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{route('investment.edit' ,['id'=>$investment->id ])}}" class="btn-xs btn btn-primary">Изменить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('datatable')
    @include('layouts.datatable')
@endsection