<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\db\Query;

class Dogarticles extends ActiveRecord {

    public function getDogcomments()
    {
        return $this->hasMany(Dogcomments::className(), ['dc_article_id' => 'da_id']);
    }

    public function getAll() {
        return Dogarticles::find()
            ->joinWith('dogcomments')
            ->all();
    }

    public function getOne($id) {
        return Dogarticles::find()
            ->joinWith('dogcomments')
            ->where(['da_id' => $id])
            ->one();
    }

    public function getAjax($start) {

        return (new Query())
            ->select('*')
            ->from('dogarticles')
            ->limit(2)
            ->offset($start)
            ->all();
    }
}
