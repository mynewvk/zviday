<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
			<div class="alert alert-danger">
				<p>
					<b><?=$error?></b>
				</p>
			</div>
			<button class="btn btn-primary" onclick="history.go(-1)">Повернутися</button>
		</div>
	</div>
<?$this->load->view('template/footer_view')?>