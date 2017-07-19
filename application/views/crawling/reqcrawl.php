<!--글감수집-->
            <form name="fo" method=post action="">
                <div id="cList">
                    <div class="c-inner">
                        <div class="c-list-tit">
                            <p>글감수집 현황</p>
                        </div>
                        <div class="c-table-wrap">
                        
                            site : 1 - daum, 2 - naver
                            <input type="text" name="site" id="site" value=2><br>
                            ID : <input type="text" name="s_id" id="s_id" value="jazzwave14"><br>
                            PWD : <input type="password" name="s_pwd" id="s_pwd" value="jun14^^"><br>
                            usn : <input type="text" name="usn" id="usn" value="1"><br>
                            Filter : <br>
                            option 1 <input type="checkbox" name="filter" id="filter" value="1"> 
                            option 2 <input type="checkbox" name="filter" id="filter" value="2"> 
                             <a href="#" onclick="javascript:callCrawl()" >[ SEND ]</a>
                        </div>
                    </div>
                </div>
            </form>
                <!--//글감수집-->
<script>
  function callCrawl()
  {
      var test = new Array();
      var cnt = 0;
      $("input[id=filter]:checked").each(function() {
          test[cnt] = $(this).val() ;
          console.log(test);
          cnt++;
      });

    $.post(
      "<?=HOSTURL?>/Crawling/rpcCrawling"
      ,{
           "site" : $('#site').val() 
           ,"s_id" : $('#s_id').val() 
           ,"s_pwd" : $('#s_pwd').val() 
           ,"usn" : $('#usn').val() 
           ,"filter" : test 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
            alert('요청되었습니다.');
            location.href = "<?=HOSTURL?>/Crawling/History";
        }
      }
    );         
  }      
</script>

