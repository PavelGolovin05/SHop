@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="heading">
                        <h3>Корзина</h3>
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
                        <form action="{{ url('deleteProductFromBasket')}}">
                            <div class="grid_1_of_4 images_1_of_4">
                                <img src="/images/{{$product->photo1}}">
                                <h2></h2>
                                <p><span class="price">{{$product->price}}р.</span><span class="price">{{$product->amount}}шт.</span></p>
                                <div class="button"><span><img src="/images/cart.jpg" alt="" /><input type="submit" value="Удалить" style="margin-left: 35px;"></span> </div>
                                <div class="button"><span><a href="{{ url('product/' . '?product=' .$product->product) }}" class="details">Подробнее</a></span></div>
                                <br>
                                <br>
                                <h4 style="margin-right: 175px;">Количество</h4>
                                <input type="hidden" name="basket" value="{{$product->id}}">
                                <input type="hidden" name="product" value="{{$product->product}}">
                                <input name="amount" max="{{$product->amount}}" min="1" type="number" required style="padding:5px;
    border:2px solid #ccc;
    -webkit-border-radius: 5px;
    border-radius: 5px;
border-color:#333;
margin-right: 160px;
width: 120px;">
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
