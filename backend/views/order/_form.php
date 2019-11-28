<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

$sessionActive = Yii::$app->session;


/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
/** @var \app\models\User $users_id */
/** @var \app\models\Date $dates_id */
/** @var \app\models\Session $sessions */
/** @var \app\models\Ticket $tickets */
/** @var \app\models\Film $films */
?>

<div class="order-form">
    <?php Pjax::begin(); ?>
    <?php
    $user_id = ArrayHelper::map($users_id, 'id', 'username');
    $params_user_id = [
        'prompt' => 'Username',
    ];


    $film_id = ArrayHelper::map($films, 'id', 'title');
    $params_film_id = [
        'prompt' => 'Film',
        'onchange' => '
                $.post("index.php?r=order/lists_date&id=' . '"+$(this).val(), function(data){
                    $("select#order-date_id").html(data);
                });',
    ];

    $date_id = ArrayHelper::map($dates_id, 'id', 'date_session');
    $params_date_id = [
        'prompt' => 'Date session',
        'onchange' => '
                $.post("index.php?r=order/lists_session&id=' . '"+$(this).val(), function(data){
                    $("select#order-session_id").html(data);
                });',
    ];

    $session_id = ArrayHelper::map($sessions, 'id', 'time');
    $params_session_id = [
        'prompt' => 'Session',
        'onchange' => '
                $.post("index.php?r=order/lists_ticket&id=' . '"+$(this).val(), function(data){
                    $("select#order-ticket_id").html(data);
                });',
    ];

    $ticket_id = ArrayHelper::map($tickets, 'id', 'id');
    $params_ticket_id = [
        'prompt' => 'Ticket',
    ];
    ?>


    <?php $form = ActiveForm::begin([
        'id' => 'get_order'
    ]); ?>

    <?= $form->field($model, 'user_id')->dropDownList($user_id, $params_user_id) ?>

    <?= $form->field($model, 'film')->dropDownList($film_id, $params_film_id) ?>

    <?= $form->field($model, 'date_id')->dropDownList($date_id, $params_date_id) ?>

    <?= $form->field($model, 'session_id')->dropDownList($session_id, $params_session_id) ?>

    <?= $form->field($model, 'ticket_id')->dropDownList($ticket_id, $params_ticket_id) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <div class="col-md-8">


    </div>
    <?php ActiveForm::end(); ?>



    <?= Html::a('Cancel', ['/order/create'], [
        'class' => 'btn btn-md btn-warning',
        'data' => [
            'method' => 'post',
            'params' => [
                'cancel_id' => 'cancel',
            ],]
    ]);
    if (Yii::$app->request->post('cancel_id')) {
        echo 'good';
    }
    ?>
    <!--<div id="order-ticket_id">-->
    <!--    <pre>-->
    <!--    --><?php
    //        print_r( $sessionActive['test_place']);
    //    ?>
    <!--    </pre>-->
    <!--</div>-->

    <?php Pjax::end(); ?>
</div>
