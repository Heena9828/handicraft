@extends('layouts.default')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container" style=" margin-top: 63px; margin-left: 5%; "> 
            <div class="row"> 

                <div class="pull-left" style="margin-top: 90px;margin-left: 66px;">
                    <h2>Category Listing </h2>
                </div><br> 
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('categories.create') }}"> Add Category</a>
                </div> 
            </div>
            @if ($message = Session::get('success')) 
            <div class="alert alert-success" style="width: 50%;margin-left: 6%;" >
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered" style="width: 80%;  margin-left: 5%;">
                <tr>
                    <th>No.</th>
                    <th>Category Name</th> 
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $category->category_name}}</td> 
                    <td> 
                        <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                    </td> 
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $categories->render() !!}
            @endsection
        </div>

    </body>
</html>
