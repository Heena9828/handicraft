<!DOCTYPE html>
<html lang="en">
  
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
                        {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group row" >
                    {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-9 offset-sm-3">
                        <button type="submit" name="save"  id="button" class="btn btn-primary mr-2" style="margin-right: 360px;"> <i class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>