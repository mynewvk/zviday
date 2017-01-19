	<div class="modal fade" id="photo_upload_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-camera"></i> Поміняти фотографію</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('settings/photo_upload');?>
          <div class="form-group">
            <input type="file" name="userfile" size="20" />
            <p class="help-block">фотографія має боти не більше 2 мб, формату png або jpg</p>
            <?if(isset($error)):?>
            <p><?=$error?></p>
            <?endif?>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="submit">Загрузити</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div>
  </div><!-- /.modal-dialog -->