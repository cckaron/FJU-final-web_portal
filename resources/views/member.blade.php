@extends('layout.master')

@section('title')
    研究成員
@endsection
@section('style')
    <link rel="stylesheet" href="{{ URL::to('bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />
@endsection
@section('content')
    <h2 style="color: #FF8300; margin-left: 80px"><b>研究成員</b></h2>
    {{--<div id="div">--}}

    {{--</div>--}}
@endsection

@section('content2')
    {{--<div class="container">--}}
        {{--<table class="table">--}}
            {{--<tr style="background-color: white;border-top: none;">--}}
                {{--<th><img src="{{ URL::to('images/bobo.png') }}" height="250" ></th>--}}
                {{--<th><img src="{{ URL::to('images/tsai.png') }}" height="250" ></th>--}}
                {{--<th><img src="{{ URL::to('images/gao.png') }}"height="250"></th>--}}
                {{--<th><img src="{{ URL::to('images/246605.jpg') }}" height="250"></th>--}}
                {{--<th><img src="{{ URL::to('images/chen.jpg') }}" height="250"></th>--}}
            {{--</tr>--}}
            {{--<tr style="background-color:#FFB35A;">--}}
                {{--<td align="middle"><b>柏勳</b>    <br><b>MR. BOBO</b></td>--}}
                {{--<td align="middle"><b>蔡媽</b>    <br><b>Tina TSAI</b></td>--}}
                {{--<td align="middle"><b>凱哥</b>    <br><b>Professor Kai</b></td>--}}
                {{--<td align="middle"><b>蝴蝶</b>    <br><b>Debuger Butterfly</b></td>--}}
                {{--<td align="middle"><b>建軒</b>    <br><b>Teaching Assistant Chen</b></td>--}}
            {{--</tr>--}}
            {{--<tr style="background-color: #FFCC8C;">--}}
                {{--<td align="middle">只會抬摃，寒假回家</td>--}}
                {{--<td align="middle">食衣住行，Costco衝鋒隊長</td>--}}
                {{--<td align="middle">各項技術指導，全方位輔助<br>虛心授教</td>--}}
                {{--<td align="middle">沒有什麼Bug是處理不了的<br>處理不了找凱哥<br></td>--}}
                {{--<td align="middle">不寫程式，我睡不著</td>--}}
            {{--</tr>--}}
            {{--<tr style="background-color: #FFCC8C;">--}}
                {{--<td align="middle">座右銘：I can accept failure,<br>but I can't accept giving up.</td>--}}
                {{--<td align="middle">座右銘：吃是生命</td>--}}
                {{--<td align="middle">座右銘：越吃越餓</td>--}}
                {{--<td align="middle">座右銘：連假是自己創造的</td>--}}
                {{--<td align="middle">座右銘：這個很難，你不會懂</td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    {{--</div>--}}

    <div class="container">
        <table class="table" style="width: 80%;align-self: center">
            <thead class="thead-dark">
            <tr>
                <th scope="col"><img class="img" src="{{ URL::to('images/bobo.png') }}" style="width: 100%; height: 200px;"></th>
                <th scope="col"><img class="img" src="{{ URL::to('images/tsai.jpg') }}" style="width: 100%; height: 200px;"></th>
                <th scope="col"><img class="img" src="{{ URL::to('images/gao.jpg') }}" style="width: 100%; height: 200px;"></th>
                <th scope="col"><img class="img" src="{{ URL::to('images/246605.jpg') }}" style="width: 100%; height: 200px;"></th>
                <th scope="col"><img class="img" src="{{ URL::to('images/chen.jpg') }}" style="width: 100%; height: 200px;"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><b>柏勳</b>    <br><b>MR. BOBO</b></th>
                <td><b>蔡媽</b>    <br><b>Tina TSAI</b></td>
                <td><b>凱哥</b>    <br><b>Professor Kai</b></td>
                <td><b>蝴蝶</b>    <br><b>Debuger Butterfly</b></td>
                <td><b>建軒</b>    <br><b>Teaching Assistant Chen</b></td>
            </tr>
            <tr>
                <th scope="row">只會抬摃，寒假回家</th>
                <td>食衣住行，Costco衝鋒隊長</td>
                <td>各項技術指導，全方位輔助<br>虛心授教</td>
                <td>沒有什麼Bug是處理不了的<br>處理不了找凱哥<br></td>
                <td>不寫程式，我睡不著</td>
            </tr>
            <tr>
                <th scope="row">座右銘：I can accept failure,<br>but I can't accept giving up.</th>
                <td>座右銘：吃是生命</td>
                <td>座右銘：越吃越餓</td>
                <td>座右銘：連假是自己創造的</td>
                <td>座右銘：這個很難，你不會懂</td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection

@section('script')
    <script src="{{ URL::to('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
@endsection
