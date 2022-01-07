<?php
    function checkFileOrJsonCreate($url,$data=null){
        if(file_exists($url) && $data==null){
            return $url;
        }else if($data!=null){
            $text = '';
            if(is_array($data) || is_object($data)){
                $text = json_encode($data);
            }else{
                $text = json_encode('content:'.$data);
            }
            writeFile($url,$text);
            return $url;
        }
        return false;
    }

    function writeFile($fileUrl,$data,$mode='w'){
        $fp = fopen($fileUrl,$mode);      
        fwrite($fp,$data);
        fclose($fp);
    }

    function createFolder($url){
        if (!file_exists($url)) {
            mkdir($url, 0777, true);
        }
    }
    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    function printResults($reports){
        echo(json_encode($reports));
    }
?>