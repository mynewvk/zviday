	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Вхід</h4>
      </div>
      <div class="modal-body">
       <?=form_open('auth/login')?>
  <div class="form-group">
    <?=form_label('Логін')?>
    <?=form_input('username','','class="form-control"')?>
  </div>
  <div class="form-group">
    <?=form_label('Пароль')?>
    <?=form_password('password','','class="form-control"')?>
  </div>
  <div class="form-group">
    <?=form_submit('submit','Війти!','class="btn btn-success" style="font-weight:bold"')?>
    <a href="/auth/register" style="padding-left:15px"><strong>Регестрація</strong></a>
  </div>
  <?=form_close()?>
      </div>
       <div class="modal-footer">
  		<?=anchor('https://oauth.vk.com/authorize?client_id=4110203&scope=offline,friends,status&redirect_uri='.base_url().'auth/vk&response_type=code&v=5.5',"<strong>Ввійти за допомогою VK</strong>",'class="btn btn-primary btn-block btn-large"')?>
      </div>
    </div><!-- /.modal-content -->
  </div>
  </div><!-- /.modal-dialog -->