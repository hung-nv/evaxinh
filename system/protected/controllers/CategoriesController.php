<?php

class CategoriesController extends AccessController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $module = 'categories';

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'getinfor'),
                'users' => array('@'),
                'expression' => (string) Yii::app()->user->authenticate($this->module)
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionGetinfor($id) {
        $this->layout = '/layouts/blank';
        $model = Yii::app()->db->createCommand('select * from categories where id=' . $id)->queryRow();
        echo json_encode($model);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $count = Categories::model()->countByAttributes(array('parent_id' => $id));
        if($count == 0) {
            $this->loadModel($id)->delete();
            Menu::model()->deleteAllByAttributes(array('categories_id' => $id));
            echo "1";
        } else {
            echo "0";
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $modelSearch = new Categories('search');
        $modelSearch->adminCate = true;
        $modelSearch->unsetAttributes();  // clear any default values

        if (isset($_GET['Categories']))
            $modelSearch->attributes = $_GET['Categories'];

        $model = new Categories;
        if (isset($_POST['Categories'])) {
            $model->attributes = $_POST['Categories'];
            
            if (isset($_POST['Categories']['alias']) && $_POST['Categories']['alias'])
                $model->alias = $_POST['Categories']['alias'];
            else
                $model->alias = Categories::model()->convertLink($model->title);

            if (isset($_POST['Categories']['id']) && $_POST['Categories']['id']) {
                $model->updateByPk($_POST['Categories']['id'], array(
                    'title' => $model->title,
                    'alias' => $model->alias,
                    'parent_id' => $model->parent_id,
                    'meta_description' => $model->meta_description,
                    'meta_title' => $model->meta_title,
                    'status' => $model->status
                ));
                Yii::app()->user->setFlash('categories', 'Update successful!');
                $this->redirect(array('admin'));
            } else {
                if ($model->validate()) {
                    if ($model->save()) {
                        Yii::app()->user->setFlash('categories', 'Create category successful!');
                        $this->redirect(array('admin'));
                    } else {
                        var_dump($model);
                    }
                }
            }
        }

        $this->render('adminCate', array(
            'modelSearch' => $modelSearch,
            'model' => $model
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Categories the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Categories::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Categories $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'categories-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
