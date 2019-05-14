@extends('layout.master3')

@section('title')
    使用者管理
@endsection

@section('style2')

    <link rel="stylesheet" href="{{ URL::to('matrix/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('matrix/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />

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

        input[type="text"]{
            height: 2.0rem;
        }
    </style>
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    @if(session()->has('message'))
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">提示</h5>

                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>

                </div>
            </div>
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">錯誤訊息</h5>

                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button name="add" class="btn btn-sm" data-toggle="modal" data-target="#addModal" type="submit" style="margin-left:13px">
                        新增帳號
                    </button>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                            <tr>
                                <th>身分</th>
                                <th>姓名</th>
                                <th>email</th>
                                <th>聯絡電話</th>
                                <th>最近更改時間</th>
                                <th>動作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr align="center">
                                    @if($user->type == 1)
                                        <td id="type">管理員</td>
                                    @elseif($user->type ==2)
                                        <td id="type">道路維修員</td>
                                    @endif
                                    <td id="name">{{ $user->name }}</td>
                                    <td id="phone">{{ $user->phone }}</td>
                                    <td id="email">{{ $user->email }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <button name="add" class="btn" data-toggle="modal" data-target="#changeModal" type="submit" data-id="{{ $user->id }}">
                                            編輯
                                        </button>
                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-md" onclick="return confirm('該學生資料將會一併刪除，確定刪除?')">
                                            刪除
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
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
        </div>

    </div>

    <!-- start ajax correct assignment window-->
    <div id="changeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="change_form">
                    <div class="modal-header" style="margin-top: 20px;">
                        <h4 class="modal-title">編輯資料</h4>
                        <button type="button" class="close" data-dismiss="modal" style="            box-shadow: 0px 0px 0px white;
">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>身分</label>
                            <select id="modal_status" name="status" class="form-control m-t-15" style="height: 50px;width: 30%;" required>
                                <option value=1> 管理員 </option>
                                <option value=2> 道路維修員 </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>姓名</label>
                            <input type="text" id="modal_name" name="name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="modal_email" name="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>聯絡電話</label>
                            <input type="text" id="modal_phone" name="phone">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="modal_id" name="id" value="" />
                        <input type="submit" name="submit" id="action" value="確認" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- start ajax correct assignment window-->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="change_form">
                    <div class="modal-header" style="margin-top: 20px;">
                        <h4 class="modal-title">新增人員</h4>
                        <button type="button" class="close" data-dismiss="modal" style="            box-shadow: 0px 0px 0px white;
">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>身分</label>
                            <select id="modal_status" name="status" class="form-control m-t-15" style="height: 50px;width: 30%;" required>
                                <option value=1> 管理員 </option>
                                <option value=2> 道路維修員 </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>姓名</label>
                            <input type="text" id="modal_name" name="name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="modal_email" name="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>聯絡電話</label>
                            <input type="text" id="modal_phone" name="phone">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="modal_id" name="id" value="" />
                        <input type="submit" name="submit" id="action" value="確認" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end ajax correct assignment window -->
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
    </script>

    <script>
        $('#citySelect').on('change', function() {
            var city_id = this.value;
            $.ajax({
                url:'{{ route('select.changeCity') }}',
                method:"POST",
                data: city_id,
                dataType:"json",
                success:function(data)
                {
                    if (data.error.length > 0)
                    {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else
                    {
                        $('#form_output').html(data.success);
                    }
                }
            })
        });
    </script>

@endsection
