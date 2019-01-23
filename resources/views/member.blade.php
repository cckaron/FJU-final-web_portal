@extends('layout.master')

@section('title')
    研究成員
@endsection

@section('content')
    <h2><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;研究成員</b></h2>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>圆形图片</title>
        <style>
            table{background:white;width:80%;position: relative;left: 10%;padding: 0 0 0 0;}
            #div{ margin:10px auto; }
            #div img{ border-radius:100%;padding-right:10%}

        </style>
    </head>

    <body>
    <div id="div">
        <table class="rwd-table">
            <tr align="midddle" style="background-color: white;border-top: none;">
                <th><img align="middle" src="images/bobo.png" height="250" ></th>
                <th><img align="middle"src="images/tsai.png" height="250" ></th>
                <th><img align="middle" src="images/gao.png" height="250"></th>
                <th><img align="middle" src="images/246605.jpg" height="250"></th>
                <th><img align="middle" src="images/chen.jpg" height="250"></th>
            </tr>
            <tr style="background-color:#ADD8E6;">
                <td align="middle">黃柏勳<br>MR. BOBO</td>
                <td align="middle">蔡媽<br>Tina TSAI</td>
                <td align="middle">凱哥<br>Professor Kai</td>
                <td align="middle">蝴蝶<br>Debuger Butterfly</td>
                <td align="middle">建軒<br>Teaching Assistant Chen</td>
            </tr>
            <tr style="background-color: #F0F8FF;">
                <td align="middle">只會抬摃，寒假回家</td>
                <td align="middle">食衣住行，Costco衝鋒隊長</td>
                <td align="middle">各項技術指導，全方位輔助<br>虛心授教</td>
                <td align="middle">沒有什麼Bug是處理不了的<br>處理不了找凱哥<br></td>
                <td align="middle">不寫程式，我睡不著</td>
            </tr>
            <tr style="background-color: #F0F8FF;">
                <td align="middle">座右銘：I can accept failure,<br>but I can't accept giving up.</td>
                <td align="middle">座右銘：吃是生命</td>
                <td align="middle">座右銘：越吃越餓</td>
                <td align="middle">座右銘：連假是自己創造的</td>
                <td align="middle">座右銘：這個很難，你不會懂</td>
            </tr>
        </table>
    </div>
    </body>
    </html>
@endsection
