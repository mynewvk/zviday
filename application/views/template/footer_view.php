<?load_media(array('timeago','main.js','bootstrap_js'))?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
<script type="text/javascript">
  VK.init({apiId: 4110203, onlyWidgets: true});
  VK.Widgets.Like("vk_like", {type: "button",height: "22px"});
  VK.Widgets.Comments("vk_comments", {limit: 10, width: $('.row').width() - 24, attach: "*"});
</script>
</body>
</html>