@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb"  style="margin-right: 21%; margin-top: 100px; margin-left: 20%;" >
        <div class="pull-left">
            <h2>Edit Category</h2>
        </div>
        <br>
        <div class="pull-left"style="margin-left: 50%;">
            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{!! Form::model($category, ['method' => 'PATCH','route' => ['categories.update', $category->id]]) !!}
@include('admin.category-form')
{!! Form::close() !!}
@endsection
