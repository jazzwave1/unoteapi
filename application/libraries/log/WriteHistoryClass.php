<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/log/LogClass.php');

class WriteHistoryClass extends LogClass
{
    public function __construct()
    {
        $this->note_model = edu_get_instance('note_model', 'model');
    }

    public function setCallLog()
    {
        echo "set Api Call Log ";
        die;
    }
    public function setWriteHistory($usn, $n_idx)
    {
        // test code
        // $usn = 1; 
        // $n_idx = 16;

        if(!$usn || $n_idx) false;
        
        $ver = $this->getVerNumber($usn, $n_idx);
        return $this->note_model->setWriteHistory($usn, $n_idx, $ver); 
    }
    public function getVerNumber($usn, $n_idx)
    {
        if(!$usn || $n_idx) false;

        return $this->note_model->getVerNumber($usn, $n_idx);
    }
}
