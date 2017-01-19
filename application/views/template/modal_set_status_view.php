	<div class="modal fade" id="set_status_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-pencil"></i> Змінити статус </h4>
      </div>
      <div class="modal-body">
        <?=form_open('settings/set_status')?>
        <div class="form-group">
          <input type="hidden" name="hash" value="<?=$hash?>" id="status-hash">
          <textarea type="text" name="status" class="form-control" style="margin-bottom:10px;" id="status-area"><?=$status?></textarea>
          <button type="submit" class="btn btn-primary" name="submit" id="button-set-status"><strong>OK</strong></button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>