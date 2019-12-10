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
                <form method="post" action="{{url('products')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

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
                            {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group row" >
                        {!! Form::label('category_id', 'Select Category:', ['class' => 'col-lg-2 control-label']) !!}

                        <div class="col-md-4" class="form-group">
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="">--- Select Category ---</option>
                                @foreach ($arr_category as $value)
                                <option value="{{ $value['id'] }}" {{ ( isset($product) && $product['category_id'] == $value['id']) ? 'selected="selected"' : '' }}>{{ $value['category_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" >
                        {!! Form::label('subcategory_id', 'Select Sub Category:', ['class' => 'col-lg-2 control-label']) !!}

                        <div class="col-md-4" class="form-group">
                            <select name="subcategory_id" class="form-control" id="subcategory_id" >
                                 <option value="">--- Select Sub Category ---</option>
                            </select>
                        </div>
                    </div>
                    <!--                    <div class="form-group row" >
                                            {!! Form::label('images', 'Product Images:', ['class' => 'col-lg-2 control-label']) !!}
                    
                                            <div class="col-md-4" class="form-group">
                                                <input multiple="multiple" name="product_images[]" type="file"> 
                                            </div>
                                        </div>-->

                    <div class="form-group row" >
                        {!! Form::label('images', 'Product Images:', ['class' => 'col-lg-2 control-label']) !!}

                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" id="image-upload" name="image_upload[]" enctype="multipart/form-data" multiple>
                            </div>



                            <div class="form-group row" >
                                {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}

                                <div class="col-md-4" class="form-group">
                                    {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-9 offset-sm-3">
                                    <button type="submit" name="save"  id="button" class="btn btn-primary mr-2" style="margin-right: 360px;"> <i class="fa fa-save" aria-hidden="true"></i> Save</button>
                                </div>
                            </div> 
                        </form>
                    </div>
            </div>
        </div>


    </body>
</html>
<!--<script>
$.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});

$('#image-upload').change(function () {
    event.preventDefault();
    let image_upload = new FormData();
    let TotalImages = $('#image-upload')[0].files.length;  //Total Images
    let images = $('#image-upload')[0];

    for (let i = 0; i < TotalImages; i++) {
        image_upload.append('images' + i, images.files[i]);
    }

    image_upload.append('TotalImages', TotalImages);

    $.ajax({
        method: 'POST',
//        url: '/store/',
        url: "{{route('products.store')}}", 
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: image_upload,
        contentType: false,
        processData: false,
        success: function (images) {
            console.log(`ok ${images}`)
        },
        error: function () {
            console.log(`Failed`)
        }
    })

})



</script>-->

<script>
    $(document).ready(function () {

        $('#category_id').change(function () {
//            $("#subcategory_id").text("");
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
                        $.each(res, function (key, value) {
                            $("#subcategory_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                }
            })
        });
    });




</script>
