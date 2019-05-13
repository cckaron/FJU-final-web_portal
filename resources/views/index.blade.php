@extends('layout.master3')

@section('title')
    主控台
@endsection

@section('script')
@endsection

@section('style')
    table{background:white;width:80%;margin-left:auto;margin-right:auto;border-color:white;}
    table tr td{background:white;border-color:white;}
@endsection

@section('style2')
    <link rel="stylesheet" href="{{ URL::to('matrix/css/style.min.css') }}" />
    <style>
        /*canvas{*/

        /*width:600px !important;*/
        /*height:300px !important;*/

        /*}*/
    </style>
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
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="card m-t-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="peity_line_neutral left text-center m-t-10"><span><span style="display: none;">10,15,8,14,13,10,10</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                            <h6>10%</h6>
                        </div>
                    </div>
                    <div class="col-md-6 border-left text-center p-t-10">
                        <h3 class="mb-0 font-weight-bold">150</h3>
                        <span class="text-muted">New Users</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-t-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="peity_bar_bad left text-center m-t-10"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                            <h6>-40%</h6></div>
                    </div>
                    <div class="col-md-6 border-left text-center p-t-10">
                        <h3 class="mb-0 font-weight-bold">4560</h3>
                        <span class="text-muted">Orders</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End cards -->

    <!-- Line chart -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <canvas id="myChart" width="300" height="300"></canvas>
            </div>
        </div>
    </div>
    <!-- End Chart -->

    <!-- Pie Chart -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <canvas id="pieChart" width="300" height="300"></canvas>
            </div>
            <div class="col-md-6">
                <div class="card m-t-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="peity_line_good left text-center m-t-10"><span><span style="display: none;">12,6,9,23,14,10,17</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                <h6>+60%</h6>
                            </div>
                        </div>
                        <div class="col-md-6 border-left text-center p-t-10">
                            <h3 class="mb-0 ">5672</h3>
                            <span class="text-muted">Active Users</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card m-t-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="peity_bar_good left text-center m-t-10"><span>12,6,9,23,14,10,13</span>
                                <h6>+30%</h6>
                            </div>
                        </div>
                        <div class="col-md-6 border-left text-center p-t-10">
                            <h3 class="mb-0 font-weight-bold">2560</h3>
                            <span class="text-muted">Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Chart -->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">近期事件</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">事件名稱</th>
                        <th scope="col">道路編號</th>
                        <th scope="col">狀態</th>
                        <th scope="col">報修時間</th>
                        <th scope="col">動作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>通訊控制器無回應</td>
                        <td>001</td>
                        <td class="text-danger">緊急</td>
                        <td>3 分鐘前</td>
                        <td>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="推播訊息">
                                <i class="mdi mdi-access-point"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="詳細內容">
                                </i><i class="mdi mdi-open-in-new"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>號誌秒數異常</td>
                        <td>001</td>
                        <td class="text-warning">警告</td>
                        <td>10 分鐘前</td>
                        <td>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="推播訊息">
                                <i class="mdi mdi-access-point"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="詳細內容">
                                </i><i class="mdi mdi-open-in-new"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.935746114909!2d121.43050381536588!3d25.03625453397131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7dd8be91eaf%3A0xe342a67d6574f896!2z5aSp5Li75pWZ6LyU5LuB5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1556718929015!5m2!1szh-TW!2stw" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
@endsection

@section('script1')
    <script src="{{ URL::to('matrix/js/popper.min.js') }}"></script>

    <script src="{{ URL::to('matrix/js/jquery.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/sparkline.js') }}"></script>
    <script src="{{ URL::to('matrix/js/waves.js') }}"></script>
    <script src="{{ URL::to('matrix/js/sidebarmenu.js') }}"></script>
    <script src="{{ URL::to('matrix/js/custom.min.js') }}"></script>

    <!-- chart -->
    <script src="{{ URL::to('matrix/js/chart/matrix.interface.js') }}"></script>
    <script src="{{ URL::to('matrix/js/chart/excanvas.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::to('matrix/js/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::to('matrix/js/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ URL::to('matrix/js/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ URL::to('matrix/js/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ URL::to('matrix/js/chart/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/chart/matrix.charts.js') }}"></script>
    <script src="{{ URL::to('matrix/js/chart/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/chart/turning-series.js') }}"></script>
    <script src="{{ URL::to('matrix/js/chart-page-init.js') }}"></script>

    <!-- -->
    <script src="{{ URL::to('js/chart/Chart.bundle.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.min.js') }}"></script>

    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['05/21', '05/22', '05/23', '05/24', '05/25', '05/26', '05/27', '05/28', '05/29', '05/30'],
                datasets: [{
                    label: '流量(/千)',
                    data: [1.5, 1.7, 1.2, 1.4, 1.3, 1.2, 1.5, 1.2, 1.3, 1.6, 1.4],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: '單週流量圖'
                }
            }
        });

        var data = {
            datasets: [{
                data: [10, 20, 30],
                backgroundColor: [
                    'rgba(255, 0, 0, 0.5)',
                    'rgba(0, 255, 0, 0.5)',
                    'rgba(0, 0, 255, 0.5)',
                ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                '鏡頭異常',
                '通訊控制器異常',
                '電路控制器異常'
            ]
        };

        var pie = document.getElementById('pieChart');
        // For a pie chart
        var myPieChart = new Chart(pie, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: '報修故障事件統計'
                }
            }
        });


    </script>

@endsection
