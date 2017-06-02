<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addon extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * ibricks 통신용 API
     */
    
    // 맞춤법 검사 API
    public function ibSpellCheck($sStr = '', $sType = 'in')
    {
        // test code
        // dumy data
        $sStr='안되요';

        $aSpellRes = $this->_getSpellCheck($sStr, $sType);

        $data = array();
        $data['input'] = $sStr;
        $data['output'] = $aSpellRes;

        return response_json($data);
    }

    // 윤문 추천 API
    public function ibBeautifySentence($sStr = '')
    {
        // test code
        // dumy data
        $sStr='우산을 쓰다.';

        $aBeauifyRes = $this->_getBeautifySentence($sStr);

        $data = array();
        $data['input'] = $sStr;
        $data['output'] = $aBeauifyRes;

        return response_json($data);
    }

    private function _getSpellCheck($sStr, $sType)
    {
        $aSpellRes = array();
        $aSpellRes[] = (object) array(
            'candidate' => "'안 돼요' 와 '안 되요'",
            'desc' => "'안되다'의 어간 '안되-' 뒤에 어미 '-어'가 붙은 '안되어'가 줄면, '안돼'의 형태가 됩니다. 따라서 '무엇이 안돼요.'와 같이 적습니다."
            );

        return $aSpellRes;
    }
    private function _getBeautifySentence($in)
    {
        // test code
        // dumy data
        $aBeauifyRes = array(
                "우산을 받치다."
                ,"우산을 접다."
                ,"우산을 펴다."
                ,"우산이 뒤집히다."
                ,"우산이 펼쳐지다."
            );

        return $aBeauifyRes;
    }

}
