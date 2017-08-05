<?php

class ExplainDataController extends AccessController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $module = 'explainData';

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'del', 'create', 'update', 'delete', 'getinfor', 'adminpage', 'createpage', 'updatepage', 'menu', 'refresh', 'view', 'menu'),
                'users' => array('@'),
                'expression' => (string) Yii::app()->user->authenticate($this->module)
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($news_id) {
        $this->isEditor = true;
        
        $model = new ExplainData;
        
        if(isset($news_id) && $news_id) {
            $model->newsName = News::model()->findByPk($news_id)->title;
            $news = News::model()->findByPk($news_id);
            $news->is_explain = 1;
            $news->notPage = false;
            $news->save();
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ExplainData'])) {
            $model->attributes = $_POST['ExplainData'];
            $model->news_id = $news_id;
            if ($model->save())
                $this->redirect(array('news/page'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->isEditor = true;
        
        $model = $this->loadModel($id);
        $model->newsName = News::model()->findByPk($model->news_id)->title;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ExplainData'])) {
            $model->attributes = $_POST['ExplainData'];
            if ($model->save())
                $this->redirect(array('news/page'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    public function actionDelete($id) {
        $data = $this->loadModel($id);
        
        if(ExplainData::model()->countByAttributes(array('news_id' => $data->news_id)) == 1) {
            $news = News::model()->findByPk($data->news_id);
            $news->is_explain = 0;
            $news->notPage = false;
            $news->save();
        }
        
        $data->delete();
            

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('news/page'));
    }

    

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ExplainData the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ExplainData::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ExplainData $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'explain-data-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
