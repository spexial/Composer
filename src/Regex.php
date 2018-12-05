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
    /**
     * 替换空格
     * @param $name
     * @return mixed
     */
    public function replaceTheSpace($name)
    {
        $result = str_replace('/\ /','',$name);
        return $result;
    }

    /**
     * 大写小写加数字
     * @param string $data
     * @return bool|int
     */
    public function pwd($data = '')
    {
        if (empty($data)) {
            return false;
        }

        return preg_match( '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/', $data);
    }

    /**
     * 校验是否是email
     * @param string $data
     * @return bool|int
     */
    public function email($data = '')
    {
        if (empty($data)) {
            return false;
        }
        return preg_match('#^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$#i', $data);
    }

    /**
     * 校验是否是url
     * @param string $data
     * @return bool|int
     */
    public function url($data = '')
    {
        if (empty($data)) {
            return false;
        }
        return preg_match('#^(http|https)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?#i', $data);
    }
}