@extends('layout.master3')

@section('title')
    主控台
@endsection

@section('style2')

    <link rel="stylesheet" href="{{ URL::to('matrix/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('matrix/css/select2.min.css') }}" />

    <style>
        /*canvas{*/

        /*width:600px !important;*/
        /*height:300px !important;*/

        /*}*/
        .dataTables_filter {
            display: none;
        }

        .dataTables_length{
            display: none;
        }

        .container-fluid {
            max-width: 1200px;
            margin: auto;
        }

        input{
            width: 50%;
            padding: 3px;
            box-sizing: border-box;
            -webkit-box-sizing:border-box;
            -moz-box-sizing: border-box;
        }

        input[type="search"]{
            height: 2.0rem;
        }
    </style>
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-md-12" >
            <div class="card" style="height:auto">
                <div class="card-body">
                    <div class="col-md-2">
                        <h5 class="card-title m-b-0">搜尋路段</h5>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-2 b-t-20">
                            <select id="citySelect" class="select2 form-control custom-select">
                                <option selected disabled>城市</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="districtSelect" class="select2 form-control custom-select">
                                <option selected disabled>行政區</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="roadSelect" class="select2 form-control custom-select">
                                <option selected disabled>路/街</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="intersectionSelect" class="select2 form-control custom-select">
                                <option selected disabled>路口</option>
                            </select>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">近期事件</h5>
                </div>
                <div class="table-responsive">
                    <table id="maintenance" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">事件名稱</th>
                            <th scope="col">路口名稱</th>
                            <th scope="col">狀態</th>
                            <th scope="col">維修狀態</th>
                            <th scope="col">報修時間</th>
                            <th scope="col">動作</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-md-6">
            <div class="card">
                <canvas id="pieChart" width="300" height="300"></canvas>
            </div>
        </div>
        <!-- End Chart -->
    </div>

    <div class="row">
        <div class="col-md-6" id="rule">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">道路規則</h5>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
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

                            <tr>
                                <td>
                                    &nbsp;{{ $rule->name }}
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
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- rador chart -->
        <div class="col-md-6" id="radar">
            <div class="card">
                <canvas id="radarChart" width="300" height="300"></canvas>
            </div>
        </div>
        <!-- rador Chart -->

        <!-- Line chart -->
        <div class="col-md-6">
            <div class="card">
                <canvas id="myChart" width="300" height="300"></canvas>
            </div>
        </div>
        <!-- End Chart -->


    </div>

    <!-- start ajax correct assignment window-->
    <div id="detailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="change_form">
                    <div class="modal-header" style="margin-top: 20px;">
                        <h4 class="modal-title">維修單資訊</h4>
                        <button type="button" class="close" data-dismiss="modal" style="            box-shadow: 0px 0px 0px white;
