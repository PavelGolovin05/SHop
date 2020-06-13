@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="page-no">
                        @if($all_categories->total() > $all_categories->count())
                            <div style="margin-left: 500px;">
                                {{$all_categories->links()}}
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
                    @foreach($all_categories as $category)
                        <div class="grid_1_of_4 images_1_of_4">
                            <a class="color1" href="{{ url('products/' .'?category='. $category->id) }}"><img src="/images/{{$category->photo}}"></a>
                            <a class="color1" href="{{ url('products/' .'?category='. $category->id) }}">{{$category->name}}</a>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

