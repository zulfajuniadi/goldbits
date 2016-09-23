@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h2 class="panel-heading">
                    <a href="{{action('CompetitorPricesController@index')}}" class="btn btn-default pull-right">Back</a>
                    Edit Competitor Price
                </h2>
                <div class="panel-body">
                    <h4>{{$competitorPrice->product->name}} for <img class="competitor-prices-md" src="{{$competitorPrice->url}}" alt="placeholder+image"></h4>
                    {!! Former::open_vertical(action('CompetitorPricesController@update', ['id' => $competitorPrice->id])) !!}
                        {!! Former::hidden('_method', 'put') !!}
                        {{ Former::populate($competitorPrice) }}
                        {!! Former::number('price')->required()->step('0.01') !!}
                        <div class="form-group">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    {!! Former::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
