<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Common_dao.php');

class Note_dao extends Common_dao
{
    public function __construct()
    {
        $this->load->database('default', TRUE);
        $aQueryInfo = edu_get_config('query', 'query');
        $this->queryInfoNote = $aQueryInfo['note'];
        $this->queryInfoAccount = $aQueryInfo['account'];
    }

    public function getAccountInfo($aParam=array())
    {
        $aConfig = $this->queryInfoAccount['getAccountInfo'];
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
        $aConfig = $this->queryInfoNote['insertNote'];
        return $this->actModelFuc($aConfig, $aParam);
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