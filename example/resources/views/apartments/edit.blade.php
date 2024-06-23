<div class="container">
<h2>{{$heading}}</h2>
@include('fragments.success')<h2>{{$heading}}</h2>

<form method="POST" action="{{$action}}" >
<div class="mb-3">
<label for="address" class="form-label">Адрес</label>
<input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp" value="{{$apartment->address}}">
<div id="addressHelp" class="form-text">Укажите точный адрес объекта недвижимости</div>
</div>
<div class="mb-3">
<label for="type" class="form-label">Укажите тип недвижимости</label>
<select class="form-select" aria-label="1" name="type" >
<option disabled>Укажите тип</option>
@foreach ($types as $type)
@if ($type[2] == $apartment->type)
<option value="{{$type[0]}}" selected >{{$type[1]}}</option>
@else
<option value="{{$type[0]}}">{{$type[1]}}</option>
@endif
@endforeach
</select>
</div>
<div class="mb-3">
<label for="rooms" class="form-label">Количество комнат</label>
<select class="form-select" aria-label="1" name="rooms">
<option selected disabled>Укажите количество комнат</option>
@foreach ($rooms as $room)
@if ($room[0] == $apartment->rooms)
<option value="{{$room[0]}}" selected >{{$room[1]}}</option>
@else
<option value="{{$room[0]}}">{{$room[1]}}</option>
@endif
@endforeach
</select>
<div id="roomsHelp" class="form-text">Сколько комнат в вашем объекте?</div>
</div>
<div class="mb-3">
<label for="price" class="form-label">Стоимость</label>
<input type="number" class="form-control" id="price" name="price" aria-describedby="priceHelp" value="{{$apartment->price}}"
<div id="priceHelp" class="form-text">Укажите стоимость в рублях</div>
</div>
@csrf
@method('PATCH')
<div class="mb-3">
<button type="submit" class="btn btn-primary">Обновить</button>
</div>
</form>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
