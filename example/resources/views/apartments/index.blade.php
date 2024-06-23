<div class="container">
<h2>{{$heading}}</h2>
@include('fragments.success')
<div style="display:flex; flex-wrap: wrap">
@foreach ($apartments as $apartment)
<div class="card" style="width: 18rem; margin:5px">
<div class="card-body">
<a href="{{$apartment->actionShow}}">
<h5 class="card-title">Комнат: {{$apartment->rooms}}</h5>
</a>
<p class="card-text">{{$apartment->address}}</p>
<p class="card-text">Цена: {{$apartment->price}}руб.</p>
<form method="POST" action="{{$apartment->actionDelete}}">
<a href="{{$apartment->actionEdit}}" class="btn btn-primary">Изменить</a>
@method('DELETE')
@csrf
<button class="btn btn-light">Удалить</button>
</form>
</div>
</div>
@endforeach
</div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
