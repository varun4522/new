//Login
function userLogin(){
	var action = 'userLogin';	
	var userPhone = $('#userPhone').val();	
	var userEmail = $('#userEmail').val();	
	var userPass = $('#userPass').val();
	var userLoginType = $('#userLoginType').val();
	var KeepMeLogin = $('#KeepMeLogin:checked').prop('checked',true).val();
	var CaptchaCode = $('#CaptchaCode').val();
	$('.my_msg1').html('<div class="load"></div>');
	$('#userLogin').html('LOGIN... <i class="fa-solid fa-spinner fa-spin-pulse"></i>');
	$.post('./__login_reg_action.php', {action:action, KeepMeLogin:KeepMeLogin, userPhone:userPhone, userEmail:userEmail, userPass:userPass, userLoginType:userLoginType, CaptchaCode:CaptchaCode}, function(data){
		//alert(data);
		$(".my_msg1").html(data);
		$('#userLogin').html('SUBMIT <i class="ri-arrow-right-s-line"></i>');
	});
}
function getOtpBox(){
	$(".bi_otp_box").fadeIn(300);
}
function TimerRun(){	
	$('.userForgot').prop('disabled', true);
	var timeleft = 300;//5 Minuts
    var downloadTimer = setInterval(function(){
    timeleft--;
	$(".SetTimer").html(timeleft + ' sec');
		if(timeleft <= 0){		
			clearInterval(downloadTimer);
			$('.userForgot').prop('disabled', false);
			 $(".SetTimer").html("");
		}
	},1000);
}

function SentBtnEnable(){
	setTimeout(function() {
		$('.userForgot').attr('disabled',false);
	}, 60000);	
}

var newsTData=Array("Free earn 50₹ per day...", "Free Register start daily earning...", "Just watch reels earn money...", "Instant withdraw your income...", "Refer friends earn lots of income.");
var cursor="_"; // set cursor
var delay=5; // seconds between each news itemNo
var newsp, cursp, flash, itemNo=0;
if (typeof('addRVLoadEvent')!='function') function addRVLoadEvent(funky) {
  var oldonload=window.onload;
  if (typeof(oldonload)!='function') window.onload=funky;
  else window.onload=function() {
	if (oldonload) oldonload();
	funky();
  }
}

addRVLoadEvent(teleprint);

function teleprint () { if (document.getElementById) {
	var span=document.getElementById("newsTxt");
	while (span.childNodes.length) span.removeChild(span.childNodes[0]);
	delay*=1000;
	newsp=document.createElement("span");
	cursp=document.createElement("span");
	cursp.appendChild(document.createTextNode(String.fromCharCode(160)+cursor));
	span.appendChild(newsp);
	span.appendChild(cursp);
	ticker();
}}

function ticker() {
	var i;
	while (newsp.childNodes.length) newsp.removeChild(newsp.childNodes[0]);
	newsp.appendChild(document.createTextNode(newsTData[itemNo].substring(0,1)));
	for (i=1; i<newsTData[itemNo].length; i++) setTimeout('newsp.firstChild.nodeValue="'+newsTData[itemNo].substring(0, i+1)+'"', 100*i);
	if (newsTData[itemNo].indexOf("www")!=-1) setTimeout('linkit('+itemNo+')', 100*i);
	setTimeout('flash=setInterval("cursp.style.visibility=(cursp.style.visibility==\'visible\')?\'hidden\':\'visible\'", 234)', 100*i)
	setTimeout('clearInterval(flash)', delay);
	setTimeout('cursp.style.visibility="visible"', delay);
	setTimeout('ticker()', delay);
	itemNo=++itemNo%newsTData.length;
}

function linkit(q) {
	var a,p,e,l;
	p=newsTData[q].indexOf("www");
	e=newsTData[q].indexOf(" ", p);
	if (e==-1) e=newsTData[q].length;
	l=newsTData[q].substring(p, e);
	while (newsp.childNodes.length) newsp.removeChild(newsp.childNodes[0]);
	newsp.appendChild(document.createTextNode(newsTData[q].substring(0, p)));
	a=document.createElement("a");
	a.href="http://"+l;
	a.appendChild(document.createTextNode(l));
	newsp.appendChild(a);
	newsp.appendChild(document.createTextNode(newsTData[q].substring(e)));
}

