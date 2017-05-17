<?php  

define ("DEBUG" , true);
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

    public function sendMail($to, $subject, $message)
    {
        $aSender = $this->_getMailSenderInfo();
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';

        // Additional headers
        //$headers[] = 'To: '.$to;
        $headers[] = 'From: '.$aSender['from']['name'].'<'.$aSender['from']['mail'].'>';

        $subject = "=?UTF-8?B?".base64_encode($subject)."?="; 
        mail($to, $subject, $message, implode("\r\n", $headers));

    }    
    
    private function _getMailSenderInfo()
    {
        $aInfo = array(
             'from' => array( 'mail'=>'hjlee@eduniety.net', 'name'=>'HoJun Lee')
            ,'cc'   => ''
            ,'bcc'  => ''
        );
        return $aInfo;
    }
}
