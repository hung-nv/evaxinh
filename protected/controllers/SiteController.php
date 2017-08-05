<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
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
        $this->meta = array(
            'title' => $this->site->meta_title,
            'description' => $this->site->meta_description,
        );
        
        $slider = Slider::model()->findAllByAttributes(array('location' => 1, 'status' => 1), array('order' => 'ordere'));
        $news = News::model()->findAllBySql('select * from news where id in ('.$this->site->news_ids.')');
        $daotao = Daotao::model()->findAll();
        $features = Features::model()->findAll();

        $contact = new Contact;
        
        if (isset($_POST['Contact'])) {
            $contact->attributes = $_POST['Contact'];
            $contact->content = isset($_POST['Contact']['content']) ? $_POST['Contact']['content'] : '';

            $programs = '';
            if (isset($_POST['Contact']['program']) && $_POST['Contact']['program'])
                $programs = '<p>Đăng ký khóa học: ' . implode(', ', $_POST['Contact']['program']) . '</p>';

            $contact->content .= $programs;

            $contact->save();

            $subject = 'Đăng ký từ Vienthammyevaxinh';
            $msg = '<html><head><title>' . $subject . '</title><meta http-equiv=\'Content-Type\' content=\'text/html; charset=UTF-8\'></head><body>
                    <p>Tên: ' . $contact->name . '</p>' .
                '<p>Email: ' . $contact->email . '</p>' .
                '<p>Số điện thoại: ' . $contact->mobile . '</p>' .
                '<p>Thông điệp: ' . $contact->content . '</p>
                    </body></html>';
            $this->sendmail($this->site->email, 'ngaminh20@gmail.com', 'ffkioslzwwgcywcx', $subject, $msg, 'vienthammyevaxinh');
        }

        $this->render('index', array(
            'slider' => $slider,
            'news' => $news,
            'daotao' => $daotao,
            'features' => $features
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
    public function actionContact() {
        $model = new Contact;
        if (isset($_POST['Contact'])) {
            $model->attributes = $_POST['Contact'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('contact', 'Gửi thông tin liên hệ thành công. Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất có thể. Trân trọng!');
                $this->refresh();
            } else {
                var_dump($model->getErrors());
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
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