<?php 
namespace frontend\resource;

class Comment extends \common\models\Comment
{
    // kita tetapkan field default apa yang akan ditampilkan
    public function fields()
    {
        return ['id', 'title', 'body', 'post_id', 'created_at'];
    }

    // kita tambahkan filed optional untuk response comment
    // sehingga endpoint nya menjadi http://yii2-blog-api.test/comments?expand=nama_field
    // sehingga endpoint nya menjadi http://yii2-blog-api.test/comments?expand=created_by
    // sehingga endpoint nya menjadi http://yii2-blog-api.test/comments?expand=post
    public function extraFields()
    {
        return ['created_by', 'post'];
    }

    // hasil dari endpoint ini http://yii2-blog-api.test/comments?expand=post adalah 
    // {
    //     "id": 1,
    //     "title": "Update comment",
    //     "body": "update comment body",
    //     "post_id": 1,
    //     "created_at": null,
    //     "created_by": null,
    //     "post": {
    //         "id": 1,
    //         "title": "title pertama",
    //         "body": "body pertama",
    //         "created_at": null,
    //         "updated_at": null,
    //         "created_by": null
    //     }
    // },

    // bagaimana jika kita tidak ingin menampilkan semua info dari post, kita bisa mengoveride method get post dari file common/models/Comment.php
    // sehingga post ini akan mengikuti method field pada file frontend/resource/Post.php
    // cara ini sama seperti yang kita pakai pada file frontend/resource/Comment.php

        /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    
}

?>