$(document).ready(function(e) {
	

	/* $(document).on('click keyup', '#userPhone', function(){
		if($('#userPhone').val() == ''){
			$('#userPhone').val('+91');
		}
	});
	$(document).on('click keyup', '#userPhone', function(){
		if($('#userPhone').val() == ''){
			$('#userPhone').val('+91');
		}
	}); */
	//Password Show
	$(document).on('click', '.pPassShow', function(){	
		var x = $("#userPass").attr('type');
		if (x === "password") {
			$("#userPass").attr('type','text');
			$('.pPassShow i').css('opacity', '1');
			$('.pPassShow i').removeClass('fa-regular fa-eye-slash');
			$('.pPassShow i').addClass('fa-solid fa-eye');
		} else {
			$("#userPass").attr('type','password');
			$('.pPassShow i').css('opacity', '0.6');
			$('.pPassShow i').removeClass('fa-solid fa-eye');
			$('.pPassShow i').addClass('fa-regular fa-eye-slash');
		}	
		
	});
	

	//Password Show 2
	$(document).on('click', '.pPassShow2', function(){	
		var x = $("#userPass2").attr('type');
		if (x === "password") {
			$("#userPass2").attr('type','text');
			$('.pPassShow2 i').css('opacity', '1');
			$('.pPassShow2 i').removeClass('fa-regular fa-eye-slash');
			$('.pPassShow2 i').addClass('fa-solid fa-eye');
		} else {
			$("#userPass2").attr('type','password');
			$('.pPassShow2 i').css('opacity', '0.6');
			$('.pPassShow2 i').removeClass('fa-solid fa-eye');
			$('.pPassShow2 i').addClass('fa-regular fa-eye-slash');
		}	
		
	});
	
	$(document).on('click','#userLogin',function(){
		userLogin();
	});
	$('#userPhone, #userPass, #CaptchaCode').keypress(function (e) {
	  if (e.which == 13) {
		  userLogin();
	  }
	});
	
	$(document).on('click','#userRegister',function(){
		var action = 'userRegister';	
		var userFName = $('#userFName').val();	
		var userPhone = $('#userPhone').val();	
		var userEmail = $('#userEmail').val();
		var userPass = $('#userPass').val();
		var userPass2 = $('#userPass2').val();
		var CaptchaCode = $('#CaptchaCode2').val();
		var userReferral = $('#userReferral').val();
		$('.my_msg1').html('<div class="load"></div>');
		
		/*alert('Registration temporary hold try some time leta');*/
		$.post('./__login_reg_action.php', {action:action, userFName:userFName, userPhone:userPhone, userEmail:userEmail, userPass:userPass, userPass2:userPass2, userReferral:userReferral, CaptchaCode:CaptchaCode}, function(data){
				$(".my_msg1").html(data);
		});
	});
	$(document).on('click','.userForgot',function(){
		var action = 'userForgot';	
		var userPhone = $('#userPhone').val();
		var userEmail = $('#userEmail').val();
		$('.my_msg1').html('<div class="load"></div>');
		//alert();
		$.post('./__login_reg_action.php', {action:action, userPhone:userPhone, userEmail:userEmail}, function(data){$(".my_msg1").html(data);});
	});

	//ChangePassword
	$(document).on('click','#ChangePassword',function(){
		var action = 'ChangePassword';	
		var userPhone = $('#userPhone').val();
		var userEmail = $('#userEmail').val();
		var userOTP = $('#OTP').val();
		var userOTP2 = $('#OTP2').val();
		var userPass = $('#userPass').val();
		var userPass2 = $('#userPass2').val();
		$('.my_msg1').html('<div class="load"></div>');
		$.post('./__login_reg_action.php', {action:action, userPhone:userPhone, userEmail:userEmail, userOTP:userOTP, userOTP2:userOTP2, userPass:userPass, userPass2:userPass2}, function(data){$(".my_msg1").html(data);});
	});
	
});