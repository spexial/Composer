<?php
namespace Spexial\Iwunan;
class Image
{

    /**
     * 压缩图片
     * @param $file
     * @param $newPath
     * @param $newWidth
     * @param $newHeight
     * @return mixed
     */
    function compress($file,$newPath,$newWidth,$newHeight)
    {
        $type= strrchr($file,'.'); //获取图片扩展名
        switch($type)
        {
            case 'png' :
                header('Content-Type:image/png');
                $image = imagecreatefrompng($file);
                $width = imagesx($image);
                $height = imagesy($image);
                if(( $width  > $newWidth) || ($height > $newHeight)) { //判断上传图片的像素与想压缩的像素大小
                    $widthratio = $newWidth / $width;
                    $heightratio = $newHeight / $height;

                    if ($widthratio < $heightratio) {
                        $ratio = $widthratio;
                    } else {
                        $ratio = $heightratio;
                    }
                    $newWidth = $width * $ratio;
                    $newHeight = $height * $ratio;
                    $img = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($img, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    imagepng($img, $newPath, 75);
                    imagedestroy($img);
                }
                else
                {
                    $img = imagecreatetruecolor($newWidth,$newHeight);
                    imagepng($img,$newPath,75);
                }
                break;
            case 'jpeg':
            case 'jpg' :
                header("Content-type: image/jpeg");
                $image = imagecreatefromjpeg($file);
                $width = imagesx($image);
                $height = imagesy($image);
                if(( $width  > $newWidth) || ($height > $newHeight)) { //判断上传图片的像素与想压缩的像素大小
                    $widthratio = $newWidth / $width;
                    $heightratio = $newHeight / $height;

                    if ($widthratio < $heightratio) {
                        $ratio = $widthratio;
                    } else {
                        $ratio = $heightratio;
                    }
                    $newWidth = $width * $ratio;
                    $newHeight = $height * $ratio;
                    $img = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($img, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    imagejpeg($img, $newPath, 75);
                    imagedestroy($img);
                }
                else{
                    $img = imagecreatetruecolor($newWidth,$newHeight);
                    imagejpeg($img,$newPath,75);
                }
                break;
            default :
                header("Content-type: image/jpeg");
                $image = imagecreatefromjpeg($file);
                $width = imagesx($image);
                $height = imagesy($image);
                if(( $width  > $newWidth) || ($height > $newHeight)) { //判断上传图片的像素与想压缩的像素大小
                    $widthratio = $newWidth / $width;
                    $heightratio = $newHeight / $height;

                    if ($widthratio < $heightratio) {
                        $ratio = $widthratio;
                    } else {
                        $ratio = $heightratio;
                    }
                    $newWidth = $width * $ratio;
                    $newHeight = $height * $ratio;
                    $img = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($img, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    imagejpeg($img, $newPath, 75);
                    imagedestroy($img);
                }
                else{
                    $img = imagecreatetruecolor($newWidth,$newHeight);
                    imagejpeg($img,$newPath,75);
                }
        }
        unlink($file);//如果原文件的地址和新地址一致，不用次步骤
        return $file;
    }
}