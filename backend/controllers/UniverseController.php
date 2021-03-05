<?php
namespace backend\controllers;

use backend\service\StoryService;
use backend\service\UserService;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class UniverseController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','home'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $post = Yii::$app->request->post();
        $name = $post['uname'];
        $pwd = $post['pwd'];
        $userService = new UserService();
        $userInfo = $userService->getUser($name);
        if ($userInfo['pwd'] == $pwd){
            $session = Yii::$app->session;
            $session->set('user',$name);
            return $this->renderPartial('/universe/home');
        }else{
            $data = ['code'=>1001,'message'=>'账号或密码错误！'];
            echo json_encode($data);
        }


//	$posts = Yii::$app->db->createCommand('SELECT * FROM user WHERE id=1;')->queryOne();
//	return;
    }

    public function actionHome(){
        return $this->renderPartial('/universe/home');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->destroy();

        return $this->goHome();
    }
    public function actionSayToOne(){
        $session = Yii::$app->session;
        if (!isset($session['user'])){
            return $this->renderPartial('/universe/home');
        }
        $msg = Yii::$app->request->post('msg');
        $name = $session['name'];
        $userService = new UserService();
        $other = $userService->getOrther($name);
        $userService->say($name,$other,$msg);
        return $this->renderAjax();
    }
    public function actionStoryAdd(){
        $session = Yii::$app->session;
        if (!isset($session['user'])){
            return $this->renderPartial('/universe/home');
        }
        $msg = Yii::$app->request->post('msg');
        $storyService = new StoryService();
        $storyService->add($msg);
        return $this->renderAjax();
    }

    public function actionStory(){
        $session = Yii::$app->session;
        if (!isset($session['user'])){
            return $this->renderPartial('/universe/home');
        }
        return $this->renderPartial('universe/story');
    }

    public function actionStoryTable(){
        echo json_encode([['time'=>'2020','msg'=>'test msg']]);
    }
    public function actionTalkList(){
        $session = Yii::$app->session;
        if (!isset($session['user'])){
            return $this->renderPartial('/universe/home');
        }
        return $this->renderAjax();
    }
}
