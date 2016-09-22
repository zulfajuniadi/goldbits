@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h2 class="panel-heading">
                    <a href="{{action('ProductsController@index')}}" class="btn btn-default pull-right">Back</a>
                    New Product
                </h2>
                <div class="panel-body">
                    {!! Former::open_vertical(action('ProductsController@store')) !!}
                    @include('products.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
