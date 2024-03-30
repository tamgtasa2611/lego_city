<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo_1.png') }}">
    {{--    jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
    {{--    datatable AJAX --}}
    <link href="{{asset('frontend/DataTables/datatables.css')}}" rel="stylesheet">
    <script src="{{asset('frontend/DataTables/datatables.js')}}"></script>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
        rel="stylesheet"
    />
    {{--    file css tuy chinh --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" type="text/css">
    <title>LegoCity - Tam</title>
</head>
<body class="overflow-x-hidden m-0 p-0 overflow-y-auto bg-light-subtle">
<main class="row h-100">

    <div class="d-none d-lg-block col-lg-3 col-xl-2 pe-0 shadow-3 bg-white">
        @include('partials.adminSidenav')
    </div>
    <div class="col-12 col-lg-9 col-xl-10 ps-lg-0 d-flex flex-column justify-content-between">
        <div class="p-3 pb-0">
            <div class="position-relative">
                {{-- alert --}}
                <div class="slideDown">
                    @if (session('success'))
                        @include('partials.flashMsgSuccess')
                    @endif
                    @if (session('failed'))
                        @include('partials.failed')
                    @endif
                </div>
                {{--------------- MAIN --------------}}
                {{$slot}}
                {{--------------- END MAIN --------------}}
            </div>
        </div>
    </div>
</main>
<!-- MDB -->

<script src="{{asset('frontend/js/admin.js')}}">
</script>
<script src="{{asset('frontend/mdb/js/mdb.umd.min.js')}}"></script>
</body>
</html>


