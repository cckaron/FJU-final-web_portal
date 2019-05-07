@extends('layout.master')

@section('title')
    規則介紹
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::to('bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />

    .bt-wrapper.active{max-height:310px;overflow:auto;-webkit-overflow-scrolling:touch}


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
    table th{background:#FF8300;color:white;font-size:25px}
    table tr td{background:#FFCC8C;color:#000000}
    table tr:nth-of-type(2n+2) td{background:#FFF8DC}

@endsection

@section('content')
    <div style="margin-top: 10px" align="center">
        <img src="images/block.png" width="350px" height="350px">
    </div>
    <div align="center">
        <h2>
            <b style="color:#FF8300">規則介紹</b>
            <button class="btn btn-primary btn-lg" value="" onclick="window.open('{{ route('main.makerule') }}');">制定規則</button>
        </h2>
    </div>
    <div align="center">
        <p align="left" style="font-size: 20px;width: 80%">當車輛行徑中，雙向四支鏡頭將會同時拍攝綠燈行進中的汽機車和紅燈等待中的汽機車，並將畫面以AI人工智慧進行車輛辨識取得資料。<br>
            該道路紅綠燈為綠燈時，鏡頭將會拍攝同條馬路雙向還未穿越停止線行進中的車輛並將兩鏡頭數據相加；
            該道路紅綠燈為紅燈時，鏡頭將會辨識同條馬路雙向停止的車輛數並將兩鏡頭數據相加。<br>
            辨識後將這兩筆數據自動傳入資料庫並提供程式作為規則判斷之依據。<br>
            每次系統判斷後將可能更動紅綠燈秒數，其紅綠燈秒數為預設值且<font color="red">每次判斷完將會歸回預設值，每回合秒數只更改一次。</font><br>
            <br>
            <font color="red">例：</font>此時秒數為60秒，當紅燈方向為1+2道路，而1鏡頭方向辨識到的車輛數有5輛車，2鏡頭方向辨識到的車輛數有7輛，相加後所得車輛數為12輛。<br>
            綠燈方向為3+4道路，而3鏡頭方向辨識到的車輛數有2輛車，4鏡頭方向辨識到的車輛數有3輛，相加後所得車輛數為5輛。<br>
            此時， 程式判斷就會進入↑/↓情境，將會把此時紅綠燈秒數－(當下秒數＊1/2)秒{60-30=30秒}為偵測更改後的秒數。
        </p>
    </div>


    <div align="center">
        <div class="table-responsive" style="width: 90%;">
            <table style="font-size: 25px;width:1520px">
                <thead>
                <tr>
                    <th>情境<br>
                        紅／綠燈道車輛多寡</th>
                    <th>紅燈車輛數</th>
                    <th>綠燈車輛數</th>
                    <th>偵測後更改秒數</th>
                </tr>
                </thead>
                <tbody>

                @foreach($rules as $rule)

                    <tr style="background:#FFCC8C;">
                        <td align="center">
                            {{ $rule->name }}
                        </td>

                        <!-- red light -->
                        <td>
                            @foreach($rule->condition as $condition)
                                @if($condition->color == "red")
                                    汽 {{ $condition->operator }} {{ $condition->car_count }}
                                    <br>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($rule->condition as $condition)
                                @if($condition->color == "green")
                                    汽 {{ $condition->operator }} {{ $condition->car_count }}
                                    <br>
                                @endif
                            @endforeach
                        </td>
                        <td>秒數 {{ $rule->operator }} {{ $rule->second }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>&nbsp;</div>

@endsection


