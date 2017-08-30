<div class="col-lg-6">
    <div class="box box-info">
        <div class="box-body">
            <p class="margin">페이스북으로 로그인을 합니다.</p>
            <form action="" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">FaceBook Access Token</label>
                  <input type="email" class="form-control" id="facebookToken" name="id" placeholder="FB Access Token">
                </div>
                <button scope="public_profile,email" type="button" class="btn btn-block btn-primary" onclick="javascript:checkLoginState();"><b>FB Login</b></button> 
            </form>
        </div>
    </div>


    <div class="box box-success">
        <div class="box-body">
            <label for="exampleInputEmail1">내 페이스북 페이지</label>
            <div id="radioadd" class="form-group">
            </div>
            <button type="button" class="btn btn-block btn-primary" onclick="javascript:callCrawl();"><b>Select FB Page</b></button> 
        </div>
    </div>
</div>



<!--div class="col-lg-12">
    <div class="box box-success">
        <div class="box-body">
            <div class="form-group">
                <label>결과</label>
                <textarea id="api_result" class="form-control" rows="20" placeholder="API Result ..." disabled></textarea>
            </div>
        </div>
    </div>
</div-->


<script>
    function test(data)
    {
        var html = "";

        //html +=   "<input type=radio id=id1 name=rooms /> aaaa";
        //html +=   "<input type=radio id=id1 name=rooms /> bbbb";
        
        for(var i=0 ; i< data.length ; i++)
        {
        
            html +=   "<input type=radio id=id1 name=fbptoken value='"+ data[i].access_token +"'/> " + data[i].name + "<br>";
        }

        $("#radioadd").append (html);

    }


function callCrawl()
{
    var test = new Array(); 
    var s_id = "";
    var s_pwd = ""; 
    
    var s_id  = "AT"; 
    var s_pwd = $(":input:radio[name=fbptoken]:checked").val();

    $.post(
      "<?=HOSTURL?>/Crawling/rpcCrawling"
      ,{
           "site"   : 3 
           ,"s_id"  : s_id 
           ,"s_pwd" : s_pwd 
           ,"usn"   : 1 
           ,"filter" : test 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
            alert('요청되었습니다.');
        }
        //아이디 오류
        else if (status == "success" && data.code == 1)
        {
            alert('오류입니다');
        }
      }
    );         
}

</script>


<!--facebook login script-->
<script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        console.log("UserId : "+response.authResponse.userID);
        console.log("token : "+response.authResponse.accessToken);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            testAPI();

            // test code 잠시 막음
            //document.getElementById('facebookToken').value = response.authResponse.accessToken;
       
            console.log('GOGO API~'); 
            //document.fo.submit();
            
            //callCrawl(); 
        } else {
            console.log('이건 뭔가요??'); 
           // The person is not logged into your app or we are unable to tell.
           //document.getElementById('status').innerHTML = 'Please log ' +
           //  'into this app.';
        }
    }
   
    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1853257284924341',
            cookie     : true,  // enable cookies to allow the server to access 
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.8' // use graph api version 2.8
        });
    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.
    
    // button acction 으로 처리 함 페이지 열리지 마자 하지 말자
    //FB.getLoginStatus(function(response) {
    //  statusChangeCallback(response);
    //});
    };

    //FB.logout(function(response){
    //
    //});
    
    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ko_KR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk')); 

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    //
    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me/accounts', function(response) {
            
            //console.log( response.data[0].name);
            console.log( response);
            test(response.data);
            //console.log('Successful login for: ' + response.name);
            //document.getElementById('status').innerHTML =
            'Thanks for logging in , ' + response.name + '!' ;
        });

    }
</script>



<script>
  $(function(){
    $('#bSend').click(function(){
        $.post(
          "<?=HOSTURL?>/UnoteAdmin/RpcIbSpellCheck/"+$('#sStr').val()
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
