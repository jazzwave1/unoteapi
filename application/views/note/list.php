<?php
	$this->load->view('common/sub_timeline');

	$this->load->view('common/textviewer');
?>
<script type="text/javascript">
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
			        $('.p-date').text(data.aNoteDetail['regdate']);
			        $('.p-tit').text(data.aNoteDetail['title']);
			        $('.p-inner').html(data.aNoteDetail['text']);

			        // console.log(data.aNoteDetail); 
			    }
			  }
			);   
		});

	});
</script>