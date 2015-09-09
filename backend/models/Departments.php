<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $department_id
 * @property integer $company_id
 * @property integer $branch_id
 * @property string $department_name
 * @property string $department_created_date
 * @property string $department_status
 *
 * @property Companies $company
 * @property Branches $branch
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'branch_id', 'department_name', 'department_created_date', 'department_status'], 'required'],
            [['company_id', 'branch_id'], 'integer'],
            [['department_status'], 'string'],
            [['department_name', 'department_created_date'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'company_id' => 'Company Name',
            'branch_id' => 'Branch Name',
            'department_name' => 'Department Name',
            'department_created_date' => 'Department Created Date',
            'department_status' => 'Department Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'branch_id']);
    }
}
