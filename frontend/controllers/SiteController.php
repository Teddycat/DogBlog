<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\EntryForm;
use frontend\models\Dogarticles;


/**
 * Site controller
 */
class SiteController extends Controller
{

    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $articles = new Dogarticles();
        $collection = self::actionForeacher($articles->getAll());
        $model = new EntryForm();
        return $this->render('index', ['model' => $model, 'articles' => $collection]);
    }

    public function actionArticle($id)
    {
        $articles = new Dogarticles();
        $article = $articles->getOne($id);
        $model = new EntryForm();
        return $this->render('article', ['model' => $model, 'article' => $article, 'articleID' => $id]);
    }

    public function actionAddarticle()
    {
        $form = new EntryForm();
        $form->newArticle(Yii::$app->request->post('EntryForm'));
        Yii::$app->response->redirect($_SERVER['HTTP_REFERER']);
    }

    public function actionAddcomment()
    {
        $form = new EntryForm();
        $form->newComment(Yii::$app->request->post('EntryForm'));
        Yii::$app->response->redirect($_SERVER['HTTP_REFERER']);
    }

    public function actionForeacher($arr)
    {
        $count = 0;
        foreach ($arr as $value => $item) {
            $arr[$count]["da_text"] = self::actionDoShortText($item["da_head"], $item["da_text"], 240);
            $count++;
        }
        return $arr;
    }

    public function actionDoShortText($text1, $text2, $number)
    {
        $text = $text1 . $text2;
        if ($text2) {
            if (strlen($text) > $number) {
                $a = $number - strlen($text1);
                $text2 = mb_substr($text2, 0, $a, 'UTF-8'); //140 это кол. знаков
                $str_count = substr_count($text2, " "); // возвращает количество пробелов
                $texto = explode(" ", $text2); //количество слов
                $texter = ' ';
                for ($i = 0; $i < $str_count; $i++) {
                    $texter .= $texto[$i] . ' ';
                }
                $texter .= "...";
                return $texter;
            }
        } else {
            if (strlen($text1) > $number) {
                $text2 = mb_substr($text1, 0, $number, 'UTF-8'); //140 это кол. знаков
                $str_count = substr_count($text2, " "); // возвращает количество пробелов
                $texto = explode(" ", $text2); //количество слов
                $texter = ' ';
                for ($i = 0; $i < $str_count; $i++) {
                    $texter .= $texto[$i] . ' ';
                }
                $texter .= "...";
                return $texter;
            }

        }
    }
}
