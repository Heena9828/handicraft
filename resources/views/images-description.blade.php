<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>

    <body>

        <a href="{{ action('ProductController@create') }}"> Add Product</a>
        <div class="container">
            <div class="" style="text-align: center">

                <h3 style="">Products Details</h3>

                @foreach($pro as $image)  
                <div class="container" style="margin-top: 85px; margin-left: 85px;">

                    <div class="form-group row" > 

                        @foreach($image['productimages'] as $img) 
                        <img src="{{asset('photos/' . $img->filename.'') }}" height="200px" width="200px" style="margin-left: 30px; margin-top: 20px;">
                        @endforeach


                        <div class="form-group row" >
                            {!! Form::label('product_name', 'Product Name:', ['class' => 'col-lg-2 control-label']) !!}

                            {{ $image['product_name'] }}

                        </div>

                        <div class="form-group"> 
                            {!! Form::label('sku', 'Sku:', ['class' => 'col-lg-2 control-label']) !!}

                            {{ $image['sku'] }} 
                        </div>

                        <div class="form-group row">
                            {!! Form::label('price', 'Price:', ['class' => 'col-lg-2 control-label']) !!}

                            {{ $image['price'] }} 
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>
        </div>
    </body>
</html>