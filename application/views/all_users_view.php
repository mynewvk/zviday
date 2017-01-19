<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
					<? foreach($users as $val):?>
					<div class="media">
						<a class="pull-left" href="<?="/".$val->username?>">
						    <img class="media-object" src="<?=$val->photo_small?>">
						</a>
						<div class="media-body">
						    <h4 class="media-heading"><?=$val->name?></h4>
							<div class="alert alert-info">
								<strong><?=$val->status?></strong>
								<small>(<?=$val->city?>)</small>
								<small><?=$this->db->where("to",$val->id)->where("is_new",0)->get('questions')->num_rows();?></small>
							</div>
						</div>
					</div>
					<?endforeach?>
	</div>
	<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>