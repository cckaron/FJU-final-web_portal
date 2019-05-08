@extends('layout.master2')

@section('title')
    制定規則
@endsection

@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        input[type=text] {
            width: 150px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }
        body {
            font-size: 20px;
        }

    </style>

@endsection

@section('content')
    <div id="accordian-4">
        <div class="card m-t-30">
            @foreach($rules as $key => $rule)
            <a class="card-header link border-top" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-{{ $key }}" aria-expanded="false" aria-controls="Toggle-1">
                <i class="seticon fa fa-times" aria-hidden="true"></i>
                <span>{{ $rule->id }}.{{ $rule->name }}</span>
            </a>
            <div align="right">
                <a href="{{ route('rule.delete', ['id' => $rule->id]) }}" onclick="return confirm('確認刪除規則！')">刪除規則</a>
            </div>
            <div id="Toggle-{{ $key }}" class="multi-collapse collapse" style="">
                <div class="card-body widget-content">
                    <p>
                        紅燈車輛數：
                    @foreach($rule->condition as $condition)
                        @if($condition->color == "red")
                            汽 {{ $condition->operator }} {{ $condition->car_count }}
                            &nbsp;
                        @endif
                    @endforeach
                    </p>
                    <p>
                        綠燈車輛數：
                        @foreach($rule->condition as $condition)
                            @if($condition->color == "green")
                                汽 {{ $condition->operator }} {{ $condition->car_count }}
                                &nbsp;
                            @endif
                        @endforeach
                    </p>
                    <p>
                        秒數 {{ $rule->operator }} {{ $rule->second }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <form style="padding-left:50px;background-color:#E0FFFF;width: 500px;">
        <h3><font color="#4169E1">新增規則</font></h3>
        <p><label>情境：<input type="text" name="situation" placeholder="Ex: ↑/↑"></label></p>
        <p><label>紅燈：
        <input type="text" name="condition" placeholder="Ex: >6;<12">
        </label></p>
        <p><label>綠燈：
        <input type="text" name="condition" placeholder="Ex: >6;<12">
        </label></p>
        <p></p>
        <p><label>更改秒數：<input type="text" name="replace" placeholder="Ex: +5"></label></p>
        <input type="submit">
        <input type="reset">
    </form>

@endsection

