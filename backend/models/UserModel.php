<?php
namespace backend\models;
use yii\base\Model;
use yii\db\Exception;

class UserModel extends Model{
    public $table= 'user';
    public $db = null;

    public function __construct($config = [])
    {
        if ($this->db == null){
            $this->db = \Yii::$app->db;
        };
    }

    public function getUserInfo($name){
        $sql = sprintf('select * from %s where `name` = %s',$this->table,$name);
        try{
            $res = $this->db->createCommand($sql)->queryOne();
            return $res;
        }catch (Exception $e){
            return false;
        }
    }

    public function getTheOrther($name){
        $sql = sprintf('select * from %s where `name` != %s',$this->table,$name);
        try{
            $res = $this->db->createCommand($sql)->queryOne();
            return $res;
        }catch (Exception $e){
            return false;
        }
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
