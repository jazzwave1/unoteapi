<?php 
	$this->load->view('common/header');
?>

<?php
	if( !in_array($this->uri->segment(1), array('login')) )
	{
		$this->load->view('common/gnb');
		$this->load->view('common/lnb');
	}
?>

<?php $this->load->view($contents); ?>

<?php $this->load->view('common/footer'); ?>