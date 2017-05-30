<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spellcheck extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // test code
        // dumy data
        $in='안되요';

        $aSpellCheckInfo = $this->_getSpellCheck($in);

        $data = array();
        $data['in'] = $in;
        $data['spellinfo'] = $aSpellCheckInfo;

        // test code
        echo "<!--";
        print_r($data);
        echo "-->";

        return response_json($data);

        // $this->load->view('mytext/list', $data);
    }

    private function _getSpellCheck($in)
    {
        $aSpellCheckInfo = array();
        $aSpellCheckInfo[] = (object) array(
            'candidate' => "'안 돼요' 와 '안 되요'",
            'desc' => "'안되다'의 어간 '안되-' 뒤에 어미 '-어'가 붙은 '안되어'가 줄면, '안돼'의 형태가 됩니다. 따라서 '무엇이 안돼요.'와 같이 적습니다."
            );

        return $aSpellCheckInfo;
    }

}
