
    window.onload = function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/public/html/login.txt', true);
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
        // 提交事件
        form.on('submit(demo-login)', function(data){
            var data = data.field; // 获取表单字段值
            $.post('/doLogin',data,function (res) {
                console.log(res)
                layer.msg(res.msg);
                if(res.status==1){
                    window.location.href= window.location.origin
                }
            })
            return false; // 阻止默认 form 跳转
        });

    });
