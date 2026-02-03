
/* function TicketRecord(){
    var action = 'TicketRecord';
    $.post('./__setting_action.php', {action:action}, function(data){
        $('.TicketData').html(data);
    });
}
TicketRecord(); */
$(document).ready(function(e) {///////////////

	//Password Show
	$(document).on('click', '.pPassShow', function(){	
		var x = $("#userPass").attr('type');
		if (x === "password") {
			$("#userPass").attr('type','text');
			$('.pPassShow i').css('opacity', '1');
			$('.pPassShow i').removeClass('fa-eye-slash');
			$('.pPassShow i').addClass('fa-solid fa-eye');
		} else {
			$("#userPass").attr('type','password');
			$('.pPassShow i').css('opacity', '0.4');
			$('.pPassShow i').removeClass('fa-eyel');
			$('.pPassShow i').addClass('fa-regular fa-eye-slash');
		}	
		
	});
	

	//Password Show 2
	$(document).on('click', '.pPassShow2', function(){	
		var x = $("#userPass2").attr('type');
		if (x === "password") {
			$("#userPass2").attr('type','text');
			$('.pPassShow2 i').css('opacity', '1');
			$('.pPassShow2 i').removeClass('fa-eye-slash');
			$('.pPassShow2 i').addClass('fa-solid fa-eye');
		} else {
			$("#userPass2").attr('type','password');
			$('.pPassShow2 i').css('opacity', '0.4');
			$('.pPassShow2 i').removeClass('fa-eyel');
			$('.pPassShow2 i').addClass('fa-regular fa-eye-slash');
		}	
		
	});
	
	//Change name
	$(document).on('click','#ChangeNameSave',function(){
		var action = 'ChangeNameSave';
		var uFname = $('#uFname').val();
		var uLname = $('#uLname').val();
		var CaptchaCode2 = $('#CaptchaCode2').val();
		$('.all_msg1').html('<div class="load3_box"></div>');
			$.post('./__ac_update_action.php', {action:action, uFname:uFname, uLname:uLname, CaptchaCode:CaptchaCode2}, function(data){
				$(".all_msg1").html(data);
			});
		//ClickBtnPlay();
	});
	
	//PassChange
	$(document).on('click','#PasswordModify',function(){
		var action = 'PasswordModify';
		var userPass = $('#userPass').val();
		var userPass2 = $('#userPass2').val();
		var CaptchaCode2 = $('#CaptchaCode2').val();
		$('.all_msg1').html('<div class="load3_box"></div>');
		$.post('./__ac_update_action.php', {action:action, userPass:userPass, userPass2:userPass2, CaptchaCode:CaptchaCode2}, function(data){
			$(".all_msg1").html(data);
		});
		//ClickBtnPlay();
	});
	
	//ActivityLogsClose
	$(document).on('click','#ComplaintSubmit',function(){
		var action = 'ComplaintSubmit';
		var SelectIssu = $('#SelectIssu').val();
		var Msg = $('#Msg').val();
		var CaptchaCode2 = $('#CaptchaCode2').val();
		$('.all_msg1').html('<div class="load3_box"></div>');
			$.post('./__ac_update_action.php', {action:action, SelectIssu:SelectIssu, Msg:Msg, CaptchaCode:CaptchaCode2}, function(data){
				$(".all_msg1").html(data);
			});
		//ClickBtnPlay();
	});
	$(document).on('click','.Cancel',function(){
		$(".pp_msg").html('');
	});
	$('.se_faq dd').hide();
	$('.se_faq dt').hover(function(){
		$(this).addClass('hover');
	},function(){$(this).removeClass('hover')}).click(function(){
		$(this).next().slideToggle('normal');
	});	
});