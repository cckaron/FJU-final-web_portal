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
    padding: 6px 12px;
    border: 1px solid #000000;
    border-top: none;
    }
@endsection

@section('content')

    <table  style="width: 70%;margin-left: 15%;" border="5">

        <tr style="background-color:white">
            <td rowspan="6" width="40%"><img src="images/block.png" width="90%" style="margin-left: 10%;margin-top: 7%"></td>
            <td colspan="2" width=60% align="center" style="background-color:#FFB35A" ><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;原本秒數&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    偵測更改秒數</b></td>
        </tr>

        <tr>
            <td width=40%  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                一&二綠燈  {{ $direct_12_sec_default }} 秒</td>
            <td width=60% align="center" >{{ $direct_12_sec }}</td>
        </tr>

        <tr style="background-color: white">
            <td width=40% >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                三&四綠燈   {{ $direct_34_sec_default }} 秒</td>
            <td width=60% align="center">{{ $direct_34_sec }}</td>
        </tr>

        <tr >
            <td colspan="2" width=40% align="center" style="background-color:#FFB35A"">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>車輛數</b></td>

        </tr>

        <tr style="background-color: white">
            <td width=40% >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                一／三鏡頭車輛數</td>
            <td width=60% align="center">3</td>
        </tr>

        <tr style="background-color: white">
            <td width=40% >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                二／四鏡頭車輛數</td>
            <td width=60% align="center">4</td>
        </tr>

    </table>



    <div align="center" style="margin-top: 3%">
    <div class="tab" style="width: 80%;" >
        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"><font size="3" color="black">&nbsp;一＆二鏡頭&nbsp;</font></button>
        <button class="tablinks" onclick="openCity(event, 'Paris')"><font size="3" color="black">&nbsp;三＆四鏡頭&nbsp;</font></button>
    </div>

    <!-- Tab content -->
    <div id="London" class="tabcontent" style="width: 80%;">
        <iframe width="700" height="500" src="http://192.168.50.206:8081/index.html" frameborder="0" allowfullscreen></iframe>
        <iframe width="700" height="500" src="http://192.168.50.206:8081/index.html" frameborder="0" allowfullscreen></iframe>
    </div>

    <div id="Paris" class="tabcontent" style="width: 80%;">
        <iframe width="700" height="500" src="http://192.168.50.206:8081/index.html" frameborder="0" allowfullscreen></iframe>
        <iframe width="700" height="500" src="http://192.168.50.206:8081/index.html" frameborder="0" allowfullscreen></iframe>
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


