<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $defaultAction = 'login';

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function actionSetting() {
        $this->isEditor = true;
        $model = Setting::model()->findByPk(1);

        if (Yii::app()->getRequest()->getParam('daotao_id')) {
            $daotao_id = Yii::app()->getRequest()->getParam('daotao_id');
            $daotao = Daotao::model()->findByPk($daotao_id);
        } else {
            $daotao = new Daotao;
        }

        $dataF = new Daotao('search');
        $dataF->unsetAttributes();
        
        
        if (Yii::app()->getRequest()->getParam('features_id')) {
            $features_id = Yii::app()->getRequest()->getParam('features_id');
            $features = Features::model()->findByPk($features_id);
        } else {
            $features = new Features;
        }
        
        $dataFeatures = new Features('search');
        $dataFeatures->unsetAttributes();

        if (isset($_POST['Setting'])) {
            $model->attributes = $_POST['Setting'];

            $model->logoFile = CUploadedFile::getInstance($model, 'logo');
            $model->favicoFile = CUploadedFile::getInstance($model, 'favico');
            if ($model->save()) {
                $upload = false;
                $uploadF = false;

                if (isset($model->logoFile) && $model->logoFile) {
                    if ($model->oldLogo) {
                        if (file_exists('../images/' . $model->oldLogo))
                            unlink('../images/' . $model->oldLogo);
                    }

                    $logoName = 'logo'.'_'.$this->cv2url($model->logoFile->getName());
                    $model->logoFile->saveAs('../images/' . $logoName);
                    $upload = true;
                }

                if (isset($model->favicoFile) && $model->favicoFile) {
                    if ($model->oldFavico) {
                        if (file_exists('../images/' . $model->oldFavico))
                            unlink('../images/' . $model->oldFavico);
                    }

                    $fName = 'favico'.'_'.$this->cv2url($model->favicoFile->getName());
                    $model->favicoFile->saveAs('../images/' . $fName);
                    $uploadF = true;
                }

                if ($uploadF) {
                    $model->favico = $fName;
                    $model->save();
                }

                if ($upload) {
                    $model->logo = $logoName;
                    $model->save();
                }

                $this->redirect(array('setting'));
            }
        }


        if (isset($_POST['Daotao'])) {
            $daotao->attributes = $_POST['Daotao'];
            $daotao->imgFile = CUploadedFile::getInstance($daotao, 'image');
            if ($daotao->save()) {

                $upload = false;

                if (isset($daotao->imgFile) && $daotao->imgFile) {
                    if ($daotao->oldImage) {
                        if (file_exists('../images/' . $daotao->oldImage))
                            unlink('../images/' . $daotao->oldImage);
                    }

                    $fileName = preg_replace('/\s+/', '', $daotao->id . '_' . $this->cv2url($daotao->imgFile->getName()));
                    $daotao->imgFile->saveAs('../images/' . $fileName);
                    $upload = true;
                } else {
                    $daotao->image = $daotao->oldImage;
                }

                if ($upload) {
                    $daotao->image = $fileName;
                }

                $daotao->save();

                $url = Yii::app()->request->requestUri;
                Yii::app()->user->setFlash('trainings', 'yes');
                $this->redirect($url);
            }
        }
        
        if (isset($_POST['Features'])) {
            $features->attributes = $_POST['Features'];
            $features->imgFile = CUploadedFile::getInstance($features, 'image');
            if ($features->save()) {

                $upload = false;

                if (isset($features->imgFile) && $features->imgFile) {
                    if ($features->oldImage) {
                        if (file_exists('../images/' . $features->oldImage))
                            unlink('../images/' . $features->oldImage);
                    }

                    $fileName = preg_replace('/\s+/', '', $features->id . '_' . $this->cv2url($features->imgFile->getName()));
                    $features->imgFile->saveAs('../images/' . $fileName);
                    $upload = true;
                } else {
                    $features->image = $features->oldImage;
                }

                if ($upload) {
                    $features->image = $fileName;
                }
                
                $features->save();
                
                $url = Yii::app()->request->requestUri;
                Yii::app()->user->setFlash('features', 'yes');

                $this->redirect($url);
            }
        }

        $this->render('setting', array(
            'model' => $model,
            'daotao' => $daotao,
            'dataF' => $dataF,
            'features' => $features,
            'dataFeatures' => $dataFeatures,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = '/layouts/column3';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}