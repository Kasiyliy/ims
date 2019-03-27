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

                        <div>
                            USD_KZT : <p id="USD_KZT"></p>
                            EUR_KZT : <p id="EUR_KZT"></p>
                        </div>

                        <div class="row">

                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="number" value="1" class="form-control" name="CURR_FR_VAL"
                                               id="CURR_FR_VAL" placeholder="Введите сумму:">
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="CURR_FR" class="form-control">

                                            <option value="AED">AED</option>

                                            <option value="AFN">AFN</option>

                                            <option value="ALL">ALL</option>

                                            <option value="AMD">AMD</option>

                                            <option value="ANG">ANG</option>

                                            <option value="AOA">AOA</option>

                                            <option value="ARS">ARS</option>

                                            <option value="AUD">AUD</option>

                                            <option value="AWG">AWG</option>

                                            <option value="AZN">AZN</option>

                                            <option value="BAM">BAM</option>

                                            <option value="BBD">BBD</option>

                                            <option value="BDT">BDT</option>

                                            <option value="BGN">BGN</option>

                                            <option value="BHD">BHD</option>

                                            <option value="BIF">BIF</option>

                                            <option value="BND">BND</option>

                                            <option value="BOB">BOB</option>

                                            <option value="BRL">BRL</option>

                                            <option value="BSD">BSD</option>

                                            <option value="BTC">BTC</option>

                                            <option value="BTN">BTN</option>

                                            <option value="BWP">BWP</option>

                                            <option value="BYN">BYN</option>

                                            <option value="BYR">BYR</option>

                                            <option value="BZD">BZD</option>

                                            <option value="CAD">CAD</option>

                                            <option value="CDF">CDF</option>

                                            <option value="CHF">CHF</option>

                                            <option value="CLP">CLP</option>

                                            <option value="CNY">CNY</option>

                                            <option value="COP">COP</option>

                                            <option value="CRC">CRC</option>

                                            <option value="CUP">CUP</option>

                                            <option value="CVE">CVE</option>

                                            <option value="CZK">CZK</option>

                                            <option value="DJF">DJF</option>

                                            <option value="DKK">DKK</option>

                                            <option value="DOP">DOP</option>

                                            <option value="DZD">DZD</option>

                                            <option value="EGP">EGP</option>

                                            <option value="ERN">ERN</option>

                                            <option value="ETB">ETB</option>

                                            <option value="EUR">EUR</option>

                                            <option value="FJD">FJD</option>

                                            <option value="FKP">FKP</option>

                                            <option value="GBP">GBP</option>

                                            <option value="GEL">GEL</option>

                                            <option value="GHS">GHS</option>

                                            <option value="GIP">GIP</option>

                                            <option value="GMD">GMD</option>

                                            <option value="GNF">GNF</option>

                                            <option value="GTQ">GTQ</option>

                                            <option value="GYD">GYD</option>

                                            <option value="HKD">HKD</option>

                                            <option value="HNL">HNL</option>

                                            <option value="HRK">HRK</option>

                                            <option value="HTG">HTG</option>

                                            <option value="HUF">HUF</option>

                                            <option value="IDR">IDR</option>

                                            <option value="ILS">ILS</option>

                                            <option value="INR">INR</option>

                                            <option value="IQD">IQD</option>

                                            <option value="IRR">IRR</option>

                                            <option value="ISK">ISK</option>

                                            <option value="JMD">JMD</option>

                                            <option value="JOD">JOD</option>

                                            <option value="JPY">JPY</option>

                                            <option value="KES">KES</option>

                                            <option value="KGS">KGS</option>

                                            <option value="KHR">KHR</option>

                                            <option value="KMF">KMF</option>

                                            <option value="KPW">KPW</option>

                                            <option value="KRW">KRW</option>

                                            <option value="KWD">KWD</option>

                                            <option value="KYD">KYD</option>

                                            <option value="KZT">KZT</option>

                                            <option value="LAK">LAK</option>

                                            <option value="LBP">LBP</option>

                                            <option value="LKR">LKR</option>

                                            <option value="LRD">LRD</option>

                                            <option value="LSL">LSL</option>

                                            <option value="LVL">LVL</option>

                                            <option value="LYD">LYD</option>

                                            <option value="MAD">MAD</option>

                                            <option value="MDL">MDL</option>

                                            <option value="MGA">MGA</option>

                                            <option value="MKD">MKD</option>

                                            <option value="MMK">MMK</option>

                                            <option value="MNT">MNT</option>

                                            <option value="MOP">MOP</option>

                                            <option value="MRO">MRO</option>

                                            <option value="MUR">MUR</option>

                                            <option value="MVR">MVR</option>

                                            <option value="MWK">MWK</option>

                                            <option value="MXN">MXN</option>

                                            <option value="MYR">MYR</option>

                                            <option value="MZN">MZN</option>

                                            <option value="NAD">NAD</option>

                                            <option value="NGN">NGN</option>

                                            <option value="NIO">NIO</option>

                                            <option value="NOK">NOK</option>

                                            <option value="NPR">NPR</option>

                                            <option value="NZD">NZD</option>

                                            <option value="OMR">OMR</option>

                                            <option value="PAB">PAB</option>

                                            <option value="PEN">PEN</option>

                                            <option value="PGK">PGK</option>

                                            <option value="PHP">PHP</option>

                                            <option value="PKR">PKR</option>

                                            <option value="PLN">PLN</option>

                                            <option value="PYG">PYG</option>

                                            <option value="QAR">QAR</option>

                                            <option value="RON">RON</option>

                                            <option value="RSD">RSD</option>

                                            <option value="RUB">RUB</option>

                                            <option value="RWF">RWF</option>

                                            <option value="SAR">SAR</option>

                                            <option value="SBD">SBD</option>

                                            <option value="SCR">SCR</option>

                                            <option value="SDG">SDG</option>

                                            <option value="SEK">SEK</option>

                                            <option value="SGD">SGD</option>

                                            <option value="SHP">SHP</option>

                                            <option value="SLL">SLL</option>

                                            <option value="SOS">SOS</option>

                                            <option value="SRD">SRD</option>

                                            <option value="STD">STD</option>

                                            <option value="SYP">SYP</option>

                                            <option value="SZL">SZL</option>

                                            <option value="THB">THB</option>

                                            <option value="TJS">TJS</option>

                                            <option value="TMT">TMT</option>

                                            <option value="TND">TND</option>

                                            <option value="TOP">TOP</option>

                                            <option value="TRY">TRY</option>

                                            <option value="TTD">TTD</option>

                                            <option value="TWD">TWD</option>

                                            <option value="TZS">TZS</option>

                                            <option value="UAH">UAH</option>

                                            <option value="UGX">UGX</option>

                                            <option value="USD" selected="">USD</option>

                                            <option value="UYU">UYU</option>

                                            <option value="UZS">UZS</option>

                                            <option value="VEF">VEF</option>

                                            <option value="VND">VND</option>

                                            <option value="VUV">VUV</option>

                                            <option value="WST">WST</option>

                                            <option value="XAF">XAF</option>

                                            <option value="XCD">XCD</option>

                                            <option value="XDR">XDR</option>

                                            <option value="XOF">XOF</option>

                                            <option value="XPF">XPF</option>

                                            <option value="YER">YER</option>

                                            <option value="ZAR">ZAR</option>

                                            <option value="ZMW">ZMW</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="text-align: center;">
                                        <span class="postfix">на</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="CURR_TO" class="form-control">

                                            <option value="AED">AED</option>

                                            <option value="AFN">AFN</option>

                                            <option value="ALL">ALL</option>

                                            <option value="AMD">AMD</option>

                                            <option value="ANG">ANG</option>

                                            <option value="AOA">AOA</option>

                                            <option value="ARS">ARS</option>

                                            <option value="AUD">AUD</option>

                                            <option value="AWG">AWG</option>

                                            <option value="AZN">AZN</option>

                                            <option value="BAM">BAM</option>

                                            <option value="BBD">BBD</option>

                                            <option value="BDT">BDT</option>

                                            <option value="BGN">BGN</option>

                                            <option value="BHD">BHD</option>

                                            <option value="BIF">BIF</option>

                                            <option value="BND">BND</option>

                                            <option value="BOB">BOB</option>

                                            <option value="BRL">BRL</option>

                                            <option value="BSD">BSD</option>

                                            <option value="BTC">BTC</option>

                                            <option value="BTN">BTN</option>

                                            <option value="BWP">BWP</option>

                                            <option value="BYN">BYN</option>

                                            <option value="BYR">BYR</option>

                                            <option value="BZD">BZD</option>

                                            <option value="CAD">CAD</option>

                                            <option value="CDF">CDF</option>

                                            <option value="CHF">CHF</option>

                                            <option value="CLP">CLP</option>

                                            <option value="CNY">CNY</option>

                                            <option value="COP">COP</option>

                                            <option value="CRC">CRC</option>

                                            <option value="CUP">CUP</option>

                                            <option value="CVE">CVE</option>

                                            <option value="CZK">CZK</option>

                                            <option value="DJF">DJF</option>

                                            <option value="DKK">DKK</option>

                                            <option value="DOP">DOP</option>

                                            <option value="DZD">DZD</option>

                                            <option value="EGP">EGP</option>

                                            <option value="ERN">ERN</option>

                                            <option value="ETB">ETB</option>

                                            <option value="EUR">EUR</option>

                                            <option value="FJD">FJD</option>

                                            <option value="FKP">FKP</option>

                                            <option value="GBP">GBP</option>

                                            <option value="GEL">GEL</option>

                                            <option value="GHS">GHS</option>

                                            <option value="GIP">GIP</option>

                                            <option value="GMD">GMD</option>

                                            <option value="GNF">GNF</option>

                                            <option value="GTQ">GTQ</option>

                                            <option value="GYD">GYD</option>

                                            <option value="HKD">HKD</option>

                                            <option value="HNL">HNL</option>

                                            <option value="HRK">HRK</option>

                                            <option value="HTG">HTG</option>

                                            <option value="HUF">HUF</option>

                                            <option value="IDR">IDR</option>

                                            <option value="ILS">ILS</option>

                                            <option value="INR">INR</option>

                                            <option value="IQD">IQD</option>

                                            <option value="IRR">IRR</option>

                                            <option value="ISK">ISK</option>

                                            <option value="JMD">JMD</option>

                                            <option value="JOD">JOD</option>

                                            <option value="JPY">JPY</option>

                                            <option value="KES">KES</option>

                                            <option value="KGS">KGS</option>

                                            <option value="KHR">KHR</option>

                                            <option value="KMF">KMF</option>

                                            <option value="KPW">KPW</option>

                                            <option value="KRW">KRW</option>

                                            <option value="KWD">KWD</option>

                                            <option value="KYD">KYD</option>

                                            <option value="KZT" selected="">KZT</option>

                                            <option value="LAK">LAK</option>

                                            <option value="LBP">LBP</option>

                                            <option value="LKR">LKR</option>

                                            <option value="LRD">LRD</option>

                                            <option value="LSL">LSL</option>

                                            <option value="LVL">LVL</option>

                                            <option value="LYD">LYD</option>

                                            <option value="MAD">MAD</option>

                                            <option value="MDL">MDL</option>

                                            <option value="MGA">MGA</option>

                                            <option value="MKD">MKD</option>

                                            <option value="MMK">MMK</option>

                                            <option value="MNT">MNT</option>

                                            <option value="MOP">MOP</option>

                                            <option value="MRO">MRO</option>

                                            <option value="MUR">MUR</option>

                                            <option value="MVR">MVR</option>

                                            <option value="MWK">MWK</option>

                                            <option value="MXN">MXN</option>

                                            <option value="MYR">MYR</option>

                                            <option value="MZN">MZN</option>

                                            <option value="NAD">NAD</option>

                                            <option value="NGN">NGN</option>

                                            <option value="NIO">NIO</option>

                                            <option value="NOK">NOK</option>

                                            <option value="NPR">NPR</option>

                                            <option value="NZD">NZD</option>

                                            <option value="OMR">OMR</option>

                                            <option value="PAB">PAB</option>

                                            <option value="PEN">PEN</option>

                                            <option value="PGK">PGK</option>

                                            <option value="PHP">PHP</option>

                                            <option value="PKR">PKR</option>

                                            <option value="PLN">PLN</option>

                                            <option value="PYG">PYG</option>

                                            <option value="QAR">QAR</option>

                                            <option value="RON">RON</option>

                                            <option value="RSD">RSD</option>

                                            <option value="RUB">RUB</option>

                                            <option value="RWF">RWF</option>

                                            <option value="SAR">SAR</option>

                                            <option value="SBD">SBD</option>

                                            <option value="SCR">SCR</option>

                                            <option value="SDG">SDG</option>

                                            <option value="SEK">SEK</option>

                                            <option value="SGD">SGD</option>

                                            <option value="SHP">SHP</option>

                                            <option value="SLL">SLL</option>

                                            <option value="SOS">SOS</option>

                                            <option value="SRD">SRD</option>

                                            <option value="STD">STD</option>

                                            <option value="SYP">SYP</option>

                                            <option value="SZL">SZL</option>

                                            <option value="THB">THB</option>

                                            <option value="TJS">TJS</option>

                                            <option value="TMT">TMT</option>

                                            <option value="TND">TND</option>

                                            <option value="TOP">TOP</option>

                                            <option value="TRY">TRY</option>

                                            <option value="TTD">TTD</option>

                                            <option value="TWD">TWD</option>

                                            <option value="TZS">TZS</option>

                                            <option value="UAH">UAH</option>

                                            <option value="UGX">UGX</option>

                                            <option value="USD">USD</option>

                                            <option value="UYU">UYU</option>

                                            <option value="UZS">UZS</option>

                                            <option value="VEF">VEF</option>

                                            <option value="VND">VND</option>

                                            <option value="VUV">VUV</option>

                                            <option value="WST">WST</option>

                                            <option value="XAF">XAF</option>

                                            <option value="XCD">XCD</option>

                                            <option value="XDR">XDR</option>

                                            <option value="XOF">XOF</option>

                                            <option value="XPF">XPF</option>

                                            <option value="YER">YER</option>

                                            <option value="ZAR">ZAR</option>

                                            <option value="ZMW">ZMW</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button onclick="getCurrencyUsingJQuery()" class="btn btn-primary">Convert</button>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" id="CURR_VAL" class="form-control" readonly=""
                                       placeholder="Зажмите кнопку конвертации"
                                       style="background-color: #eee; font-weight: bold;">
                            </div>

                        </div>
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
                                <button class="btn btn-success" onclick="listView()"><i class="fa fa-bars"></i> Лист
                                </button>
                                <button class="btn btn-danger" onclick="gridView1()"><i class="fa fa-th-large"></i>
                                    Клетка
                                </button>
                                <button class="btn btn-primary" onclick="gridView2()"><i class="fa fa-th-large"></i>
                                    Клетка2
                                </button>
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

                                        <a href="{{route('project.details', ['id' => $project->id])}}"
                                           class="btn btn-success text-right">Читать дальше...</a>

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

                                        <a href="{{route('project.details', ['id' => $project->id])}}"
                                           class="btn btn-success text-right">Читать дальше...</a>

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

    <script>

        function getCurrencyUsingJQuery() {
            var currVal = $("#CURR_VAL");
            currVal.val("");

            var currFrSelect = $("#CURR_FR");
            var fr = currFrSelect.val();

            var currToSelect = $("#CURR_TO");
            var to = currToSelect.val();


            var currId = fr + "_" + to;
            var protocol = window.location.protocol.replace(/:/g, '');

            currVal.attr("placeholder", "Converting...");


            $.ajax({
                url: "http://free.currencyconverterapi.com/api/v6/convert?q=" + currId + "&compact=ultra&apiKey=9648931745dddaa30f92",
                dataType : 'jsonp',
                success : function (data) {
                    try {
                        $('#CURR_VAL').val(data[currId]);
                        alert(data[currId]);
                    } catch (e) {
                        console.log(e);
                        alert("Введите число в поле.");
                    }
                    currVal.attr("placeholder", "Зажмите кнопку конвертации");
                },
                error: function (e) {
                    console.log(e);
                }
            });

        }


        $(document).ready(function () {
            $.ajax({
                url: "http://free.currencyconverterapi.com/api/v6/convert?q=USD_KZT&compact=ultra&apiKey=9648931745dddaa30f92",
                dataType : 'jsonp',
                success : function (data) {
                    try {
                        $('#USD_KZT').html(data['USD_KZT']);
                    } catch (e) {
                        console.log(e);
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });

            $.ajax({
                url: "http://free.currencyconverterapi.com/api/v6/convert?q=EUR_KZT&compact=ultra&apiKey=9648931745dddaa30f92",
                dataType : 'jsonp',
                success : function (data) {
                    try {
                        $('#EUR_KZT').html(data['EUR_KZT']);
                    } catch (e) {
                        console.log(e);
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        });


    </script>
@endsection