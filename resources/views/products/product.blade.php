@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">
        <div class="main_bg">
            <div class="main">
                <!-- start span1_of_1 -->
                <div class="left_content">
                    <div class="span_1_of_left">
                        <div class="grid images_3_of_2">
                            <ul id="etalage">
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" src="/images/{{$product->photo1}}" class="img-responsive"  />
                                        <img class="etalage_source_image" src="/images/{{$product->photo1}}" class="img-responsive" title="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" src="/images/{{$product->photo2}}" class="img-responsive" />
                                        <img class="etalage_source_image" src="/images/{{$product->photo2}}" class="img-responsive" title="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" src="/images/{{$product->photo3}}" class="img-responsive" />
                                        <img class="etalage_source_image" src="/images/{{$product->photo3}}" class="img-responsive" title="" />
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="span1_of_1_des" >
                            <div class="desc1" style="margin-right: 160px;">
                                <h3>{{$product->category}} {{$product->name}} </h3>
                                    @foreach($parameters as $parameter)
                                        <h5>{{$parameter->name}}:{{$parameter->value}}</h5>
                                        @endforeach
                                <h5>Цена: {{$product->price}}р.</h5>
                                <h5>Гарантия: {{$product->guarantee}} мес.</h5>
                                <h5>Наличие: {{$product->amount}}шт.</h5>
                                <h5>Страна производителя: {{$product->country}}</h5>
                                            <br>
                                            <br>
                                <h4>Описание:</h4>
                                <p style="font-size: 14pt;">{{$product->description}}</p>
                                <div class="available">
                                    <div class="btn_form">
                                        <form action="{{ url('addProductToBasket')}}">
                                            @if (session()->has('message'))
                                                <div class="alert alert-info">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                                @if($product->amount > 0)
                                                    <input type="submit" value="В корзину" title="" />
                                                    <br>
                                                    <br>
                                                    <h4 style="margin-right: 175px;">Количество:</h4>
                                                    <input type="hidden" name="product" value="{{$product->id}}">
                                                    <input name="amount" max="{{$product->amount}}" min="1" type="number" required style="padding:5px;
            border:2px solid #ccc;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        border-color:#333;
        margin-right: 160px;
        width: 120px;">
                                                    @endif
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    </body>
@endsection
