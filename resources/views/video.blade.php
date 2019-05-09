@extends('layout.master')

@section('title')
    即時影片
@endsection



@section('style')

    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #FFC37B;
    }


    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 0px 25px;
    transition: 0.3s;
    }


    .tab button:hover {
    background-color: #ddd;
    }


    .tab button.active {
    background-color: #E97300;
    }


    .tabcontent {
    display: none;
    padding: 6px 30px;
    border: 1px solid #000000;
    border-top: none;
    }

    .table-center{
    width: 70%;
    border-style: none;
    margin-left:auto;
    margin-right:auto;
    }
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

    <table class="table-center">
        <tr style="background-color:transparent;border-style: none">
            <td rowspan="6" width="200px" ><img src="images/block.png" style="alignment: center" width="250px"></td>
            <td style="background-color:#FFB35A" >&nbsp</td>
            <td align="center" style="background-color:#FFB35A" ><b>原本秒數</b> </td>
            <td align="center" style="background-color:#FFB35A"><b>扣掉秒數</b></td>
            <td align="center" style="background-color:#FFB35A"><b>更改後秒數</b></td>
            <td align="center" style="background-color:#FFB35A"><b>正在倒數秒數</b></td>
        </tr>
        <tr style="background-color:white">
            <td align="center">一&二綠燈</td>
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            <td align="center"> 0 秒</td>
            <td align="center"> 0 秒</td>
            <td align="center"> 0 秒</td>
            <td align="center"> 0 秒</td>
        </tr>
        <tr style="background-color:white">
            <td align="center">三&四綠燈</td>
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            {{--<td align="center">{{ $direct_12_sec_default }} 秒</td>--}}
            <td align="center"> 0 秒</td>
            <td align="center"> 0 秒</td>
            <td align="center"> 0 秒</td>
            <td align="center">10秒</td>
        </tr>
        <tr ><!--<td style="background-color:#FFB35A">&nbsp</td>-->
            <td colspan="5" align="center" style="background-color:#FFB35A;" ><b>車輛數</b></td>
        </tr>

        <tr style="background-color: white;">
            <td align="center">一／三鏡頭車輛數</td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>12</b></td>

        </tr>

        <tr style="background-color: white">
            <td align="center">二／四鏡頭車輛數</td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>12</b></td>

        </tr>

    </table>



    <div align="center" style="margin-top: 3%">
    <div class="tab" style="width:80%" >
        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"><font size="3" color="black">&nbsp;一＆二鏡頭&nbsp;</font></button>
        <button class="tablinks" onclick="openCity(event, 'Paris')"><font size="3" color="black">&nbsp;三＆四鏡頭&nbsp;</font></button>
    </div>

    <!-- Tab content -->
        <div class="table-responsive">
    <div id="London" class="tabcontent" style="width:1520px;">
        <iframe width="1280px" height="720px" src="http://192.168.50.172:5000/stream" frameborder="0" allowfullscreen></iframe>
        <iframe width="1280px" height="720px" src="http://192.168.50.172:5001/stream" frameborder="0" allowfullscreen></iframe>
    </div>

    <div id="Paris" class="tabcontent" style="width:1520px">
        <iframe width="1280px" height="720px" src="http://192.168.50.206:5002/stream" frameborder="0" allowfullscreen></iframe>
        <iframe width="1280px" height="720px" src="http://192.168.50.206:5003/stream" frameborder="0" allowfullscreen></iframe>
    </div>
    </div>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>

@endsection


