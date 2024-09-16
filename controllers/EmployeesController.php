<?php

namespace app\controllers;

class EmployeesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
