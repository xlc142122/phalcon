<?php
/**
 * 引导文件
 * Created by PhpStorm.
 * User: pasenger
 * Date: 15/7/29
 * Time: 下午9:28
 */

use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\Application;
use Phalcon\Exception;
use Phalcon\Db\Adapter\Pdo\Mysql as DBAdapter;

try{

    //register an autoloader
    $loader = new Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //create a di
    $di = new FactoryDefault();

    //setup the database service
    $di->set('db', function(){
        return new DBAdapter(array(
            "host"       =>  "127.0.0.1",
            "port"      =>  3307,
            "username"   =>  "root",
            "password"   =>  "123456",
            "dbname"     =>  "phalcon"
        ));
    });

    //setup a view compent
    $di->set('view', function(){
        $view = new View();
        $view->setViewsDir('../app/views/');

        return $view;
    });

    //setup a base uri
    $di->set('url', function(){
        $url = new Url();
        $url->setBaseUri('/');

        return $url;
    });

    //handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();
}catch (Exception $e){
    echo "PhalconException: ", $e->getMessage();
}

