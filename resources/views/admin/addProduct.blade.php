@extends('layouts.app')
@section('content')

    <body>
    <div class="wrap">
        <form action="{{ url('addProduct') }}">
            <div id="content">
                @if (session()->has('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
                <h1>{{$category->name}}</h1>
                <input type="hidden" name="category" value="{{$category->id}}">
                <br><br>
                <h4>Название</h4>
                <input name="name" type="text" required style="padding:5px;
border:2px solid #ccc;
-webkit-border-radius: 5px;
border-radius: 5px;
border-color:#333;">
                <br><br>
                <h4>Цена (руб.)</h4>
                <input name="price" type="number" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;">
                <br><br>
                <h4>Гарантия (мес.)</h4>
                <input name="guarantee" type="number" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;">
                <br><br>
                <h4>Количество</h4>
                <input name="amount" type="number" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;">
                <br><br>
                <h4>Фото 1</h4>
                <input type="file" required name="photo1" id="photo_link1" class="inputfile">
                <label for="photo_link1"><span>Загрузить фото</span></label>
                <br><br>
                <h4>Фото 2</h4>
                <input type="file" required name="photo2" id="photo_link2" class="inputfile">
                <label for="photo_link2"><span>Загрузить фото</span></label>
                <br>
                <br>
                <h4>Фото 3</h4>
                <input type="file" required name="photo3" id="photo_link3" class="inputfile">
                <label for="photo_link3"><span>Загрузить фото</span></label>
                <br><br>
                <h4>Производитель</h4>
                <div class="select-wrapper">
                    <div class="select-arrow-3"></div>
                    <select name="company">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                    @foreach($parameters as $parameter)
                        <h4>{{$parameter->name}}</h4>
                        <br>
                        <input name="{{$parameter->id}}" type="text" placeholder="Введите значение параметра" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;
width: 400px;">
                        <br><br>
                        @endforeach
                <h4>Описание</h4>
                <textarea name="description" required cols="40" rows="10" style="height: 200px;     width: 100%;
    background: #fff;
    border: 0;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    border-radius: 3px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    -webkit-box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    font: 400 14px 'Roboto', sans-serif;
    color: #777;"> </textarea>
                <br><br>
                <input type="submit" value="Добавить" style="    padding:5px 15px;
    background:#ccc;
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
width: 100px;">
            </div>
        </form>
    </div>
    </body>
@endsection