">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>報修單生成時間</label>
                            <h5 style="color:blue">2019 年 4 月 03 號 21 時 30 分 51 秒</h5>
                        </div>
                        <div class="form-group">
                            <label>地區</label>
                            <h5 style="color:blue">新北市 新莊區</h5>
                        </div>
                        <div class="form-group">
                            <label>路口編號</label>
                            <h5 style="color:blue">001</h5>
                        </div>
                        <div class="form-group">
                            <label>路口名稱</label>
                            <h5 style="color:blue">中正路和建國一路交叉口</h5>
                        </div>
                        <div class="form-group">
                            <label>錯誤代碼</label>
                            <h5 style="color:red">A01: [緊急]通訊控制器無回應</h5>
                        </div>
                        <div class="form-group">
                            <label>維修狀態</label>
                            <h5 style="color:green">已派發人員</h5>
                        </div>
                        <div class="form-group">
                            <img src="<?php echo asset("storage/maintenance/1/cam1.jpg")?>" height="216" width="384"/>
                        </div>
                        <div class="form-group">
                            <h6 style="color:blue; float:right">最後更新時間: 2小時前</h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.935746114909!2d121.43050381536588!3d25.03625453397131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7dd8be91eaf%3A0xe342a67d6574f896!2z5aSp5Li75pWZ6LyU5LuB5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1556718929015!5m2!1szh-TW!2stw" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
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

    <!-- -->
    <script src="{{ URL::to('js/chart/Chart.bundle.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.min.js') }}"></script>
    <script src="{{ URL::to('DataTables/datatables.min.js') }}"></script>

    <script src="{{ URL::to('matrix/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::to('matrix/js/select2.min.js') }}"></script>

    <script>
        $('#rule').hide();


        function refreshPie(chart) {
            // chart.destroy();
            $.ajax({
                url: 'api/chart/pie/maintenance',
                type: "GET",
                data: {
                    intersection_id: $('#intersectionSelect').val(),
                },
                success: function(data) {
                    chart.config.data = data.data;
                    chart.update();

                },
            });


        }

        function refreshFlow(chart) {
            chart.destroy();
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
        }

        function refreshDatatable(table, intersection_id) {
            //you can reload data by this!
            table.ajax.url( 'api/maintenance/get?intersection_id='+intersection_id ).load();
        }
    </script>

    <script>
        var ctx = document.getElementById('myChart');
        var flowChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['05/21', '05/22', '05/23', '05/24', '05/25', '05/26', '05/27', '05/28', '05/29', '05/30'],
                datasets: [{
                    label: '流量(/萬)',
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

        //for radar chart
        var radar = document.getElementById('radarChart');
        var radarData = {
            labels: ['機車', '自小客車', '大客車', '貨車'],
            datasets: [
                {
                    label: '車輛數(萬)',
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.35)',
                        'rgba(0, 255, 0, 0.35)',
                        'rgba(0, 0, 255, 0.35)',
                        'rgba(255, 255, 0, 0.35)',
                    ],

                    data: [4.3, 3.7, 2.1, 2.7]
                }
            ]
        };
        var myRadarChart = new Chart(radar, {
            type: 'bar',
            data: radarData,
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
                    text: '車種統計'
                }
            }
        });
    </script>

    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();



        /****************************************
         *       Basic Table                   *
         ****************************************/
        var table = $('#zero_config').DataTable({
            lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "全部"]],
            language: {
                "processing":   "處理中...",
                "loadingRecords": "載入中...",
                "lengthMenu":   "顯示 _MENU_ 項結果",
                "zeroRecords":  "沒有符合的結果",
                "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                "infoPostFix":  "",
                "search":       "搜尋全部:",
                "paginate": {
                    "first":    "第一頁",
                    "previous": "上一頁",
                    "next":     "下一頁",
                    "last":     "最後一頁"
                },
                "aria": {
                    "sortAscending":  ": 升冪排列",
                    "sortDescending": ": 降冪排列"
                }
            }
        });

        // Setup - add a text input to each footer cell
        $('#zero_config tfoot th').each( function () {
            var title = $(this).text();
            // $(this).html( '<input type="text" placeholder="搜尋 '+title+' 欄位" />' );
            $(this).html( '<input type="text" placeholder="搜尋" />' );
        } );
        var r = $('#zero_config tfoot tr');
        r.find('th').each(function(){
            $(this).css('padding', 8);
        });
        // $('#zero_config thead').append(r);
        r.appendTo($('#zero_config thead'));
        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        var maintenance_table = $('#maintenance').DataTable({
            ajax: {
                'type': 'GET',
                'url': 'api/maintenance/get',
            },
            columns: [
                {
                    "data": "content",
                    "width": "5%"
                },
                {
                    "data": "name",
                    "width": "20%"
                },
                {
                    "data": "status",
                    render: function(data) {
                        if(data === 1) {
                            return '緊急'
                        }
                        else {
                            return '警告'
                        }
                    },
                    defaultContent: '預設',
                    "width": "10%"
                },
                {
                    "data": "repair_status",
                    render: function(data) {
                        if(data === 1) {
                            return '待修中'
                        }
                        else if(data === 2) {
                            return '已派修'
                        } else {
                            return '已維修完成'
                        }
                    },
                    defaultContent: '預設',
                    "width": "25%"
                },
                {
                    "data": "updated_at_diff",
                    "width": "25%"
                },
                {
                    "data": "id",
                    render: function(data) {
                        return '<a href="#" data-toggle="tooltip" data-placement="top" title="推播訊息">\n' +
                            '<i class="mdi mdi-access-point"></i>\n' +
                            '</a>\n' +
                            '<a href="#" data-toggle="modal" data-placement="top" data-target="#detailModal" data-maintenance-id='+data+' title="詳細內容">\n' +
                            '<i class="mdi mdi-open-in-new"></i>\n' +
                            '</a>'
                    },
                    "width": "15%"
                }
            ],

            lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "全部"]],
            language: {
                "processing":   "處理中...",
                "loadingRecords": "載入中...",
                "lengthMenu":   "顯示 _MENU_ 項結果",
                "zeroRecords":  "沒有符合的結果",
                "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                "infoPostFix":  "",
                "search":       "搜尋全部:",
                "paginate": {
                    "first":    "第一頁",
                    "previous": "上一頁",
                    "next":     "下一頁",
                    "last":     "最後一頁"
                },
                "aria": {
                    "sortAscending":  ": 升冪排列",
                    "sortDescending": ": 降冪排列"
                }
            },
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $('#citySelect').on('change', function() {
            var city_id = this.value;
            var district = $('#districtSelect');
            district.empty();
            district.append('<option selected disabled>行政區</option>');
            district.prop('selectedIndex', 0);

            var road = $('#roadSelect');
            road.empty();
            road.append('<option selected disabled>街/路</option>');
            road.prop('selectedIndex', 0);

            var intersection = $('#intersectionSelect');
            intersection.empty();
            intersection.append('<option selected disabled>路口</option>');
            intersection.prop('selectedIndex', 0);

            $.ajax({
                url:'api/query/city',
                method:"GET",
                data: {'id': city_id},
                dataType:"json",
                success:function(data)
                {
                    $.each(data.districts, function (key, entry) {
                        district .append($('<option></option>').attr('value', entry.id).text(entry.name));
                    })
                }
            })
        });

        $('#districtSelect').on('change', function() {
            var district_id = this.value;
            var road = $('#roadSelect');
            road.empty();
            road.append('<option selected disabled>街/路</option>');
            road.prop('selectedIndex', 0);

            var intersection = $('#intersectionSelect');
            intersection.empty();
            intersection.append('<option selected disabled>路口</option>');
            intersection.prop('selectedIndex', 0);

            $.ajax({
                url:'api/query/district',
                method:"GET",
                data: {'id': district_id},
                dataType:"json",
                success:function(data)
                {
                    console.log(data);
                    $.each(data.roads, function (key, entry) {
                        road.append($('<option></option>').attr('value', entry.id).text(entry.name));
                    })
                }
            })
        });

        $('#roadSelect').on('change', function() {
            var road_id = this.value;
            var intersection = $('#intersectionSelect');
            intersection.empty();
            intersection.append('<option selected disabled>路口</option>');
            intersection.prop('selectedIndex', 0);

            $.ajax({
                url:'api/query/road',
                method:"GET",
                data: {'id': road_id},
                dataType:"json",
                success:function(data)
                {
                    console.log(data);
                    $.each(data.intersections, function (key, entry) {
                        intersection.append($('<option></option>').attr('value', entry.id).text(entry.name));
                    })
                }
            })
        });

        $('#intersectionSelect').on('change', function() {
            var intersection_id = this.value;

            refreshPie(myPieChart);
            refreshFlow(flowChart);
            refreshDatatable(maintenance_table, intersection_id);
            $('#rule').show();
            $('#radar').hide();
        });
    </script>

@endsection
