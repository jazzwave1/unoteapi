<!doctype html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>네이버 로그인</title>
  <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
  <!-- 네이버아이디로로그인 버튼 노출 영역 -->
  <div id="naver_id_login"></div>
  <!-- //네이버아이디로로그인 버튼 노출 영역 -->
  <script type="text/javascript">
  	var naver_id_login = new naver_id_login("8NUgN03htU_ua9WBI00b", "http://unote.eduniety.net/unoteapi/naver_test.php");
  	var state = naver_id_login.getUniqState();
  	naver_id_login.setButton("green", 3,40);
  	naver_id_login.setDomain(".eduniety.net");
  	naver_id_login.setState(state);
  	// naver_id_login.setPopup();
  	naver_id_login.init_naver_id_login();

	// 네이버 사용자 프로필 조회
	naver_id_login.get_naver_userprofile("naverSignInCallback()");
	// 네이버 사용자 프로필 조회 이후 프로필 정보를 처리할 callback function
	function naverSignInCallback() {
	// alert(naver_id_login.getProfileData('enc_id'));
	// alert(naver_id_login.getProfileData('email'));
	// alert(naver_id_login.oauthParams.access_token);
		document.getElementById('user_id').value = naver_id_login.getProfileData('id');
		document.getElementById('accessToken').value = naver_id_login.oauthParams.access_token;

		document.fo.submit();
	}

  </script>  

<form name='fo' method='post' action='http://unote.eduniety.net/unoteapi/Login/RpcLogin'>
<input type='text' name='site' id='site' value='naver' >	
<input type='text' name='user_id' id='user_id' >	
<input type='text' name='accessToken' id='accessToken'>	
</form>  
</html>