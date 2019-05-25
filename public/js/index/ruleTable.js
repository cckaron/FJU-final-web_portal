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
