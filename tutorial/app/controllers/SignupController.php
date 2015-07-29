<?php
/**
 * Created by PhpStorm.
 * User: pasenger
 * Date: 15/7/29
 * Time: 下午9:47
 */

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {

    }

    public function registerAction()
    {
        $user = new Users();

        //store and check for errors
        $success = $user->save($this->request->getPost(), array('name', 'email'));

        if($success){
            echo 'Thanks for registering!';
        }else{
            echo 'Sorry, the following problems were generated:', '<br />';
            foreach($user->getMessages() as $message){
                echo $message->getMessage(), "<br />";
            }
        }

        $this->view->disable();
    }
}