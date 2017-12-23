<?php
namespace Spexial\Iwunan;
class CleanFile
{
    public function Clean($dir)
    {
	$a = array();
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
                while (($file = readdir($dh))!== false){
                    $filePath = $file;
                    if($filePath!="." && $filePath!="..") {
                        $a [] = $filePath;
                    }
                }
                closedir($dh);
            }
        }
        $db =  new DB();
        $b = $db->table('data')->select('path');
        foreach($a as $key => $value) {
            if(!in_array($value,$b)) {
                unlink($dir.$value);
                echo "数据库不存在".$value."，已删除...<br/>";
            }
        }
        $msg = json_encode(['code'=>1,'msg'=>'success','content'=>'Method completed.']);
        return $msg;
    }
}
