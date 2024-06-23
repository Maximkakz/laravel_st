<div class="container">
<h2>{{$heading}}</h2>
@include('fragments.success')
<form method="POST" action="{{$action}}" >
@csrf
<div class="mb-3">
<label for="address" class="form-label">Адрес</label>
<input type="text" class="form-control" id="address" name="address" aria-describedby="add
<div id="addressHelp" class="form-text">Укажите точный адрес объекта недвижимости</div>
</div>
<div class="mb-3">
<label for="type" class="form-label">Укажите тип недвижимости</label>
<select class="form-select" aria-label="1" name="type" >
<option selected disabled>Укажите тип</option>
<option value="1">Студия</option>
<option value="2">Квартира</option>
<option value="3">Дом</option>
<option value="4">Коттедж</option>
</select>
<!-- <div id="typeHelp" class="form-text"></div> -->
</div>
<div class="mb-3">
<label for="rooms" class="form-label">Количество комнат</label>
<select class="form-select" aria-label="1" name="rooms">
<option selected disabled>Укажите количество комнат</option>
<option value="0">Студия</option>
<option value="1">Одна</option>
<option value="2">Две</option>
<option value="3">Три</option>
<option value="4">Четыре</option>
</select>
<div id="roomsHelp" class="form-text">Сколько комнат в вашем объекте?</div>
</div>
<div class="mb-3">
<label for="price" class="form-label">Стоимость</label>
<input type="number" class="form-control" id="price" name="price" aria-describedby="price
<div id="priceHelp" class="form-text">Укажите стоимость в рублях</div>
</div>
<div class="mb-3">
<button type="submit" class="btn btn-primary">Добавить</button>
</div>
</form>
</div>
