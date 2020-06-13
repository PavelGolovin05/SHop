@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">
                <form action="{{url('/defence')}}">
            <input type="month" name="month" required">
            <input type="submit" value="Ok">
        </form>
    </div>
    </body>
@endsection
