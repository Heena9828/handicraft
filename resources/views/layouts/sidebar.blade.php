<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav" style="margin-right: -152px;margin-left: -226px;margin-bottom: -47px;margin-top: -10px;">
        <li>
            <a href="{{ action('HomeController@index') }}"> Dashbord</a>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user-plus"></i>  Category<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-1" class="collapse">
                <li><a href="{{ action('CategoryController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Category</a></li>
                <li><a href="{{ action('CategoryController@index') }}"><i class="fa fa-angle-double-right"></i> LIST Category</a></li> 
            </ul>
        </li> 

        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-user-plus"></i> Sub Category<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-2" class="collapse">
                <li><a href="{{ action('SubCategoryController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Sub Category</a></li>
                <li><a href="{{ action('SubCategoryController@index') }}"><i class="fa fa-angle-double-right"></i> LIST Sub Category</a></li> 
            </ul>
        </li> 

        <li>
            <a href="#" data-toggle="collapse" data-target="#products"><i class="fa fa-fw fa-user-plus"></i>  Products<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="products" class="collapse">
                <li><a href="{{ action('ProductController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Product</a></li>
                <li><a href="{{ action('ProductController@index') }}"><i class="fa fa-angle-double-right"></i> LIST Product</a></li> 
            </ul>
        </li> 


    </ul>

</div>
