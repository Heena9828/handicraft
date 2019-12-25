<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/fontawesome-all.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css" /> 
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet"> 

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>

        <a href="{{ action('ProductController@create') }}"> Add Product</a>

        <div class="" style="text-align: center">
            <div class="container" style="margin-top: 85px; margin-left: 85px;">
                <h3 style="">Products</h3>
                <br>

               
                @foreach($pro as $image)
                
                    <img src="{{asset('photos/' . $image->filename.'') }}" height="200px" width="200px" style="margin-left: 30px; margin-top: 20px;">
                </a>
                @endforeach

            </div>
        </div>

    </body>
</html>