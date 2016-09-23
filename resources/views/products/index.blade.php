@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                                <th>Stocks</th>
                                <th>Current Price</th>
                                <th>Thresholds</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->expiry_date}}</td>
                                <td>
                                    {{$product->weekly_sales}} /
                                    {{$product->quantity}}
                                </td>
                                <td>
                                    <h5><b>RM {{$product->price}}</b></h5>
                                    <ul class="list-unstyled">
                                        @foreach($product->competitors as $competitor)
                                            <li>
                                                <a href="{{action('CompetitorPricesController@edit', ['id' => $competitor->id])}}">
                                                    <i class="fa fa-edit"></i>
                                                    <img class="competitor-prices" src="{{$competitor->url}}" alt="placeholder+image">
                                                    RM {{$competitor->price}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li>Low: RM {{$product->low_price}}</li>
                                        <li>Mid: RM {{$product->mid_price}}</li>
                                        <li>High: RM {{$product->high_price}}</li>
                                    </ul>
                                </td>
                                <td>
                                    {!! Former::open_vertical(action('ProductsController@destroy', ['id' => $product->id])) !!}
                                        {!! Former::hidden('_method', 'delete') !!}
                                        <a class="btn btn-block btn-sm btn-info" href="{{action('ProductsController@flashSales', ['id' => $product->id])}}">Flash</a>
                                        <a class="btn btn-block btn-sm btn-primary" href="{{action('ProductsController@edit', ['id' => $product->id])}}">Update</a>
                                        <button class="btn btn-block btn-sm btn-danger">Delete</button>
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
