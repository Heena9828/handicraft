<!DOCTYPE html>
<html lang="en">

    <body>
        <div class="" style="text-align: center">

            <div class="container" style="margin-top: 85px; margin-left: 85px;">

                <div class="form-group row" >
                    {!! Form::label('sub_category_name', 'Sub Category Name:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        {!! Form::text('sub_category_name', null, array('placeholder' => 'Sub Category Name','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group row" >
                    {!! Form::label('category_id', 'Select Category:', ['class' => 'col-lg-2 control-label']) !!}

                    <div class="col-md-4" class="form-group">
                        <select name="category_id" class="form-control">
                            <option value="">--- Select Category ---</option>
                            @foreach ($arr_category as $value)
                            <option value="{{ $value['id'] }}" {{ ( isset($subcategory) && $subcategory['category_id'] == $value['id']) ? 'selected="selected"' : '' }}>{{ $value['category_name'] }}</option>
                            @endforeach
                        </select>
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