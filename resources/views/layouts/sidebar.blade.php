<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav" style="margin-right: -152px;margin-left: -226px;margin-bottom: -47px;margin-top: -10px;">
        <li>
            <a href="{{ action('HomeController@index') }}"> Dashbord</a>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user-plus"></i>  Category<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-1" class="collapse">
                <li><a href="{{ action('CategoryController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Category</a></li>
                <li><a href="{{ action('CategoryController@index') }}"><i class="fa fa-angle-double-right"></i>LIST Category</a></li> 
            </ul>
        </li> 


    </ul>

</div>