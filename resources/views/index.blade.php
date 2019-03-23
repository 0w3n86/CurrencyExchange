<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Currency Exchange Calculator</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">

</head>
<body>

<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-md-8 col-sm-12 mx-auto">

            <h1>Currency Exchange Calculator</h1>

            <label class="radio-inline"><input type="radio" id="dataType" name="dataType" value="XML" checked>XML</label>
            <label class="radio-inline"><input type="radio" id="dataType" name="dataType" value="JSON">JSON</label>


            <div class="form-group row">

                <div class="col-6 col-sm-5">

                    <input class="form-control form-control-lg" type="text" id="amount" placeholder="Amount">

                    <select class="form-control form-control-lg" id="from">
                        @foreach($currencies as $key => $currency)
                            <option value="{{ $key }}">{{ $currency }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="col-2 d-none d-sm-block my-auto">

                    <i class="fas fa-exchange-alt fa-3x"></i>

                </div>

                <div class="col-6 col-sm-5">

                    <input class="form-control form-control-lg" type="text" id="converted" placeholder="Value" readonly>

                    <select class="form-control form-control-lg" id="to">
                        @foreach($currencies as $key => $currency)
                            <option value="{{ $key }}">{{ $currency }}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="form-group row">
                <div class="col-6 mx-auto">
                    <button type="button" class="btn btn-block btn-outline-info btn-lg"> Convert </button>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- App JS -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


</body>

</html>
