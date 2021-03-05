<?php
namespace backend\service;
use backend\models;

class StoryService{
    public $model = null;

    /**
     * @return null
     */
    public function getModel()
    {
        if ($this->model == null){
            return new models\StoryModel();
        }
        return $this->model;
    }

    public function add($msg){
        $storyModel = $this->getModel();
        return $storyModel->add($msg);
    }
}