<script  src="http://code.jquery.com/jquery-latest.min.js"></script>

<form name="fo" method="post">
    ID : <input type="text" id="user_id" name="user_id" ><br>
    PWD : <input type="password" id="pwd" name="pwd" ><br>
    <a href="javascript:bSend()" >[  요청하기 ]</a>
</form>



<script>

function bSend(){
    var user_id = $.trim($('#user_id').val()) ;
    var pwd     = $.trim($('#pwd').val()) ;

    if( user_id == '' || pwd == ''){
        alert('입력정보를 확인 해 주세요 ');      
        return ;
    }

    $.post(
        "./setCrawling"
        ,{
             "user_id"     : $.trim($('#user_id').val())
            ,"pwd"         : $.trim($('#pwd').val())
        }
        ,function(data, status){
            if(status == 'success' && data.code == 1)
            {
                alert('크롤링신청이 정상적으로 요청 되었습니다.');
                return;
            }
            else
            {
                alert('실패하였습니다.');
                return;
            }
        }
    );
}
    
</script>
