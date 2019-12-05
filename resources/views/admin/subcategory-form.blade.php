<html> 
    <body>
        <div class="" style="text-align: center"> 
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row" style="margin-left: 15%; margin-top: 5%; width: 160%;">
                            <label for="sub_category_name" class="col-md-1">{{ __('Name') }}</label>

                            <div class="col-md-4" class="form-group">

                                {!! Form::text('sub_category_name', null, array('placeholder' => 'Sub Category Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group row"style="margin-left:  22%">
                            <label for="category_id" class="col-md-1">Select Category:</label>
                            <div class="col-md-4" class="form-group">
                                <select name="category_id" class="form-control">

                                    <option value="">--- Select Category ---</option>
                                    @foreach ($arr_category as $value)
                                    <option value="{{ $value['id'] }}" {{ ( isset($subCategory) && $subCategory['category_id'] == $value['id']) ? 'selected="selected"' : '' }}>{{ $value['category_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-9 offset-sm-3">
                                <button type="submit" name="save"  id="button" class="btn btn-primary mr-2"> <i class="fa fa-save" aria-hidden="true"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>
