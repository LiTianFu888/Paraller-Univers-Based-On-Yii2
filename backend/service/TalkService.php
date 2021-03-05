<?php
namespace backend\service;
use backend\models;

class TalkService{
    public $model = null;

    /**
     * @return null
     */
    public function getModel()
    {
        if ($this->model == null){
            return new models\TalkModel();
        }
        return $this->model;
    }

    public function say($from,$to,$msg){
        $talkModel = $this->getModel();
        return $talkModel->say($from,$to,$msg);
    }
}