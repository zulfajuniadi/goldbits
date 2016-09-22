    {!! Former::text('name')->required() !!}
    {!! Former::text('url')->required() !!}
    {!! Former::date('expiry_date')->required() !!}
    {!! Former::number('weekly_sales')->value(100)->required() !!}
    {!! Former::number('quantity')->value(1000)->required() !!}
    {!! Former::number('low_price')->required() !!}
    {!! Former::number('mid_price')->required() !!}
    {!! Former::number('high_price')->required() !!}
<div class="form-group">
    <button class="btn btn-primary">Save</button>
</div>
{!! Former::close() !!}
