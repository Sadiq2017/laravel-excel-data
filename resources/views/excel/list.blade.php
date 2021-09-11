<!DOCTYPE html>
<html lang="en">
<head>
    <title>Список продуктов</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Таблица продуктов</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Идентификатор</th>
            <th>Scu</th>
            <th>Url</th>
            <th>Имя</th>
            <th>Описание</th>
            <th>Полное описание</th>
            <th>Цена</th>
            <th>Конвертированная цена</th>
            <th>Валюта</th>
            <th>Изображений</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->scu}}</td>
                <td>{{$product->url}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->description_full}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->converted_price}}</td>
                <td>{{$product->currency}}</td>
                <td>
                    @forelse($product->images as $image)
                        <img src="{{asset($image->path)}}" alt="image{{$image->id}}">
                    @empty
                        <p style="color: red">Нет изображения</p>
                    @endforelse
                </td>

            </tr>
        @empty
            <p style="color: red">Нет продуктов</p>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
