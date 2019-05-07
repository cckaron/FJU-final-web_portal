@extends('layout.master')

@section('title')
    主控台
@endsection

@section('script')
@endsection

@section('style')
    table{background:white;width:80%;margin-left:auto;margin-right:auto;border-color:white;}
    table tr td{background:white;border-color:white;}
@endsection

@section('content')
    {{--<table >
        <tr style="border-top:none;border-bottom: outset;border-bottom-width: 2px;border-bottom-color:seashell;">
            <td colspan="2"><img src="{{ URL::to('images/picture.jpeg') }}"></td>
        </tr>
       <!-- <tr style="border-bottom: none">
            <td colspan="2"><h3><b><font color="#f08080">Logo由來</font></b></h3></td>
        </tr>-->
        <tr style="border-bottom: outset;border-bottom-width: 2px;border-bottom-color:seashell;">
            <td width="30%"><img src="{{ URL::to('images/logo.jpg') }}" width="100%"></td>
            <td style="vertical-align:middle"><h2><b><font color="#FF8300">Logo由來</font></b></h2><br>
                <p style="font-size: 1.3em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我們的Logo是以「荷魯斯之眼」作為出發點，Horus象徵著正義之眼。無論是汽車駕駛或機車駕駛，只要是行駛於道路上的用路人都需遵守紅綠燈的號誌。而紅路燈就彷若道路上的眼睛，看著每一個用路人，以溫柔慈祥的眼睛注視著走在歸途上的人們。
                    我們希望透過我們的｢開天眼」系統，為紅綠燈的秒數做出適當且合理的配置，讓工作了一整天身心俱疲的人們都能快速回到溫暖的家園，以形成正向的外部效益，讓社會福利最大化，對這個養育我們的社會及國家，傾盡我們的微薄之力，一點一滴、積沙成塔地付出碩大宏遠的貢獻，完成我們的企業社會責任。
                </p>
            </td>
        </tr>
        <tr style="border-bottom: none">
            <td colspan="2"><h2><b><font color="#FF8300">有關開天眼</font></b></h2></td>
        </tr>
        <tr style="border: none">
            <td colspan="2">
                <p style="font-size: 1.3em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;「開天眼」是一套運用影像辨識技術來判斷十字路口車子數量，經過函式運算後判斷是否應調整該馬路轉換成綠燈時秒數的系統。
                判斷時機為路口燈號變為紅燈時，經由我們訂定的規則來對路口變為綠燈的秒數做調整。
                綠燈秒數有其原本的預設值，判斷後可能會變動綠燈秒數也可能不更動，在每一次判斷完之後就會回歸預設值。
                </p>
            </td>
        </tr>
    </table>--}}

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.935746114909!2d121.43050381536588!3d25.03625453397131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7dd8be91eaf%3A0xe342a67d6574f896!2z5aSp5Li75pWZ6LyU5LuB5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1556718929015!5m2!1szh-TW!2stw" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
@endsection
