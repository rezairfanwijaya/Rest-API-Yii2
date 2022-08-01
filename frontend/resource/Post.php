<?php 

namespace frontend\resource;


class Post extends \common\models\Post
{
    // bikin function yang akan mereturn filed dari response endpoint (sebagai default)
    public function fields()
    {
        return ['id', 'title', 'body'];
    }

    // selain bisa memilih atribut apa yang akan ditampilakan (menjadi response) pada suatu endpoint dengan membuat function fields kita juga bisa menampilakn filed pilihan atau optional yang mungkin saja kita tidak mau menampilkan atau mungkin mau menampilkan
    // atribut ini harus disimpan di function extraFileds
    // maka pada endpoint akan menjadi seperti ini
    // http://yii2-blog-api.test/post?expand=namafield
    // http://yii2-blog-api.test/post?expand=created_at
    // http://yii2-blog-api.test/post?expand=created_at,created_by
    public function extraFields()
    {
        return ['created_by', 'created_at', 'updated_at', 'comments'];
    }

    
    // karena post ini memiliki relasi ke comment, dan comment akan ditampilkan di post maka kita harus override function getComment pada file common/models/post
     /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CommentQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}


?>