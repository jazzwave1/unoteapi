<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Eduniety | Unote Admin</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          
        <script src="https://code.jquery.com/jquery.js"></script>
    </head>
    <body>
        <form name=for>
            Eduniety User Info Input<br>
            <!--ID : <input type="text" name="user_id" id="user_id" value="1111"/><br-->
            ID : <input type="text" name="user_id" id="user_id" value="chomerbleu"/><br>
            PWD : <input type="password" name="user_pwd" id="user_pwd" /><br>

            <input type="button" id="bSend" value="SEND">
            <br>
            <br>
            <input type="button" id="FBLogin" value="FaceBook Login Test">
        </form>
    </body>
</html> 

<script>
  $(function(){
    $('#bSend').click(function(){
        $.post(
          "<?=HOSTURL?>/Login/RpcLogin"
          ,{
               "user_id" : $('#user_id').val() 
              ,"user_pwd" : $('#user_pwd').val() 
           }
          ,function(data, status) {
                if (status == "success" && data.code == 1)
                {
                    window.location.href="<?=HOSTURL?>/Main";
                }
                else
                {
                    alert(data.msg);
                } 
          }
        );
    });

    $('#bSend').click(function(){
        $.post(
          "<?=HOSTURL?>/Login/RpcLogin"
          ,{
               "site" : 'Facebook' 
           }
          ,function(data, status) {
                if (status == "success" && data.code == 1)
                {
                    window.location.href="<?=HOSTURL?>/Main";
                }
                else
                {
                    alert(data.msg);
                } 
          }
        );
   

    });
  });
</script>
