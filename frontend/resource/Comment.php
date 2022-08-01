<?php 
namespace frontend\resource;

class Comment extends \common\models\Comment
{
    // kita tetapkan field default apa yang akan ditampilkan
    public function fields()
    {
        return ['id', 'title', 'body', 'post_id', 'created_at'];
    }
}

?>