<div class="col-lg-6">
    <div class="box box-info">
        <div class="box-body">
            <p class="margin">윤문 입력<code>검색하실 문장을 입력해 주세요</code></p>

            <div class="input-group input-group-sm">
                <input type="text" id="sStr" name="sStr" class="form-control">
                <span class="input-group-btn">
                    <button type="button" id="bSend" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="box box-success">
        <div class="box-body">
            <div class="form-group">
                <label>결과</label>
                <textarea id="api_result" class="form-control" rows="20" placeholder="API Result ..." disabled></textarea>
            </div>
        </div>
    </div>
</div>
<script>
  $(function(){
    $('#bSend').click(function(){
        $.post(
          "<?=HOSTURL?>/unoteadmin/RpcIbSpellCheck/"+$('#sStr').val()
          ,{
               "sStr" : $('#sStr').val() 
           }
          ,function(data, status) {
                if (status == "success" && data.code == 1){
                    var result = data.result.result;
                    var t_string = ''; 
                    for(var i=0 ; i < result.length ; i++){
                        t_string +=  "input : "  + result[i].input + "\n"; 
                        t_string +=  "output : " + result[i].output + "\n";
                        t_string +=  "etype : " + result[i].etype + "\n"; 
                    } 
                    $('textarea#api_result').val(t_string); 
                }
          }
        );
    }); 
  });
  
/*
  function changeState(usn, course_idx, state)
  {
    $.post(
      "<?=HOSTURL?>/Admin/rpcUpdateState"
      ,{
           "usn" : usn 
          ,"state" : state 
          ,"course_idx" : course_idx 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
          alert('변경 되었습니다.'); 
          window.location.reload(true);
        }
      }
    );         
  } 
  function showSangse(usn,course_idx)
  {
    $.post(
      "<?=HOSTURL?>/Admin/rpcGetQuestionInfo"
      ,{
         "usn" : usn 
         ,"course_idx" : course_idx 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
          document.getElementById('sangse_recommend').innerHTML = data.recommend; 
          document.getElementById('sangse_motive').innerHTML = data.motive; 
          document.getElementById('sangse_experience').innerHTML = data.experience; 
          document.getElementById('sangse_nature').innerHTML = data.nature; 
          document.getElementById('sangse_favor').innerHTML = data.favor; 
          document.getElementById('sangse_jr_hope').innerHTML = data.jr_hope; 
          document.getElementById('sangse_channel').innerHTML = data.channel; 
          document.getElementById('sangse_club_hope').innerHTML = data.club_hope; 
          document.getElementById('sangse_inquiry').innerHTML = data.inquiry; 
        }
      }
    );
  }
 */
</script>
