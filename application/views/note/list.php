<?php
	$this->load->view('common/sub_timeline');

	$this->load->view('common/textviewer');
?>
<script type="text/javascript">

	$(".deleteBtn").on("click", noteDelete);

	function noteDelete()
	{
		var n_idx = $('.p-info').data('n_idx');

		if(confirm('삭제하시겠습니까? 삭제된 노트는 복구가 불가능합니다.'))
		{
			$.post(
			  "<?=HOSTURL?>/Note/deleteNote"
			  ,{
			       "n_idx" : n_idx 
			   }
			  ,function(data, status) {
			    if (status == "success" && data.code == 1)
			    {
			    	alert(data.msg);
			    	window.location.reload();
			        // console.log(data.aNoteDetail); 
			    }
			    // 삭제 실패
			    else if (status == "")
			    {
			    	alert(data.msg);
			    }
			  }
			);
		}
	}

	$(function(){

		$('.sublist-li').on('click', function(event){
            $(this).siblings('li').removeClass('on');
            $(this).addClass('on');
            
			var n_idx = $(this).data( "n_idx" );
			$.post(
			  "<?=HOSTURL?>/Note/rpcGetNoteInfo"
			  ,{
			       "n_idx" : n_idx 
			   }
			  ,function(data, status) {
			    if (status == "success" && data.code == 1)
			    {
			    	$('.p-info').data('n_idx', n_idx);
			        $('.p-date').text(data.aNoteDetail['regdate']);
			        $('.p-tit').text(data.aNoteDetail['title']);
			        $('.p-inner').html(data.aNoteDetail['text']);

			        // console.log(data.aNoteDetail); 
			    }
			  }
			);   
		});

		$

	});
</script>