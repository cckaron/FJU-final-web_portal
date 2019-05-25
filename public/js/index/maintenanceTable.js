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
            "data": "updated_at",
            render: function(data) {
                return data+'('+moment(data).fromNow()+')';
            },
            "width": "25%"
        },
        {
            "data": "id",
            render: function(data) {
                return '<a href="#" data-toggle="modal" data-placement="top" data-target="#detailModal" data-maintenance-id='+data+' title="詳細內容">\n' +
                    '<i class="mdi mdi-open-in-new"></i>\n' +
                    '</a>'
            },
            "width": "15%"
        }
    ],

    columnDefs: [
        {
            'targets': 0,
            'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('id', 'content');
            },
        },
        {
            'targets': 1,
            'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('id', 'name');
            }
        },
        {
            'targets': 2,
            'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('id', 'status');
                $(td).attr('data-status', cellData);
            }
        },
        {
            'targets': 3,
            'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('id', 'repair-status');
                $(td).attr('data-repair-status', cellData);
            }
        },
        {
            'targets': 4,
            'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('id', 'created_at');
            }
        },
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
