<?php
namespace Spexial\Iwunan;
class Regex
{
    /**
     * 判断输入的网站格式是否正确
     * @param $web
     * @return bool|string
     */
    public function inputUrl($web)
    {
        if(preg_match('/(http:\/\/|https:\/\/)+www.[0-9a-zA-Z]+_?[0-9a-zA-Z]+.[0-9a-zA-Z]{2,}$/',$web)) {
            return  $web;
        }elseif(preg_match('/^www.[0-9a-zA-Z]+_?[0-9a-zA-Z]+.[0-9a-zA-Z]{2,}$/',$web)){
            return 'http://'.$web;
        }elseif(preg_match('/[0-9a-zA-Z]+_?[0-9a-zA-Z]+.[0-9a-zA-Z]{2,}$/',$web)){
            return 'http://www.'.$web;
        }else{
            return false;
        }
    }
}