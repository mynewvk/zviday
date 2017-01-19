<?$this->load->view('template/header_base_view')?>
<?$this->load->view('header_not_login_user_view')?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?113"></script>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-xs-6">
				<h1>Ласкаво просимо на Звідай нет</h1>
				<h4>Сайт, який дає змогу анонімно задати питання, які в житті сказати важко</h4>
				<div class="btn-group">
					<a class="btn btn-lg btn-success" href="/auth/register">Реєстрація</a>
					<a class="btn btn-lg btn-primary" href="/auth/login">Вхід</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div id="vk_groups" class="pull-right"></div>
				<script type="text/javascript">
				VK.Widgets.Group("vk_groups", {mode: 0, width: "400", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 34558607);
				</script>
			</div>
		</div>
	</div>
	<?$this->load->view('template/bottom_nav_view')?>
</div>
<?$this->load->view('template/modal_login_view')?>
<script src="/media/js/main.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>