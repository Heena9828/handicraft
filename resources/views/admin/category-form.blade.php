<html> 
    <body>
        <div class="" style="text-align: center"> 
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row" style="margin-left: 15%; margin-top: 5%; width: 160%;">
                            <label for="category_name" class="col-md-1">{{ __('Name') }}</label>

                            <div class="col-md-4" class="form-group">

                                {!! Form::text('category_name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
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
