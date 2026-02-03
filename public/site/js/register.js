
   window.onload = function() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/public/html/register.txt', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('content_html').innerHTML = xhr.responseText;
        document.getElementById('invitation_code').value = invitation_code;
      }
    }
    xhr.send();
  }
  
  
  layui.use(function(){
        var $ = layui.jquery;
        var form = layui.form;
        var layer = layui.layer;
    
        $('#area_code').html("{$system['area_code']}");
        $('#invitation_code').val(invitation_code);

        form.on('submit(register)', function(data){
            var data = data.field; 
            $.post('/register',data,function (res) {
                console.log(res)
                if(res.status==1){
                    layer.msg(res.msg,{time:3000,end:function () {
                            window.location.href='/login';
                    }});

                }else{
                    layer.msg(res.msg);
                }
            })
            return false; 
        });
        var timeLeft = 120; 
        var timer;
        $(document).on('click','#getCode',function() {
            $('#getCode').attr('disabled', true);
            $.post('/sendSms',{'type':'register','tel':$("input[name='username']").val()},function (res) {
                layer.msg(res.msg);
                if(res.status==1){

                    $('#getCode').text(timeLeft + 's');
                    setTimeout(function () {
                        $("#code").val(res.result.otp)
                        layer.open({
                            type: 1,
                            area: ['100%', 'auth'], 
                            title: false, 
                            closeBtn: 0,
                            offset: 't',
                            anim: 1,
                            time:3000,
                            shade:0,
                            shadeClose: true, 
                            content: '<div style="padding: 20px;background: linear-gradient( 140deg, #17A477 0%, #17C073 100%);color: #FFFFFF ">You need to ensure that your phone number is correct. To withdraw funds, you need to collect an OTP verification code on your phone.</div>'
                        });
                    },3000)

                    timer = setInterval(function() {
                        timeLeft--;
                        $('#getCode').text(timeLeft + 's');

                        if (timeLeft <= 0) {
                            clearInterval(timer);
                            $('#getCode').attr('disabled', false).text('Send');
                        }
                    }, 1000);
                }else{
                    $('#getCode').attr('disabled', false);
                }
            })

        });
    });