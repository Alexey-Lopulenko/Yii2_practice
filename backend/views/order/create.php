<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/** @var \app\models\User $users_id */
/** @var \app\models\Date $dates_id */
/** @var \app\models\Session $sessions */
/** @var \app\models\Ticket $tickets */
/** @var \app\models\Film $films */

$this->title = 'Create Order';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=

    $this->render('_form', [
        'model' => $model,
        'users_id' => $users_id,
        'films' => $films,
        'dates_id' => $dates_id,
        'sessions' => $sessions,
        'tickets' => $tickets,
    ]) ?>



</div>
