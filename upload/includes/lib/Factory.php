<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/26 0026
 * Time: 17:01
 */
class Factory
{
    private static $logger = [];     //日志对象

    /**
     * 获取日志打印对象
     * @param $name
     * @return Logger
     */
    public static function logger($name)
    {
        if (!empty(self::$logger[$name])) {
            return self::$logger[$name];
        } else {
            $log = new Logger($name);
            self::$logger[$name] = $log->pushHandler(new StreamHandler(ROOT_PATH . '/log/'.$name.'.log'));
            return self::$logger[$name];
        }
    }
}