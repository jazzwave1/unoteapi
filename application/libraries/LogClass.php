<?php  

define ("DEBUG" , false);
define ("LOGFILE" , APPPATH.'logs/unoteapi_log.php');

class LogClass
{
    public function __construct()
    {
        $this->timestamp = date('Y-m-d H:i:s');
    }
    
    public function setDebugLog($aLogInfo, $type="tail")
    {
        if(!DEBUG) return false;

        switch($type)
        {
            case "tail" :
            default :
                $this->_setTailLog($aLogInfo);
                break;
        }

        return;
    }

    private function _setTailLog($aLogInfo)
    {
        $sDebugFile = APPPATH.'logs/debug.php';
        $fp = $this->logOpen($sDebugFile); 

        fwrite($fp, "\n########################################################################\n");
        fwrite($fp, "debug time : ");
        fwrite($fp, print_r(date("Y-m-d H:i:s"), true));
        fwrite($fp, "\n");
        fwrite($fp, print_r($aLogInfo, true));
        fwrite($fp, "\n########################################################################\n");

        return; 
    }

    public function log($message)
    {
        if(file_exists($this->logFilePath))
        {
            return false;
        }

        $logFile = $this->logOpen();

        $this->_logWrite($logFile, $message);
        return;
    }

    public function logOpen($logFilePath='')
    {
        if(!$logFilePath) $logFilePath = LOGFILE;
        return fopen($logFilePath, 'a');
    }

    private function _logWrite($logFile, $message)
    {
        fwrite($logFile, "[" .$timestamp. "] " .$message. "\n");
        return;
    }
    
    
}
