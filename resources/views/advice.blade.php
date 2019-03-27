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
                    <div class="panel-header text-center">СОВЕТЫ</div>

                </div>
            </div>
            <div class="container-fluid">
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="panel-group">
                            <div class="alert alert-warning">
                                <div class="panel-body">Советы от известных людей</div>

                            </div>
                        </div>


                        <div class="info-box" style="padding: 5px">
                            <div class="info-box" style="padding: 5px">
                                <p class="text-center text-success">BLAH BLASH</p>
                                <p style="margin: 5px">BLAH BLASH</p>
                                <blockquote class="blockquote-reverse" style="margin: 5px;">
                                    <footer>AUTHOR</footer>
                                </blockquote>
                                <br>

                            </div>
                        </div>
                        <br>
                        <div class="info-box" style="padding: 5px">
                            <div class="info-box" style="padding: 5px">
                                <p class="text-center text-success">BLAH BLASH</p>
                                <p style="margin: 5px">BLAH BLASH</p>
                                <blockquote class="blockquote-reverse" style="margin: 5px;">
                                    <footer>AUTHOR</footer>
                                </blockquote>
                                <br>

                            </div>
                        </div>


                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
