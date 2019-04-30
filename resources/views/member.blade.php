@extends('layout.master')

@section('title')
    研究成員
@endsection
@section('style')
    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    * {
    outline: none;
    }
    *, :after, :before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    }
    user agent stylesheet
    div {
    display: block;
    }

@endsection
@section('content')
    <h2 style="color: #FF8300; margin-left: 80px"><b>研究成員</b></h2>
@endsection

@section('content2')
<div align="center">
    <div class="table-responsive" style="width:90%">

        <table class="table" style="width:80%">
            <thead class="thead-light">
            <tr>
                <th><img src="{{ URL::to('images/bobo.png') }}" style="width: 250px;height: 250px;"></th>
                <th><img src="{{ URL::to('images/tsai.png') }}" style="width: 250px;height: 250px"></th>
                <th><img src="{{ URL::to('images/kai.png') }}" style="width: 250px;height: 250px"></th>
                <th><img src="{{ URL::to('images/butterfly.png') }}" style="width: 250px;height: 250px"></th>
                <th><img src="{{ URL::to('images/chen.png') }}" style="width: 250px;height: 250px"></th>
            </tr>
            </thead>
            <tbody class="customtable">
            <tr style="background-color:#FFB35A;">
                <td align="middle"><b>柏勳</b>    <br><b>MR. BOBO</b></td>
                <td align="middle"><b>蔡媽</b>    <br><b>Tina TSAI</b></td>
                <td align="middle"><b>凱哥</b>    <br><b>Professor Kai</b></td>
                <td align="middle"><b>蝴蝶</b>    <br><b>Debuger Butterfly</b></td>
                <td align="middle"><b>建軒</b>    <br><b>Teaching Assistant Chen</b></td>
            </tr>
            <tr style="background-color: #FFCC8C;">
                <td align="middle">只會抬摃，寒假回家</td>
                <td align="middle">食衣住行，Costco衝鋒隊長</td>
                <td align="middle">各項技術指導，全方位輔助<br>虛心授教</td>
                <td align="middle">沒有什麼Bug是處理不了的<br>處理不了找凱哥<br></td>
                <td align="middle">不寫程式，我睡不著</td>
            </tr>
            <tr style="background-color: #FFCC8C;">
                <td align="middle">座右銘：I can accept failure,<br>but I can't accept giving up.</td>
                <td align="middle">座右銘：吃是生命</td>
                <td align="middle">座右銘：越吃越餓</td>
                <td align="middle">座右銘：連假是自己創造的</td>
                <td align="middle">座右銘：這個很難，你不會懂</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
@endsection


