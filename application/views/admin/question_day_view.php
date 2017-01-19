<?$this->load->view('admin/template/header_view')?>
<?
	
?>
<div class="container">
	<?if(isset($success)):?>
		<div class="alert alert-success">
		    <a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong><?=$success?></strong> <i class="glyphicon glyphicon-ok"></i>
		</div>
	<?endif;?>
	<div class="well">
		<h1>Питання для всіх</h1>
		<hr>
		<div class="row">
			<div class="col-xs-12">
				<?=form_open('admin/set_question_day')?>
					<div class="form-group">
						<label for="text">Питання:</label><textarea type="text" class="form-control" rows="7" name="text" id="text"/></textarea>
					</div>
					<div class="form-group">
						<label for="hash">Хеш:</label><input type="text" class="form-control" name="hash" id="hash"/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="submit">OK</button>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>	
</div>