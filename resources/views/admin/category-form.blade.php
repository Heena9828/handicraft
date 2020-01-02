@extends('layouts.default')
@section('content')
<div class="" style="text-align: center">

    <div class="container" style="margin-top: 85px; margin-left: 85px;">

        <div class="form-group row" >
            {!! Form::label('category_name', 'Category Name:', ['class' => 'col-lg-2 control-label']) !!}

            <div class="col-md-4" class="form-group">
                {!! Form::text('category_name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
                <span id="catErr" style="color: red; margin-right: 53%;"></span>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-9 offset-sm-3">
                <button type="button" name="save"  class="btn btn-primary mr-2" style="margin-right: 360px;" onclick="validate()"> <i class="fa fa-save" aria-hidden="true"></i> Save</button>
            </div>
        </div>

    </div>
</div>

<script>

    function validate()
    { 
        if ($('#category_name').val() == '') {
            $('#catErr').text('Category Name Required');
            return false;
        }

        var category_name = document.getElementById('category_name').value;
        var method = 'post';
        var url1 = '/category';
        var data1 = {
            category_name: category_name
        };

        fatchdata(method, url1, data1, function (data) {
            sucess(data);
        });

    }


    function sucess(data) {
        window.location.href = "{{URL::to('categories')}}";
    }
</script>

@endsection       