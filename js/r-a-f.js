$(document).on('click','.ReferralBonusCollect',function(){
    var action = 'ReferralBonusCollect';
    $('.my_msg1').html('<div class="load3_box"></div>');
    $.post('./__team_history.php', {action:action}, function(data){
        $('.my_msg1').html(data);
    });
});
$(document).on('click','.ReferralBonusCancel',function(){
    $('.ReferralBonusPopup').fadeOut(200);
});
function ReferralRewardRecord(){
    var action = 'ReferralRewardRecord';
	$('.ReferralRewardResult').html('<div class="load5"></div>');
    $.post('./__team_history.php', {action:action}, function(data){
        $('.ReferralRewardResult').html(data);
    });
}
$(document).on('click','.ShowReferralRewardRecord',function(){
	ReferralRewardRecord();
});
$(document).on('click','#ReceiveReward',function(){
	//ClickBtnPlay();
	$('.my_msg2').html('<div class="load"></div>');
	var action = 'ReceiveReward';
    $.post('./__ac_update_action.php', {action:action, rurl:rurl}, function(data){
        $(".my_msg2").html(data);
    });
});