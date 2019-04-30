@extends('layout.master')

@section('title')
    規則介紹
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::to('bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />

    /*jQuery Basic Table, Author: Jerry Low*/
    table{background:white;border-collapse:collapse;width:80%;position: relative;left: 10%;}
    table tr,table th,table td{border:none;border-bottom:0px solid #e4ebeb;font-family:'Lato',sans-serif;font-size:1.5rem}
    table th,table td{padding:10px 12px;text-align:left}
    table th{background:#FF8300;color:#ffffff;text-transform:uppercase}
    table tr td{background:#FFCC8C;color:#000000}
    table tr:nth-of-type(2n+2) td{background:#ffffff}
    table.bt tfoot th,table.bt tfoot td,table.bt tbody td{font-size:.8125rem;padding:0}
    table.bt tfoot th:before,table.bt tfoot td:before,table.bt tbody td:before{background:#56a2cf;color:white;margin-right:10px;padding:2px 10px}
    table.bt tfoot th .bt-content,table.bt tfoot td .bt-content,table.bt tbody td .bt-content{display:inline-block;padding:2px 5px}
    table.bt tfoot th:first-of-type:before,table.bt tfoot th:first-of-type .bt-content,table.bt tfoot td:first-of-type:before,table.bt tfoot td:first-of-type .bt-content,table.bt tbody td:first-of-type:before,table.bt tbody td:first-of-type .bt-content{padding-top:10px}
    table.bt tfoot th:last-of-type:before,table.bt tfoot th:last-of-type .bt-content,table.bt tfoot td:last-of-type:before,table.bt tfoot td:last-of-type .bt-content,table.bt tbody td:last-of-type:before,table.bt tbody td:last-of-type .bt-content{padding-bottom:10px}
    table.bt thead,table.bt tbody th{display:none}
    table.bt tfoot th,table.bt tfoot td,table.bt tbody td{border:none;display:block;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;vertical-align:top;float:left\9;width:100%\9}
    table.bt tfoot th::before,table.bt tfoot td::before,table.bt tbody td::before{content:attr(data-th) ":";display:inline-block;-webkit-flex-shrink:0;-ms-flex-shrink:0;flex-shrink:0;font-weight:bold;width:6.5em}
    table.bt tfoot th.bt-hide,table.bt tfoot td.bt-hide,table.bt tbody td.bt-hide{display:none}
    table.bt tfoot th .bt-content,table.bt tfoot td .bt-content,table.bt tbody td .bt-content{vertical-align:top}
    .bt-wrapper.active{max-height:310px;overflow:auto;-webkit-overflow-scrolling:touch}
    .ccle {
    margin: 0px auto;/*div對齊效果*/
    text-align: center;/*display: inline對齊效果*/
    }

    .ccle div {
    display: inline-block;/*讓div並排*/
    vertical-align: top;/*就算個個div行數不同，也一律向上對齊*/
    width: 700px;
    height: 100%;
    border-radius:3px;

    }

@endsection

@section('content')

    <div class="ccle">
        <div style="margin-top: 10px">
        <img src="images/block.png" width="70%" height="70%">
            <!-- TODO 改照片-->
    </div>
    <div>
        <h2>
            <b><font color="FF8300">規則介紹</font></b>
            <button class="btn btn-primary btn-lg" value="">制定規則</button>
        </h2>

        <p align="left" style="font-size: 20px">當車輛行徑中，雙向四支鏡頭將會同時拍攝綠燈行進中的汽機車和紅燈等待中的汽機車，並將畫面以AI人工智慧進行車輛辨識取得資料。<br>
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
    </div>
    <table id="RWD">
        <thead>
        <tr>
            <th>情境<br>
            紅／綠燈道車輛多寡
            </th>
            <th>紅燈車輛數</th>
            <th>綠燈車輛數</th>
            <th>偵測後更改秒數</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>↑/↑<br>
                <hr>
                ＝/＝
            </td>
            <td>汽>=12輛or機>=15輛<br>
                <hr>
                6<汽<12輛or 5<機<15輛
            </td>
            <td>汽>=12輛or機>=15輛<br>
                <hr>
                6<汽<12輛or 5<機<15輛
            </td>
            <td>秒數不變</td>
        </tr>
        <tr>
            <td>↓/↑
            </td>
            <td>汽<=6輛or機<=5輛</td>
            <td>汽>=12輛or機>=15輛</td>
            <td>秒數延長＋1/2秒</td>
        </tr>
        <tr>
            <td>＝/↑<br>
                <hr>
                ↓/＝
            </td>
            <td>6<汽<12輛or 5<機<15輛<br>
                <hr>
                汽<=6輛or機<=5輛
            </td>
            <td>汽>=12輛or機>=15輛<br>
                <hr>
                6<汽<12輛or 5<機<15輛
            </td>
            <td>秒數延長＋1/4秒</td>
        </tr>
        <tr>
            <td>↑/↓
            </td>
            <td>汽>=12輛or機>=15輛</td>
            <td>汽<=6輛or機<=5輛</td>
            <td>秒數減少－1/2秒</td>
        </tr>
        <tr>
            <td>↑/＝<br>
                <hr>
                ＝/↓
            </td>
            <td>汽>=12輛or機>=15輛<br>
                <hr>
                6<汽<12輛or 5<機<15輛
            </td>
            <td>6<汽<12輛or 5<機<15輛<br>
                <hr>
                汽<=6輛or機<=5輛
            </td>
            <td>秒數減少－1/4秒</td>
        </tr>
        <tr>
            <td>↓/↓
            </td>
            <td>汽<=6輛or機<=5輛</td>
            <td>汽<=6輛or機<=5輛</td>
            <td>秒數設定成10秒</td>
        </tr>
        </tbody>
    </table>
@endsection

@section('script')
    {{--src='//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'.--}}
    src="{{ URL::to('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}">

@endsection

{{--@section('script1')--}}
    {{--//<![CDATA[--}}
    {{--(function($){$.fn.basictable=function(options){var setup=function(table,data){var headings=[];if(data.tableWrap){table.wrap('<div class="bt-wrapper"></div>')}var format="";if(table.find("thead tr th").length){format="thead th"}else if(table.find("tbody tr th").length){format="tbody tr th"}else if(table.find("th").length){format="tr:first th"}else{format="tr:first td"}$.each(table.find(format),function(){var $heading=$(this);var colspan=parseInt($heading.attr("colspan"),10)||1;var row=$heading.closest("tr").index();if(!headings[row]){headings[row]=[]}for(var i=0;i<colspan;i++){headings[row].push($heading)}});$.each(table.find("tbody tr"),function(){setupRow($(this),headings,data)});$.each(table.find("tfoot tr"),function(){setupRow($(this),headings,data)})};var setupRow=function($row,headings,data){$row.children().each(function(){var $cell=$(this);if(($cell.html()===""||$cell.html()==="&nbsp;")&&!data.showEmptyCells){$cell.addClass("bt-hide")}else{var cellIndex=$cell.index();var headingText="";for(var j=0;j<headings.length;j++){if(j!=0){headingText+=": "}var $heading=headings[j][cellIndex];headingText+=$heading.text()}$cell.attr("data-th",headingText);if(data.contentWrap&&!$cell.children().hasClass("bt-content")){$cell.wrapInner('<span class="bt-content" />')}}})};var unwrap=function(table){$.each(table.find("td"),function(){var $cell=$(this);var content=$cell.children(".bt-content").html();$cell.html(content)})};var check=function(table,data){if(!data.forceResponsive){if(table.removeClass("bt").outerWidth()>table.parent().width()){start(table,data)}else{end(table,data)}}else{if(data.breakpoint!==null&&$(window).width()<=data.breakpoint||data.containerBreakpoint!==null&&table.parent().width()<=data.containerBreakpoint){start(table,data)}else{end(table,data)}}};var start=function(table,data){table.addClass("bt");if(data.tableWrap){table.parent(".bt-wrapper").addClass("active")}};var end=function(table,data){table.removeClass("bt");if(data.tableWrap){table.parent(".bt-wrapper").removeClass("active")}};var destroy=function(table,data){table.find("td").removeAttr("data-th");if(data.tableWrap){table.unwrap()}if(data.contentWrap){unwrap(table)}table.removeData("basictable")};var resize=function(table){if(table.data("basictable")){check(table,table.data("basictable"))}};this.each(function(){var table=$(this);if(table.length===0||table.data("basictable")){if(table.data("basictable")){if(options=="destroy"){destroy(table,table.data("basictable"))}else if(options==="start"){start(table,table.data("basictable"))}else if(options==="stop"){end(table,table.data("basictable"))}else{check(table,table.data("basictable"))}}return false}var settings=$.extend({},$.fn.basictable.defaults,options);var vars={breakpoint:settings.breakpoint,containerBreakpoint:settings.containerBreakpoint,contentWrap:settings.contentWrap,forceResponsive:settings.forceResponsive,noResize:settings.noResize,tableWrap:settings.tableWrap,showEmptyCells:settings.showEmptyCells};if(vars.breakpoint===null&&vars.containerBreakpoint===null){vars.breakpoint=568}table.data("basictable",vars);setup(table,table.data("basictable"));if(!vars.noResize){check(table,table.data("basictable"));$(window).bind("resize.basictable",function(){resize(table)})}})};$.fn.basictable.defaults={breakpoint:null,containerBreakpoint:null,contentWrap:true,forceResponsive:true,noResize:false,tableWrap:false,showEmptyCells:false}})(jQuery);--}}
    {{--//]]>--}}
{{--@endsection--}}
