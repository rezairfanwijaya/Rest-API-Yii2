<?php 

namespace frontend\resource;


class Post extends \common\models\Post
{
    // bikin function yang akan mereturn filed dari response endpoint
    public function fields()
    {
        return ['id', 'title', 'body', 'created_at'];
    }
}


?>