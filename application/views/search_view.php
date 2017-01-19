<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-xs-12">
				<h4 class="inline">Пошук користувачів</h4>
				<a href="/account/vk_friends" class="btn pull-right btn-primary" ><i style="display:inline-block;width:24px;height:24px;background-image:url(/media/vk_icon.png);margin:0"></i> <b style="vertical-align:super">Пошук друзів з Вконтакті</b></a>
				<hr>
				<form action="/account/search" method="GET">
					<div class="input-group">
					      <input type="text" class="form-control" placeholder="введіть імя або фамілію" name="q">
					      <span class="input-group-btn">
					        <button class="btn btn-success" type="submit">Пошук!</button>
					      </span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?$this->load->view('template/bottom_nav_view')?>
</div>
<?$this->load->view('template/footer_view')?>