<!DOCTYPE html>
<html lang="en">
    <head>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="http://www.formmail-maker.com/var/demo/jquery-popup-form/colorbox.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://www.formmail-maker.com/var/demo/jquery-popup-form/jquery.colorbox-min.js"></script>

        <script>
            $(document).ready(function () {
                $(".iframe").colorbox({iframe: true, fastIframe: false, width: "850px", height: "480px", transition: "fade", scrolling: false});
            });
        </script>

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="" style="text-align: center">

            <div class="container" style="margin-top: 85px; margin-left: 85px;">
                <div class="form-group row" >
                    {!! Form::label('product_name', 'Product Name:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        {!! Form::text('product_name', null, array('placeholder' => 'Product Name','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group row" >
                    {!! Form::label('sku', 'Sku:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        {!! Form::text('sku', null, array('placeholder' => 'Sku','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group row" >
                    {!! Form::label('price', 'Price:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control', 
                        'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')")) !!}
                    </div>
                </div>

                <div class="form-group row" >
                    {!! Form::label('category_id', 'Select Category:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group" >
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">--- Select Category ---</option>
                            @foreach ($arr_category as $image)
                            <option value="{{ $image['id'] }}" {{ ( isset($product) && $product['category_id'] == $image['id']) ? 'selected="selected"' : '' }}>{{ $image['category_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                <div class="form-group row" >
                    {!! Form::label('subcategory_id', 'Select Sub Category:', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-md-4" class="form-group">
                        <select name="subcategory_id" class="form-control" id="subcategory_id" >
                            <option value="">--- Select Sub Category ---</option>
                            @foreach ($arr_subcategory as $image)
                            <option value="{{ $image['id'] }}" {{ ( isset($product) && $product['subcategory_id'] == $image['id']) ? 'selected="selected"' : '' }}>{{ $image['sub_category_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row" >
                    {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group row" >
                    <div class="col-md-6" class="form-group">
                        @if(isset($product) && !empty($product) && isset($product['productimages']) )
                        @foreach ($product['productimages'] as $image) 
                        <?php //  echo $image['id'];?>
                        <a class='iframe' href="{{asset('photos/' . $image->filename.'') }}">
                            <img src="{{asset('photos/' . $image->filename.'') }}" height="40px" width="90px" ></a>
                        <a href="" class="fa fa-trash" data-id="{{$image->id}}" aria-hidden="true" id="delete-image"></a>
                        <!--<a class="btn btn-danger delete_user" href="javascript:void(0);" id="{{$image->id}}">Delete</a>-->
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group row" >
                    {!! Form::label('image', 'Product Image:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        <input multiple="multiple" name="filename[]" type="file">
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-9 offset-sm-3">
                        <button type="submit" name="save"  id="button" class="btn btn-primary mr-2" style="margin-right: 360px;"> <i class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>



        <script>

            function deleteimage()
            {
//                 var id =document.getElementById('$image->id');
                var id = $(this).attr('id');
                alert(id);

                var confirm_value = confirm("Are you sure you want to delete?");
                if (confirm_value == true)
                {
                    $.ajax({
                        url: '/delete/' + id,
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function (response) {

                        }
                    });

                }
            }

            $(document).ready(function () {
                $('#category_id').change(function () {
                    $("#business").show();
                    var c_id = $(this).val();
                    $.ajax({
                        type: "get",
                        url: "/get_subcategory/" + c_id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (res)
                        {
                            if (res)
                            {
                                $("#subcategory_id").text("").append('<option>---Select Sub Category---</option>');
                                $.each(res, function (key, value) {
                                    $("#subcategory_id").append('<option value="' + key + '">' + value + '</option>');
                                });
                            }

                        }
                    })
                });

//                $('.delete_user').click(function () {
//                    if (confirm('Are you sure?'))
//                    {
//                        var id = $(this).attr('id');
//                        alert(id);
//                        // Make an ajax call to delete the record and pass the id to identify the record
//                        
//                        $.ajax({
//                            url: '/delete/' + id,
//                            type: 'delete',
//                            headers: {
//                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                            },
//
//                            success: function (response) {
//
//                            }
//                        });
//                    }
//                });

                $("#delete-image").click(function (ev) {

                    var confirm_value = confirm("Are you sure you want to delete?");
                    if (confirm_value == true)
                    {
                        var id = $(this).attr('data-id');
                        alert(id);
                        $.ajax({
                            url: '/delete/' + id,
                            type: 'delete',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            success: function (response) {

                            }
                        });

                    }
                })
            });
        </script>

        <script>

//let productId = {{ isset($product) ?  $product['id'] : '' }};
//            alert(productId);

        </script>
