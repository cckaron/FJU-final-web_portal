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
                        <h5 id="modal_created_at" style="color:blue"></h5>
                    </div>
                    <div class="form-group">
                        <label>路口名稱</label>
                        <h5 id="modal_name" style="color:blue"></h5>
                    </div>
                    <div class="form-group">
                        <label>錯誤代碼</label>
                        <h5 id="modal_content" style="color:red"></h5>
                    </div>
                    <div class="form-group">
                        <label>狀態</label>
                        <h5 id="modal_status" style="color:green"></h5>
                    </div>
                    <div class="form-group">
                        <label>維修狀態</label>
                        <h5 id="modal_repair_status" style="color:green"></h5>
                    </div>
                    <div class="form-group p-t-5">
                        <label>近期影像</label>
                        <br>
                        <img src="<?php echo asset("storage/maintenance/1/cam.jpg")?>" alt="" height="216" width="384"/>
                    </div>
                    <div class="form-group">
                        <h6 id="modal_updated_at" style="color:blue; float:right"></h6>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
