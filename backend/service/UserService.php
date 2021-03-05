<?php
namespace backend\service;
use backend\models;

class UserService{
    public $model = null;

    /**
     * @return null
     */
    public function getModel()
    {
        if ($this->model == null){
            return new models\UserModel();
        }
        return $this->model;
    }

    public function getUser($name){
        $userModel = $this->getModel();
        return $userModel->getUserInfo($name);
    }

    public function getOrther($name){
        $userModel = $this->getModel();
        return $userModel->getTheOrther($name);
    }

    public function say($from,$to,$msg){
        $userModel = $this->getModel();
        return $userModel->say($from,$to,$msg);
    }
}