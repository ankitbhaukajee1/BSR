<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Companies',['class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [



            'company_name',
            'company_email:email',
            'company_address',
            'company_created_date',
            'company_start_date',
            // 'compa


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php
    Modal::begin([
        'header'=>'<h1>Companies</h1>',
        'id'=>'modal',
        'size'=>'modal-sm-1',
    ]);

    $model=new \backend\models\Companies();

    echo $this->render('/companies/create', ['model' => $model,'branch'=>$branch,]);
    Modal::end();

    ?>

</div>
