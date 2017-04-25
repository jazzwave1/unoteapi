<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');ㅊ

class LogClass
{
    public function __construct()
    {
        $this->timestamp = date('Y-m-d H:i:s');
    }

    public function log($message)
    {
        if(file_exists($this->logFilePath))
        {
            return false;
        }

        $logFile = $this->_logOpen();

        $this->_logWrite($logFile, $message);
    }

    private function _logOpen()
    {
        fopen($this->logFilePath, 'a');
    }

    private function _logWrite($logFile, $message)
    {
        fwrite($logFile, "[" .$timestamp. "] " .$message. "\n");
    }

}