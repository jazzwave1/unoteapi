<?php 
	$data = array(
		'class' => $this->uri->segment(1)
	);

	$this->load->view('common/header', $data);
?>

<?php
	if( !in_array($data['class'], array('login')) )
	{
		$this->load->view('common/nav');
	}
?>

<?php $this->load->view($contents); ?>

<?php $this->load->view('common/footer'); ?>