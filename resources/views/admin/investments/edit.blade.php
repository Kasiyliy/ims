@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px">
                    <div class="panel-header">
                        <h2>Изменить инвестицию</h2>
                        <a  class="btn btn-primary btn-sm" href="{{route('investment.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('investment.update' ,['id'=>$investment->id])}}" method="post">
                            <div class="form-group">
                                <label for="name">Сумма инвестиции</label>
                                <input type="number" value="{{$investment->price}}" name="price" class="form-control" placeholder="Сумма" required>
                            </div>

                            <input type="hidden" value="{{$investment->project_id}}" name="project_id" required>

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