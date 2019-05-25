@extends('layout.master3')

@section('title')
    主控台
@endsection

@section('style2')
    <style>
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

    <!-- Searching Box -->
    @include('index.partial.searching')

    <div class="row">
    @include('index.partial.maintenanceTable')

    <!-- Pie Chart -->
        <div class="col-md-6">
            <div class="card">
                <canvas id="pieChart" width="300" height="300"></canvas>
            </div>
        </div>
        <!-- End Chart -->
    </div>

    <div class="row">
        <!-- START Rule Table -->
        <div class="col-md-6" id="rule">
            @include('index.partial.ruleTable')
        </div>
        <!-- END Rule Table -->

        <!-- START Bar Chart -->
        <div class="col-md-6" id="bar">
            <div class="card">
                <canvas id="barChart" width="300" height="300"></canvas>
            </div>
        </div>
        <!-- END Bar Chart -->

        <!-- START Line Chart -->
        <div class="col-md-6">
            <div class="card">
                <canvas id="myChart" width="300" height="300"></canvas>
            </div>
        </div>
        <!-- END Line Chart -->
    </div>

    <div class="row" id="intersection_road">
        <div class="col-md-6" id="adjustTraffic">
            <div class="card" style="height:auto">
                <div class="card-body">
                    <div class="col-md-6">
                        <h3 class="card-title m-b-0">手動調整號誌系統</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-4" style="margin-top: 20px">
                            <h4>設定號誌方向</h4>
                            <select id="intersection_road_Select" class="select2 form-control custom-select">
                                <option selected disabled>請選擇路口</option>
                            </select>

                            <div style="margin-top: 20px">
                                <h4>設定號誌秒數</h4>
                                <select id="second_Select" class="select2 form-control custom-select">
                                    <option disabled selected>請選擇秒數</option>
                                    @for($i=10; $i< 100; $i++)
                                        <option value={{ $i }}>{{ $i }} 秒</option>
                                    @endfor
                                </select>
                            </div>

                            <div style="margin-top: 20px">
                                <button class="btn" id="update">更新</button>
                            </div>
                        </div>

                        <div class="col-md-8" style="margin-top: 20px">
                            <h4 style="color:blue; ">
                                即時道路狀況
                                <a href="javascript: void(0)" onclick="refreshStatus()">
                                    &#x21bb;
                                </a>
                            </h4>

                            <h5 style="margin-top: 20px">
                                當前行進方向:
                                <span id="now_direct" style="color:blue"></span>
                            </h5>

                            <h5 style="margin-top: 20px">
                                當前秒數:
                                <span id="now_second" style="color:blue"></span>
                                <span>秒</span>
                            </h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- START Maintenance details Modal-->
    @include('index.partial.maintenanceModal')
    <!-- END Maintenance details Modal-->
@endsection

@section('script1')
    <!--Chart JS -->
    <script src="{{ URL::to('js/chart/Chart.bundle.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.js') }}"></script>
    <script src="{{ URL::to('js/chart/Chart.min.js') }}"></script>
    <script src="{{ URL::to('js/chart/chartjs-plugin-streaming.min.js') }}"></script>

    <!--DataTables -->
    <script src="{{ URL::to('DataTables/datatables.min.js') }}"></script>
    <!-- Moment -->
    <script src="{{ URL::to('js/moment-with-locales.js') }}"></script>
    <!--Custom JS -->
    <script src="{{ URL::to('js/index/flowChart.js') }}"></script>
    <script src="{{ URL::to('js/index/pieChart.js') }}"></script>
    <script src="{{ URL::to('js/index/barChart.js') }}"></script>
    <script src="{{ URL::to('js/index/maintenanceTable.js') }}"></script>
    <script src="{{ URL::to('js/index/querySelector.js') }}"></script>
    <script src="{{ URL::to('js/index/ruleTable.js') }}"></script>



    <!-- this page's js-->
    <script>
        $('#rule').hide();
        $('#intersection_road').hide();


        $(".select2").select2();

        moment.locale('zh-tw');

        //modal
        $("#detailModal").on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var detail = button.parent().parent();
            var content = detail.children('#content').html();
            var name = detail.children('#name').html();
            var status = detail.children('#status').html();
            var repair_status = detail.children('#repair-status').html();
            var created_at = detail.children('#created_at').html();

            $('#modal_content').text(content);
            $('#modal_name').text(name);
            $('#modal_status').text(status);
            $('#modal_repair_status').text(repair_status);
            $('#modal_created_at').text(created_at);
            $('#modal_updated_at').text("最後更新時間:"+created_at);
        });

        //refresh status
        function refreshStatus(){
            var url_string = window.location.href;
            var url = new URL(url_string);
            var intersection_id = url.searchParams.get("intersection_id");

            $.ajax({
                url:'api/query/intersection_road',
                method:"GET",
                data: {'id': intersection_id},
                dataType:"json",
                success:function(data)
                {
                    console.log(data);

                    var now_direct = $('#now_direct');
                    now_direct.hide();
                    now_direct.text(data.now_direct);
                    now_direct.fadeIn(1500).show();

                    var now_second = $('#now_second');
                    now_second.hide();
                    now_second.text(data.now_second);
                    now_second.fadeIn(1500).show();
                }
            });
        }

        //update status button
        $('#update').click(function(){
            var second = $('#second_Select').val();

            $.ajax({
                url:'api/arduino/adjustSecond',
                method:"GET",
                data: {'second': second},
                dataType:"json",
                success:function(data)
                {
                    alert("更新成功!");
                }
            });
        })
    </script>
@endsection
