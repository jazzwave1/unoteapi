<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sentencecheck extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // test code
        // dumy data
        $in='우산을 쓰다.';

        $aSentenceCheckInfo = $this->_getSentenceCheck($in);

        $data = array();
        $data['in'] = $in;
        $data['sentenceinfo'] = $aSentenceCheckInfo;

        // test code
        echo "<!--";
        print_r($data);
        echo "-->";

        // $this->load->view('mytext/list', $data);
    }

    private function _getSentenceCheck($in)
    {
        $aSentenceCheckInfo = array();
        $aSentenceCheckInfo[] = (object) array(
            'candidate' => "우산을 받치다."
            );
        $aSentenceCheckInfo[] = (object) array(
            'candidate' => "우산을 접다."
            );
        $aSentenceCheckInfo[] = (object) array(
            'candidate' => "우산을 펴다."
            );
        $aSentenceCheckInfo[] = (object) array(
            'candidate' => "우산이 뒤집히다."
            );
        $aSentenceCheckInfo[] = (object) array(
            'candidate' => "우산이 펼쳐지다."
            );

        return $aSentenceCheckInfo;
    }

}
