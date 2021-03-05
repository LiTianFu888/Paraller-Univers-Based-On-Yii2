<?php
namespace backend\models;
use yii\base\Model;
use yii\db\Exception;

class TalkModel extends Model{
    public $table= 'talk';
    public $db = null;

    public function __construct($config = [])
    {
        if ($this->db == null){
            $this->db = \Yii::$app->db;
        };
    }

    public function say($from,$to,$msg){
        try{
            $res = $this->db->createCommand()->insert('talk',[
                'from'=>$from,
                'to'=> $to,
                'msg'=> $msg,
                'create_time' => time(),
            ])->execute();
            return $res;
        }catch (Exception $e){
            return false;
        }
    }
}
