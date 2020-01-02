
<html>
    <head>
        @include('includes.head')

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
    <script>
        function fatchdata(method, url1, data1, callback)
        {
            alert(method+''+url1+' '+data1);
            axios({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type: method,
                url: url1,
                data:{data1}
            })
            .then(function (response) {
//                alert('axios callback');
                callback(response);
            });
        }

    </script>
</html>
