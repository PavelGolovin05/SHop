@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">
        @if (session()->has('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ url('addCategory') }}">
            <div id="content">
                <h1>Добавить категорию</h1>
                <br>
                <input type="text" name="name" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;">
                <br>
                <br>
                <h1>Единичное название</h1>
                <br>
                <input type="text" name="single_name" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;">
                <br>
                <br>
                <h1>Фото</h1>
                <br>
                <input type="file" required name="photo" id="photo_link" class="inputfile">
                <label for="photo_link"><span>Загрузить фото</span></label>
                <br>
                <br>
                <input type="submit" value="Ок" style="    padding:5px 15px;
    background:#ccc;
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
width: 100px;">
            </div>
        </form>
        <form action="{{ url('showAddProductFrom') }}">
            <div id="content">
                <h1>Выберете категорию товара для добавления</h1>
                <div class="select-wrapper">
                    <div class="select-arrow-3"></div>
                    <select name="category">
                        @foreach($all_categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Ок" style="    padding:5px 15px;
    background:#ccc;
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
width: 100px;">
            </div>
        </form>
        <form action="{{ url('addParameter') }}">
            <div id="content">
                <h1>Добавить параметр товара для категории:</h1>
                <div class="select-wrapper">
                    <div class="select-arrow-3"></div>
                    <select name="category">
                        @foreach($all_categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <h1>Название параметра:</h1>
                <br>
                <input type="text" name="name" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;">
                <input type="submit" value="Ок" style="    padding:5px 15px;
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

