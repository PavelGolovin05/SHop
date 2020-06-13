@extends('layouts.app')
@section('content')
    <body>
    <div class="wrap">

        <table border="5pt">
            <tr>
                <td>
                    <h4>Название категории</h4>
                </td>
                <td style="padding-left: 50px;">
                    <h4>Количество товаров</h4>
                </td>
            </tr>
            @foreach($basket as $item)
                <tr>
                    <td style=" padding-top: 50px;">
                        <h4>{{$item->name}}</h4>
                    </td>
                    <td style="padding-left: 50px; padding-top: 50px;">
                        <h4>{{$item->sum}}</h4>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </body>
@endsection
