<?php 

namespace frontend\controllers;


use frontend\resource\Post;
use yii\rest\ActiveController;

class PostController extends ActiveController {

    // controller post ini akan menggunakan model post
    public $modelClass = Post::class;

}

?>