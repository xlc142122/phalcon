<?php

/**
 * Created by PhpStorm.
 * User: pasenger
 * Date: 15/7/29
 * Time: 下午10:10
 */

use Phalcon\Mvc\Model;

class Users extends Model
{
    public function getSource()
    {
        return "users";
    }
}