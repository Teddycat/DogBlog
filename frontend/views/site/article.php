<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">

    <p>Автор: <?= $article['da_author'] ?></p>
    <h2><?= $article['da_head'] ?></h2>
    <p><?= $article['da_text'] ?></p>
    <div>
        <h3>Комментарии:</h3>
    </div>
    <?php foreach ($article->dogcomments as $value => $item): ?>
        <p><strong><?= $item['dc_author'] ?></strong></p>
        <p><?= $item['dc_text'] ?></p>

    <?php endforeach; ?>
</div>
<div>
    <h3>Добавить комментарии:</h3>
</div>
<div class="row">
    <div class="col-lg-5">

        <?php
        $form = ActiveForm::begin([
            'action' => "/entry/comment"
        ])
        ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Имя') ?>

        <?= $form->field($model, 'text')->textarea(['rows' => 2, 'cols' => 5])->label('Текст комментария') ?>
        <?= $form->field($model, 'article')->hiddenInput(['value' => $articleID])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>