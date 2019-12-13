<!DOCTYPE html>
<html lang="en">
    <head>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


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

                <!--                <div class="form-group row" id="business"  style="display:none;" >
                                    {!! Form::label('subcategory_id', 'Select Sub Category:', ['class' => 'col-lg-2 control-label']) !!}
               
                                    <div class="col-md-4" class="form-group">
                                        <select name="subcategory_id" class="form-control" id="subcategory_id" >
                                            <option value="">--- Select Sub Category ---</option>
                                        </select>
                                    </div>
                                </div>-->


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

                @if(isset($product) && !empty($product) && isset($product['productimages']) )

                @foreach ($product['productimages'] as $image) 
{
                <img src="{{ asset('/storage/app/'.$image->filename) }}" height="30px" width="30px">


                @endforeach
                @endif

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

}
);
        </script>

        <script>

//let productId = {{ isset($product) ?  $product['id'] : '' }};
//            alert(productId);

        </script>
