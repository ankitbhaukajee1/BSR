<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Branches;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branches',['class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [

            [
              'attribute'=>'company_id',
              'value'=>'company.company_name'
            ],

            'branch_name',
            'branch_address',
            'branch_created_date',
            // 'branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php
    Modal::begin([
        'header'=>'<h1>Branches</h1>',
        'id'=>'modal',
        'size'=>'modal-sm-1',
    ]);

    $model=new Branches();

    echo $this->render('/branches/create', ['model' => $model]);
    Modal::end();

    ?>

</div>
