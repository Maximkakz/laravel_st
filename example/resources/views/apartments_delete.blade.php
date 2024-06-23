<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
.container{
width: 800px;
margin: auto;
}
</style>
</head>
<body>
<div class="container">
<h1>Удаление объекта недвижимости</h1>
<p>Идентификатор объекта № {{$id}}</p>

<form action="/apartments/{{$id}}" method="POST" >
    @method('delete')
    @csrf
    <input type="submit" value="Удалить">
</form>
</div>
</body>
</html>
