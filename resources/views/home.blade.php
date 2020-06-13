@extends('layouts.app')
@section('content')
<body>
<div class="wrap">
    <div class="main-top">
        <div class="col-md-8 banner">
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider">
                        <li>
                            <img src="images/slider1.jpg" alt="" style="height: 600px; width: 700px;"/>
                        </li>
                        <li>
                            <img src="images/slider2.jpg" alt=""style="height: 600px; width: 700px;"/>
                        </li>
                        <li>
                            <img src="images/slider3.jpg" alt=""style="height: 600px; width: 700px;"/>
                        </li>
                        <li>
                            <img src="images/slider4.jpg" alt=""style="height: 600px; width: 700px;"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="new-arrivals text-center">
        <div class="col-md-3 new-arrival-head">
            @if (session()->has('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
            <h3>Новые товары</h3>
        </div>
        @foreach($products as $product)
            <div class="col-md-3 product-item" style="margin-top: 45px;">
                <a href="{{ url('product/' . '?product=' .$product->id)}}"><img src="images/{{$product->photo1}}" class="img-responsive" alt="" style="height: 250px; width: 350px;"/></a>
                <h2>{{$product->category}}</h2>
                <h3>{{$product->name}}</h3>
                <a href="{{ url('product/' . '?product=' .$product->id)}}">Подробнее<i class="go"></i></a>
            </div>
        @endforeach
        <div class="clearfix"></div>
    </div>

</div>
</body>
@endsection
