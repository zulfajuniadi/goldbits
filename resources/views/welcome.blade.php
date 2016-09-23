<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        @foreach($products as $product)
        <div class="col-xs-12 products-{{$product->id}}">
            <img src="" alt="placeholder+image">
            <h3>{{$product->name}}</h3>
            <h4>RM{{number_format($product->price, 2)}}</h4>
            <hr>
        </div>
        @endforeach
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        var lasts = {};
        setInterval(function(){
            [1,2,3,4,5].forEach(function(id){
                $.get('/products/' + id, function(results){
                    lasts[id] = lasts[id] || {};
                    if(lasts[id].price != results.price) {
                        console.log('changed', id);
                        $('img', '.products-' + id).attr('src', 'data:image/png;base64,' + results.barcode);
                        $('h3', '.products-' + id).text(results.name);
                        $('h4', '.products-' + id).text('RM' + results.price);
                        lasts[id].price = results.price;
                    }
                });
            });
        }, 1000);
    </script>
</body>
</html>
