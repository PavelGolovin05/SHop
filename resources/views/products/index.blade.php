@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="heading">
                        <h3>{{$category->name}}</h3>
                    </div>
                    <div class="sort">
                        <p>Сортировать по цене:
                        <form action="{{ url('sortProducts') }}">
                                <div class="select-wrapper">
                                    <div class="select-arrow-3"></div>
                                    <select name="sort">
                                        <option value="top">По возрастанию</option>
                                        <option value="low">По убыванию</option>
                                    </select>
                                </div>
                                <input type="submit" value="Ок" style="    padding:5px 15px;
    background:#ccc;
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
width: 100px;">
                        </form>
                        </p>
                    </div>
                    <div class="sort">
                        <p>Фильтры поиска:
                            <br>
                            <br>
                        <form action="{{ url('findProductsByFilter') }}">
                            @foreach($parameters as $parameter)
                                <h5>{{$parameter->name}}</h5>
                                @foreach($parameter->values as $value)
                                    <input type="checkbox" name="{{$value->value}}" value="{{$value->value}}"> {{$value->value}}
                                    @endforeach
                                <br>
                                <br>
                            @endforeach
                            <input type="submit" value="Ок" style="    padding:5px 15px;
    background:#ccc;
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
width: 100px;">
                        </form>
                        </p>
                    </div>
                    <div class="page-no">
                        @if($products->total() > $products->count())
                            <div style="margin-left: 500px;">
                                {{$products->links()}}
                            </div>
                        @endif
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-info">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="section group">
                    @foreach($products as $product)
                        <form action="{{ url('addProductToBasket')}}">
                            <div class="grid_1_of_4 images_1_of_4">
                                <img src="/images/{{$product->photo1}}">
                                <h3>{{$product->category}} {{$product->name}}</h3>
                                <p><span class="price">{{$product->price}}р.</span><span class="price">{{$product->amount}}шт.</span></p>
                                <div class="button"><span><a href="{{ url('product/' . '?product=' .$product->id) }}" class="details">Подробнее</a></span></div>
                                @if($product->amount > 0)
                                <div class="button"><span><img src="/images/cart.jpg" alt="" /><input type="submit" value="В корзину" style="margin-left: 35px;"></span> </div>
                                <br>
                                <br>
                                <h4 style="margin-right: 175px;">Количество</h4>
                                <input type="hidden" name="product" value="{{$product->id}}">
                                <input name="amount" max="{{$product->amount}}" min="1" type="number" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;
margin-right: 160px;
width: 120px;">
                                    @endif
                            </div>
                        </form>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
