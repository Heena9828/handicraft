
<html>
    <head>
        @include('includes.head')

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    </head>
</head>
<style>
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        height: 10%;
        width: 80%;
    }
</style>
<body>
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>

        <div id="sidebar" class="col-md-4">
            @include('layouts.sidebar')
        </div>

        <div class="row" style="margin-left: 127px;margin-top: 105px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container"></div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!--        <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                @include('includes.footer')
                            </div>
                        </div>
                    </div>
                </footer>-->
</body>
</html>
