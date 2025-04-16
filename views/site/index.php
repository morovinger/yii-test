<?php

/** @var yii\web\View $this */
/** @var app\models\Note[] $notes */

use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (Yii::$app->user->isGuest): ?>
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Welcome!</h1>
        <p class="lead">Sign up or log in to access your notes.</p>
        <p>
            <?= Html::a('Login', ['/site/login'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a('Signup', ['/site/signup'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>
    <?php else: ?>
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Welcome, <?= Html::encode(Yii::$app->user->identity->username) ?>!</h1>
        <p class="lead">Here are your notes:</p>
        <p>
            <?= Html::a('Create New Note', ['/note/create'], ['class' => 'btn btn-lg btn-success']) ?>
            <?= Html::a('View All Notes', ['/note/index'], ['class' => 'btn btn-lg btn-primary']) ?>
        </p>
    </div>

    <?php if (!empty($notes)): ?>
    <div class="body-content">
        <div class="row">
            <?php foreach ($notes as $note): ?>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5><?= Html::encode($note->title) ?></h5>
                    </div>
                    <div class="card-body">
                        <p><?= Html::encode(StringHelper::truncateWords($note->text, 20)) ?></p>
                        <div class="text-muted small">
                            Created: <?= Yii::$app->formatter->asDatetime($note->created_at) ?>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <?= Html::a('View', ['/note/view', 'id' => $note->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                        <?= Html::a('Edit', ['/note/update', 'id' => $note->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-info text-center">
        <p>You don't have any notes yet. <?= Html::a('Create your first note', ['/note/create']) ?>!</p>
    </div>
    <?php endif; ?>

    <?php endif; ?>
</div>
