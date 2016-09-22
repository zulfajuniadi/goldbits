@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h2 class="panel-heading">
                    <a href="{{action('ProductsController@create')}}" class="btn btn-primary pull-right">New Product</a>
                    Products
                </h2>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Expiry Date</th>
                                <th>Average Weekly Sales</th>
                                <th>Stock Quantity</th>
                                <th>Current Price</th>
                                <th>Low Price</th>
                                <th>Mid Price</th>
                                <th>High Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->expiry_date}}</td>
                                <td>{{$product->weekly_sales}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->low_price}}</td>
                                <td>{{$product->mid_price}}</td>
                                <td>{{$product->high_price}}</td>
                                <td>
                                    {!! Former::open_vertical(action('ProductsController@destroy', ['id' => $product->id])) !!}
                                        {!! Former::hidden('_method', 'delete') !!}
                                        <a class="btn btn-primary" href="{{action('ProductsController@edit', ['id' => $product->id])}}">Update</a>
                                        <button class="btn btn-danger">Delete</button>
                                    {!! Former::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
