<?php
namespace backend\models;
use yii\base\Model;
use yii\db\Exception;

class StoryModel extends Model{
    public $table= 'story';
    public $db = null;

    public function __construct($config = [])
    {
        if ($this->db == null){
            $this->db = \Yii::$app->db;
        };
    }

    public function add($msg){
        try{
            $res = $this->db->createCommand()->insert('story',[
                'desc'=> $msg,
                'create_time' => time(),
            ])->execute();
            return $res;
        }catch (Exception $e){
            return false;
        }
    }

    public function getList(){
        $sql = sprintf("select * from %s order by create_time desc",$this->table);
        try{
            $res = $this->db->createCommand($sql)->queryAll();
            return $res;
        }catch (Exception $e){
            return false;
        }
    }
}
