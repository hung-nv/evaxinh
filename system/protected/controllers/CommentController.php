<?php

class CommentController extends AccessController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $module = 'comment';
    

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($news_id) {
        $model = new Comment;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        if(isset($news_id) && $news_id) {
            $model->newsName = News::model()->findByPk($news_id)->title;
        }

        if (isset($_POST['Comment'])) {
            $model->attributes = $_POST['Comment'];
            
            $model->news_id = $news_id;
            $model->avatarFile = CUploadedFile::getInstance($model, 'avatar');
            if ($model->save()) {
                $upload = false;

                if (isset($model->avatarFile) && $model->avatarFile) {
                    $fileName = preg_replace('/\s+/', '', $model->id . '_' . $this->cv2url($model->avatarFile->getName()));
                    $model->avatarFile->saveAs('../uploads/comment/' . $fileName);
                    $upload = true;
                }

                if ($upload) {
                    $model->avatar = $fileName;
                    $model->save();
                }
                
                $this->redirect(array('admin'));
            }
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
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        $model->newsName = News::model()->findByPk($model->news_id)->title;

        if (isset($_POST['Comment'])) {
            $model->attributes = $_POST['Comment'];
            
            $model->avatarFile = CUploadedFile::getInstance($model, 'avatar');
            if ($model->save()) {
                $upload = false;

                if (isset($model->avatarFile) && $model->avatarFile) {
                    if ($model->oldAvatar) {
                        if (file_exists('../uploads/comment/' . $model->oldAvatar))
                            unlink('../uploads/comment/' . $model->oldAvatar);
                    }
                    
                    $fileName = preg_replace('/\s+/', '', $model->id . '_' . $this->cv2url($model->avatarFile->getName()));
                    $model->avatarFile->saveAs('../uploads/comment/' . $fileName);
                    $upload = true;
                }

                if ($upload) {
                    $model->avatar = $fileName;
                    $model->save();
                }
                
                Yii::app()->user->setFlash('newsUpdate', 'Cập nhật thành công');
                $this->redirect(array('update', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Comment('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Comment']))
            $model->attributes = $_GET['Comment'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Comment the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Comment::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Comment $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
