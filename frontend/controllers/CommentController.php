<?php 
namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\resource\Comment;

class CommentController extends ActiveController 
{
    // comment controller akan menggunakan model comment yang ada pada file frontend/resource/Comment/php
    public $modelClass = Comment::class;
}


?>