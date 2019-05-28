<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="edit_form">
                <div class="modal-header" style="margin-top: 20px;">
                    <h4 class="modal-title">維修狀態回報</h4>
                    <button type="button" class="close" data-dismiss="modal" style="            box-shadow: 0px 0px 0px white;
">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <span class="form_output"></span>
                    <div class="form-group">
                        <label>維修狀態</label>
                        <select id="modal_status" name="status" class="form-control m-t-15" style="height: 36px;width: 100%;" required>
                            <option value=1> 待修 </option>
                            <option value=2> 維修中 </option>
                            <option value=3> 修繕完成 </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>說明</label>
                        <input type="text" id="modal_remark" name="remark" class="form-control" required3/>
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
