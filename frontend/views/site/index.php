<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-md-8">
        <div class="site-signup">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Добавьте и вы интересную новость о собачках:</p>

            <div class="row">
                <div class="col-lg-5">

                    <?php
                    $form = ActiveForm::begin([
                        'action' => "entry/article"
                    ])
                    ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Имя') ?>

                    <?= $form->field($model, 'head')->textInput()->label('Заголовок') ?>

                    <?= $form->field($model, 'text')->textarea(['rows' => 2, 'cols' => 5])->label('Текст новости') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <?php foreach ($articles as $value => $item): ?>
            <div class="col-md-6">
                Автор: <?= $item['da_author'] ?>
                <div class="wraps">
                    <div class="titler">
                        <a href="/article/<?= $item['da_id'] ?>"><?= $item['da_head'] ?></a>
                    </div>
                    <div class="texter">
                        <a class="linker" href="/article/<?= $item['da_id'] ?>"><?= $item['da_text'] ?></a></div>
                </div>
                <div class="sharing"><span class="sep">12 АПРЕЛЯ 2017, 21:36 </span><span class="sep"><img
                            src="img/comments.png" width="20"> <?= count($item->dogcomments) ?> </span> <span
                        class="sep">SHARE</span></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
