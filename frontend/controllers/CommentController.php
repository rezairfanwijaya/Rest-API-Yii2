<?php 
namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Comment;
use Yii;
use yii\data\ActiveDataProvider;

class CommentController extends ActiveController 
{
    // comment controller akan menggunakan model comment yang ada pada file frontend/resource/Comment/php
    public $modelClass = Comment::class;

    // tentu saja untuk menjadikan endpoint menjadi rapih, untuk contoh pada endpoint show post, kita ingin ketika kita hit endpoint tersebut maka akan muncul comment yang related terhadap post tersebut
    /*contoh endpoint : http://yii2-blog-api.test/post/4/comment
    untuk meng-cutom endpoint tersebut bisa dilakukan di file frontend\config\main.php
     contoh response : 
        {
            "id": 4,
            "title": "Update comment",
            "body": "update comment body",
            "post_id": 1,
            "created_at": null,
            "comment" : [
                {
                    "id":1,
                    "title:"Ini komentar saya",
                    "body":"saya sering berkomentar",
                    "post_id":4
                }
            ]
        }
    */

    // so, untuk mendapatkan seperti itu kita harus meng-custom route nya
    // step pertama kita harus mengoveride function action
    public function actions()
    {
        $action = parent::actions();
        // lalu kita harus mereplace action index preapreDataProvider dengan this preapreDataProvider
        $action['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $action;
    }

    // lalu bikin function prepareDataProvider yang mana disini kita akan melakukan query
    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            // ini adalah query untuk mengambil comment berdasarkan params postId
            'query' =>  $this->modelClass::find()->andWhere(['post_id' => Yii::$app->request->get('postId')])
        ]);
    }
}


?>