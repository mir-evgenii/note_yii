<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\NoteForm;
use app\models\Note;

class NoteController extends Controller
{
    public function actionIndex()
    {
        $query = Note::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $notes = $query->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        //$notes = 'My notes!';
        // return $this->render('index', ['notes' => $notes]);
        return $this->render('index', [
            'notes' => $notes,
            'pagination' => $pagination,
        ]);
    }

    public function actionAdd()
    {
        $model = new NoteForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...
 
            return $this->render('note-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('note', ['model' => $model]);
        }
    }
}