@extends('layout.master')

@section('title')
    即時影片
@endsection

@section('script1')
    function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }
@endsection

@section('style')
    /* Style the tab */
    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    }
@endsection

@section('content')
    <!--<table class="sa" width=100%>
        <tr width="100%">
            <td align="left" width=10%>
                <ul class="">
                    <li><a href="video1.php" target="sf"><h4>一二鏡頭</h4></a></li>
                </ul>
            </td>
            <td align="left" width=10%>
                <ul>
                    <li><a href="video2.html" target="sf"><h4>三四鏡頭</h4></a></li>
                </ul>
            </td>
        </tr>
        <tr valign=top height=100%>
            <td align="center" height="50%"><iframe height=100%  width=100% src="video1.php" frameborder="0" style="border:0" name="sf"></iframe></td>
        </tr>
    </table>-->



    <img src="images/block.png" width="20%" >

    <div align="center">
    <div class="tab" style="width: 70%;">
        <button class="tablinks" onclick="openCity(event, '一＆二鏡頭')" id="defaultOpen">London</button>
        <button class="tablinks" onclick="openCity(event, '三＆四鏡頭')">Paris</button>
    </div>

    <!-- Tab content -->
    <div id="London" class="tabcontent" style="width: 70%;">
        <h3>London</h3>
        <p>London is the capital city of England.</p>
    </div>

    <div id="Paris" class="tabcontent" style="width: 70%;">
        <h3>Paris</h3>
        <p>Paris is the capital of France.</p>
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


