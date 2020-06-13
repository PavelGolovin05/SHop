@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="heading">
                        <h3>Результаты поиска</h3>
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
