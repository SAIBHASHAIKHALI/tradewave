<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUsers */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $users app\models\User[] */

$this->title = 'User Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        User Information
                    </div>
                    <div class="card-body">
                        <!-- Display user's profile picture -->
                        <div class="profile-picture text-center mb-3">
                            <?= Html::img('@web/uploads/' . Yii::$app->user->identity->image, ['class' => 'img-thumbnail', 'alt' => 'Profile Picture']) ?>
                        </div>
                        <p><strong>Username:</strong> <?= Html::encode(Yii::$app->user->identity->username) ?></p>
                        <p><strong>Full Name:</strong> <?= Html::encode(Yii::$app->user->identity->fullname) ?></p>
                        <p><strong>Email:</strong> <?= Html::encode(Yii::$app->user->identity->email) ?></p>
                        <!-- Add more user information as needed -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Recent Posts
                    </div>
                    <div class="card-body">
                        <!-- Display user's recent posts -->
                        <?php if (!empty($users)) : ?>
                            <?php foreach ($users as $user) : ?>
                                <div class="post">
                                    <h5><?= Html::encode($user->post_title) ?></h5>
                                    <p><?= Html::encode($user->post_content) ?></p>
                                    <!-- Add more post details as needed -->
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No posts found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
