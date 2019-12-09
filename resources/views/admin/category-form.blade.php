<!DOCTYPE html>
<html lang="en">
    <head>
         <meta name="csrf-token" content="{{ csrf_token() }}"> 
    </head>
    <body>
        <div class="" style="text-align: center">

            <div class="container" style="margin-top: 85px; margin-left: 85px;">

                <div class="form-group row" >
                    {!! Form::label('category_name', 'Category Name:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                       {!! Form::text('category_name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
                    </div>
                </div>

              
                <div class="form-group row">
                    <div class="col-md-9 offset-sm-3">
                        <button type="button" name="save"  id="button" class="btn btn-primary mr-2" style="margin-right: 360px;"> <i class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>