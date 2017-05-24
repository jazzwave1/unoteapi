<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');ㅊ

class FileClass
{
    public function __construct()
    {
    }

    public function getFile($fileName)
    {
        //header

        $filePath = _getFilePath($fileName);

        if($fp = fopen($filePath, "r"))
        {
        }
        fclose($fp);
    }

    public function saveFile($fileName)
    {
        $config = $this->_setFileUploadConfig();

        if(!is_dir($config['upload_path']))
        {
            mkdir($config['upload_path'], 0755, true);
        }

        if(!$this->upload->do_upload($fileName))
        {
            echo 'Error upload';
            die();
        }
        else
        {
            echo 'Success upload';
            die();
        }
    }

    private function _setFileUploadConfig()
    {
        $aConfig['upload_path'] = $this->filePath;

        return $aConfig;
    }

    public function deleteFile($fileName)
    {
        $filePath = _getFilePath($fileName);

        if(!file_exists($filePath))
        {
            return false;
        }

        if (!unlink($filePath))
        {
            echo "Error delete";
            die();
        }
        else
        {
            echo "Seccess delete";
            die();
        }
    }

    private function _getFilePath($fileName)
    {
        $filePath = 'document/file/'.$fileName;

        return $filePath;
    }

}