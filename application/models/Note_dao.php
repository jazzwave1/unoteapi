<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Note_dao extends Common_dao
{
    public function __construct()
    {
        $this->db = $this->load->database('dev_aws', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoNote = $aQueryInfo['note'];
        $this->queryInfoAccount = $aQueryInfo['account'];
    }

    public function getNoteInfoByNidx($aParam=array())
    {
        $aConfig = $this->queryInfoNote['getNoteInfoByNidx'];
        return $this->actModelFuc($aConfig, $aParam);
    }
    
    public function getNoteInfo($aParam=array())
    {
        $aConfig = $this->queryInfoNote['getNoteInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function getNoteDisplayInfo($aParam=array())
    {
        $aConfig = $this->queryInfoNote['getNoteDisplayInfo'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function insertNote($aParam=array())
    {
        $rType = 'object';
        $rPK = true;

        $aConfig = $this->queryInfoNote['insertNote'];
        return $this->actModelFuc($aConfig, $aParam, $rType, $rPK);
    }
    public function insertNoteSentence($pk, $nPageNum, $sContent)
    {
        $aInput = array(
             'n_idx'    => $pk 
            ,'s_idx'    => $nPageNum
            ,'contents' => $sContent
        );
        $aConfig = $this->queryInfoNote['insertNoteSentence'];
        return $this->actModelFuc($aConfig, $aInput);
    }
    public function deleteNoteSentence($n_idx)
    {
        $aInput = array( 'n_idx' => $n_idx );
        $aConfig = $this->queryInfoNote['deleteNoteSentence'];
        return $this->actModelFuc($aConfig, $aInput);
    }
    public function updateNote($aParam=array())
    {
        $aConfig = $this->queryInfoNote['updateNote'];
        return $this->actModelFuc($aConfig, $aParam);
    }

    public function deleteNote($aParam=array())
    {
        $aConfig = $this->queryInfoNote['deleteNote'];
        return $this->actModelFuc($aConfig, $aParam);
    }
}
