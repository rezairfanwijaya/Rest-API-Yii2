<?php 

namespace frontend\controllers;

use common\models\Post;
use yii\rest\ActiveController;

class PostController extends ActiveController {

    // controller post ini akan menggunakan model post
    public $modelClass = Post::class;

    public function actionCreate()
    {
        $model = new Post();
    }

}

?>