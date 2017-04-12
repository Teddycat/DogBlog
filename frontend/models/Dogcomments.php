<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\db\Query;

class Dogcomments extends ActiveRecord {
    public function getDogarticles()
    {
        return $this->hasOne(Dogarticles::className(), ['da_id' => 'dc_article_id']);
    }
}
