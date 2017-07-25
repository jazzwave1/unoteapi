<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FileClass
{
    public function __construct()
    {
        $this->sFilePath = "/Users/hojunlee/Sites/unoteapi/static/uploadfile/";
        $this->sLink = HOSTURL."/static/uploadfile/";
    }

    public function getFileLink($usn, $fileName)
    {
        if(!$usn || !$fileName) return false;

        return $this->sLink.$usn."/".$fileName;     
    }
    public function saveFile($usn, $aFile)
    {
        $config['upload_path']   = $this->sFilePath.$usn."/";
        $config['allowed_types'] = 'GIF|JPG|PNG|gif|jpg|png';
        $config['max_size']      = '1000';
//       $config['max_width']     = '1024';
//       $config['max_height']    = '768';

        $_FILES = $aFile;

        $CI = & get_instance();
        $CI->load->library('upload', $config); 

        if(!is_dir($config['upload_path']))
        {
            mkdir($config['upload_path'], 0755, true);
        }

        if(!$CI->upload->do_upload())
        {
            // error
            response_json(array('code'=>999, 'msg'=>'Fail'));
        }
        else
        {
            $sURL = $this->getFileLink($usn, $aFile['userfile']['name']);
            response_json(array('code'=>1, 'msg'=>'OK', 'sURL'=>$sURL));
        }
        die; 
    }
    public function deleteFile($usn, $fileName)
    {
        $filePath = $this->sFilePath.$usn."/".$fileName;
        
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

}
