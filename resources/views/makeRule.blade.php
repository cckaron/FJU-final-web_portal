@extends('layout.master2')

@section('title')
    制定規則
@endsection

@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    {{--<link rel="stylesheet" src="bootstrap-4.3.1-dist/css/bootstrap.min.css" />--}}
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

    <form style="background-color:#E0FFFF;padding-bottom:50px;padding-top: 30px">
        <div style="padding-left: 5%">
        <h3><font color="#4169E1">新增規則</font></h3>
        <div class="form-group">
        <p><label>情境：<input type="text" name="situation" placeholder="Ex: ↑/↑"></label></p>
        </div>
        <p><label>紅燈：
                <div>
                    <select name="operator" id="operator">
                        <option value="">- Select -</option>
                        <option value=">">></option>
                        <option value="<"><</option>
                        <option value=">=">>=</option>
                        <option value="<="><=</option>
                    </select>
                    <label>車子數量</label>
                    <select name="category" id="category">
                        <option value="">- Select -</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    {{--<script type="text/javascript">
                        function add_text()
                        {
                            myselect = document.createElement("select");
                            /*text = document.createElement('input')*/
                            myselect.setAttribute('name', 'text[]')
                            /*br   = document.createElement('br')*/
                            document.getElementById('text_zone').appendChild(br)
                            document.getElementById('text_zone').appendChild(text)
                        }
                    </script>
                    <input type="button" value="增加text" onclick="add_text()" />
                    <br/>--}}
                </div>
        </label></p>
        <p><label>綠燈：
                <div>
                    <select name="operator" id="operator">
                        <option value="">- Select -</option>
                        <option value=">">></option>
                        <option value="<"><</option>
                        <option value=">=">>=</option>
                        <option value="<="><=</option>
                    </select>
                    <label>車子數量</label>
                    <select name="category" id="category">
                        <option value="">- Select -</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
        </label></p>
        <p></p>
        <p><label>更改秒數：<input type="text" name="replace" placeholder="Ex: +5"></label></p>
        <input type="submit">
        <input type="reset">
        </div>
    </form>



    {{--<form>--}}
        {{--<div class="form-group">--}}
            {{--<label for="exampleFormControlInput1">Email address</label>--}}
            {{--<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="exampleFormControlSelect1"></label>--}}
            {{--<select class="form-control" id="exampleFormControlSelect1" name="operator">--}}
                {{--<option>- Select -</option>--}}
                {{--<option value=">">></option>--}}
                {{--<option value="<"><</option>--}}
                {{--<option value="=">=</option>--}}
            {{--</select>--}}
            {{--<label for="exampleFormControlSelect1">車子數量</label>--}}
            {{--<select class="form-control" id="exampleFormControlSelect1" name="count1">--}}
                {{--<option>- Select -</option>--}}
                {{--<option value="1">1</option>--}}
                {{--<option value="2">2</option>--}}
                {{--<option value="3">3</option>--}}
                {{--<option value="4">4</option>--}}
                {{--<option value="5">5</option>--}}
                {{--<option value="6">6</option>--}}
                {{--<option value="7">7</option>--}}
                {{--<option value="8">8</option>--}}
                {{--<option value="9">9</option>--}}
                {{--<option value="10">10</option>--}}
            {{--</select>--}}
        {{--</div>--}}
    {{--</form>--}}
@endsection

