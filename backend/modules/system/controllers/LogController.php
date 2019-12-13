<?php

namespace backend\modules\system\controllers;

use backend\modules\system\models\search\SystemLogSearch;
use backend\modules\system\models\SystemLog;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * LogController implements the CRUD actions for SystemLog model.
 */
class LogController extends Controller
{

    /** @inheritdoc */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                    'clear' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SystemLog models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SystemLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (strcasecmp(Yii::$app->request->method, 'delete') == 0) {
            SystemLog::deleteAll($dataProvider->query->where);

            return $this->refresh();
        }
        $dataProvider->sort = [
            'defaultOrder' => ['log_time' => SORT_DESC],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SystemLog model.
     *
     * @param integer $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing SystemLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SystemLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return SystemLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): SystemLog
    {
        if (($model = SystemLog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }
}
