@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h2 class="panel-heading">
                    <a href="{{action('ProductsController@index')}}" class="btn btn-default pull-right">Back</a>
                    Edit Product
                </h2>
                <div class="panel-body">
                    {!! Former::open_vertical(action('ProductsController@update', ['id' => $product->id])) !!}
                    {!! Former::hidden('_method', 'put') !!}
                    {{ Former::populate($product) }}
                    {!! Former::number('price')->required()->step('0.01') !!}
                    @include('products.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
