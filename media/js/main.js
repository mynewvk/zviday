var popup_timeout;
var question_offset = 10;
$('body').append('<div id="popup-div"><h4></h4></div>');

var show_popup = function(text){
	clearTimeout(popup_timeout);
	var p = $('#popup-div');
	p.css({
		display: "block",
		position: "fixed",
		padding: "20px",
		opacity: 1,
		"border-radius": "10px",
		"box-shadow": "0 0 10px rgba(0,0,0,.7)",
		color: "#fff",
		"z-index": 100,
		"background-color": "rgba(0,0,0,.8)",
	});
	p.children('h4').html(text);
	//p.css({width:"40%"});
	var left = ($(window).width() - p.width()) / 2;
	var top = ($(window).height() - p.height() - 200) / 2;
	p.css({
		left: left,
		top: top,
	});
	popup_timeout = setTimeout(hide_popup,3000);
}
hide_popup = function(){
	$('#popup-div').animate({opacity: 0},600,function(){$('#popup-div').hide()});
}
var follow = function(id){
	$.post("/account/follow/"+id," ", function(data, textStatus, xhr) {
		btn = $('#follow');
		btn.addClass('disabled');
		if(data == "follow"){
			btn.removeClass('btn-success');
			btn.addClass('btn-danger');
			btn.html('<i class="glyphicon glyphicon-remove"></i><strong> Отписатися</strong>');
			show_popup("Ви підписалися :))");
			btn.removeClass('disabled');
		}else if(data == "un follow"){
			btn.removeClass('btn-danger');
			btn.addClass('btn-success');
			btn.html('<i class="glyphicon glyphicon-plus"></i><strong> Подписатися</strong>');
			show_popup("Ви відписалися");
			btn.removeClass('disabled');
		}else{
			show_popup("error");
		}
	});
}
$("#button-set-status").click(function(){
	var status = $('#status-area').val();
	var hash = $("#status-hash").val();
	setStatus(status, hash);
	return false;
})
function setStatus(text, hash){
	$.post('/settings/set_status',{status: text, hash: hash}, function(data){
		if(data != "error"){
			$('#user-status').html(data);
			$('#set_status_box').modal('hide');
		}
	});
}
function hideAskArea(){
	if($(".ask-again").css('display') == "none"){
		$(".ask-again").css('display','block');
		$('.ask-area').css('display',"none"); 
		$('textarea').val(' ');
		$('#emoji-button').popover('hide');
	}
	else{
		$('.ask-area').css('display',"block");
		$(".ask-again").css('display','none');
	}
}
function delAsk(hash){
	$.ajax({
	  type: "POST",
	  data: "token=" + userToken,
	  url: '/questions/delete/'+hash,
	  success: function(data){
	  	if(data == 1){
	  		show_popup('error');
	  	}
	  	if(data == "ok"){
	  		$("#"+ hash).animate({opacity: 0}, 500, function(){
	  			$(this).css({display: "none"});
	  		});
	  		reset_question_count();
	  	}
	  	else{
	  		show_popup(data);
	  	}
	  },
	});
}
$('.ask-button').click(function(){
	var question = $('textarea').val();
	var question =  $.trim(question);
	var id = $('.ask-user-id').val();
	var token = $('#token').val();
	var anonymous = $("#anonymous").prop("checked");
	if(question !== ''){
		ask(question, id, anonymous, token);
	}
	return false;
});
function ask(ask, id, anon,token){
	$(".ask-button").addClass('disabled');
	$.post('/questions/getask',{ask: ask,id: id, anonymous: anon,token: token}, function(data){
		if(data != "ok"){
			show_popup(data);
		}else{
			hideAskArea();
			$(".ask-button").removeClass('disabled');
		}

	});
}
function load_ask(id){
	$("#load-ask-button").addClass('disabled');
	$.post("/questions/load_ask/"+question_offset+"/" + id,'',function(data){
		if(data == "max offset"){
			$("#load-ask-button").hide();
			show_popup(data);
		}else{
			$('#load-ask-button').before(data);
			$('.del-ask').tooltip();
			$(".timeago").timeago();
			$("#load-ask-button").removeClass('disabled');
			question_offset += 10;
		}
	});
	if(allUserQuestionCount <= question_offset + 10){
		$("#load-ask-button").hide();
	}
}
$("#question-area").blur(function(event) {
	$('#emoji-button').popover('hide');
});
$("#question-area").focus(function(event) {
	$('#emoji-button').popover('hide');
});
function emoji_add(element){
	emoji = element.attr('data-emoji');
	textarea = $('#question-area');
	val = textarea.val();
	textarea.val(val + emoji);
	return false;
}
function emoji_add_q(element){
	el = element;
	emoji = el.attr('data-emoji');
	hash = el.parent().attr('data-hash');
	textarea = $('#question-' + hash);
	textarea.focus();
	val = textarea.val();
	textarea.val(val + emoji + " ");
}
function reset_question_count(){
	el = $('.q-count');
	count = parseInt(el.text());
	new_count = count - 1;
	el.text(new_count);
}
$('#question-area').keyup(function(event) {
	el = $('#later-count');
	c = $(this).val().length;
	el.text(255 - c);
});