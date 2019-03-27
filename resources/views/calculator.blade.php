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
                                <div class="panel-body">Инвестиционный калькулятор</div>
                            </div>
                            <div class="form">

                                <form id="resetForm" class="form-group">
                                    <div class="form-group">
                                        <label>Сумма заинтересованности</label>
                                        <input class="form-control" type="text" id="principal">
                                    </div>
                                    <div class="form-group">
                                        <label>Годовой доход (пример: .065 %)</label>
                                        <input class="form-control" type="text" id="annualRate">
                                    </div>
                                    <div class="form-group">
                                        <label>Количество годов</label>
                                        <input class="form-control" type="text" id="years">
                                    </div>
                                    <div class="form-group">
                                        <label>Периодов в год</label>
                                        <input class="form-control" type="text" id="periodsPerYear">
                                    </div>
                                </form>

                                <button type="button" class="btn btn-success" onclick="doFV()">Рассчитать</button>
                                <button type="button" class="btn btn-warning" onclick="reset()" value="Reset form">Очистить</button>

                                <div class="output" >
                                    <h1 id="outputDiv"></h1>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function doFV() {

            // Get user input from the text field that has the id.
            var principal = parseFloat(document.getElementById('principal').value);
            var annualRate = parseFloat(document.getElementById('annualRate').value);
            var years = parseFloat(document.getElementById('years').value);
            var periodsPerYear = parseFloat(document.getElementById('periodsPerYear').value);

            // Call the function computeFutureValue(principal, annualRate, years, periodsPerYear)
            // and store the value returned by function in a variable
            var f = computeFutureValue(principal, annualRate, years, periodsPerYear);

            // Display the result
            document.getElementById('outputDiv').innerHTML = 'Доход будет примерно тг ' + f;
        }


        function computeFutureValue(principal, annualRate, years, periodsPerYear) {

            // Compute and return the future value of an investment.
            var f = principal * Math.pow(1 + annualRate / periodsPerYear, (years * periodsPerYear));

            return f.toFixed(2);

        }


        // Reset the form
        function reset() {
            document.getElementById("resetForm").reset();
        }
    </script>
@endsection