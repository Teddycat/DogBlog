<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $head;
    public $text;
    public $name;
    public $article;

    public function rules()
    {
        return [
            [['head', 'text', 'name'], 'required'],

        ];
    }

    public function newArticle($data)
    {
        $newArticle = new Dogarticles();
        $newArticle->da_head = $data['head'];
        $newArticle->da_text = $data['text'];
        $newArticle->da_author = $data['name'];
        return $newArticle->save() ? $newArticle : null;
    }

    public function newComment($data)
    {
        $newComment = new Dogcomments();
        $newComment->dc_author = $data['name'];
        $newComment->dc_text = $data['text'];
        $newComment->dc_article_id = $data['article'];
        return $newComment->save() ? $newComment : null;
    }

}
