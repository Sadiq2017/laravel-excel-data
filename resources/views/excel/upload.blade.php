<!DOCTYPE html>
<html lang="en">
<head>
    <title>Загрузка файла</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Загрузка файла</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Упс!</strong> С вашим вводом возникли некоторые проблемы.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error-message'))
        <div class="alert alert-danger">
            <strong>{{session('error-message')}}</strong>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong><a href="{{route('list')}}">ПОКАЗАТЬ</a>
        </div>
    @endif

    <form action="{{route('upload-excel')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Файл:</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <button type="submit" class="btn btn-default">Отправить</button>
    </form>
    @if (session('data'))
        <form action="{{route('import-data')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-default">Далее</button>
        </form>
        <?php dump(session('data'));?>
    @endif
</div>

</body>
</html>
