
<html>
    <head>
        @include('includes.head')
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
            <div iclass="container">

                @yield('content')
                <!--@include('includes.footer')-->

            </div>



        </div>
    </body>
</html>
<script>
    function global(type1, url1, data1, callback)
    {
        axios({
            type: type1,
            url: url1,
            data: data1, 
        })

                .then(function (response) {
                    callback(response);
                }); 
    }
</script>