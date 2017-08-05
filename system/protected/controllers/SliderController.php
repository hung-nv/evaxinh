<?php

class SliderController extends AccessController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $module = 'slider';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($location) {
        $slider = Slider::model()->findAllByAttributes(array('location' => $location));
        
        $model = new Slider;
        
        if (isset($_POST['Slider'])) {
            $model->attributes = $_POST['Slider'];
            
            $model->location = $location;
            
            $model->imgFile = CUploadedFile::getInstance($model, 'image');
            if ($model->save()) {
                $upload = false;

                if (isset($model->imgFile) && $model->imgFile) {
                    $fileName = preg_replace('/\s+/', '', $model->id . '_' . $this->cv2url($model->imgFile->getName()));
                    $model->imgFile->saveAs('../uploads/slider/' . $fileName);
                    $upload = true;
                }

                if ($upload) {
                    $model->image = $fileName;
                    $model->save();
                }
                $this->redirect(array('view', 'location' => $location));
            }
        }
        
        $this->render('view', array(
            'slider' => $slider,
            'model' => $model
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Slider;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Slider'])) {
            $model->attributes = $_POST['Slider'];
            
            $model->imgFile = CUploadedFile::getInstance($model, 'image');
            if ($model->save()) {
                $upload = false;

                if (isset($model->imgFile) && $model->imgFile) {
                    $fileName = preg_replace('/\s+/', '', $model->id . '_' . $this->cv2url($model->imgFile->getName()));
                    $model->imgFile->saveAs('../uploads/slider/' . $fileName);
                    $upload = true;
                }

                if ($upload) {
                    $model->image = $fileName;
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
    
    
    function cv2url($text) {
        $text = str_replace(
                array(' ', '%', "/", "\\", '"', '``', '?', '<', '>', "#", "^", "`", "'", "=", "!", ":", ",,", "..", "*", "&", "--", "▄"), array('-', '', '', '', '', '', '', '', '', '', '', '', '', '-', '', '-', '', '', '', "-", "", ""), $text);
        $chars = array("a", "a", "e", "e", "o", "o", "u", "u", "i", "i", "d", "d", "y", "y");
        $uni[0] = array("á", "à", "ạ", "ả", "ã", "â", "ấ", "ầ", "ậ", "ẩ", "ẫ", "ă", "ắ", "ằ", "ặ", "ẳ", "� �");
        $uni[1] = array("Á", "À", "Ạ", "Ả", "Ã", "Â", "Ấ", "Ầ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ắ", "Ằ", "Ặ", "Ẳ", "� �");
        $uni[2] = array("é", "è", "ẹ", "ẻ", "ẽ", "ê", "ế", "ề", "ệ", "ể", "ễ");
        $uni[3] = array("É", "È", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ế", "Ề", "Ệ", "Ể", "Ễ");
        $uni[4] = array("ó", "ò", "ọ", "ỏ", "õ", "ô", "ố", "ồ", "ộ", "ổ", "ỗ", "ơ", "ớ", "ờ", "ợ", "ở", "� �");
        $uni[5] = array("Ó", "Ò", "Ọ", "Ỏ", "Õ", "Ô", "Ố", "Ồ", "Ộ", "Ổ", "Ỗ", "Ơ", "Ớ", "Ờ", "Ợ", "Ở", "� �");
        $uni[6] = array("ú", "ù", "ụ", "ủ", "ũ", "ư", "ứ", "ừ", "ự", "ử", "ữ");
        $uni[7] = array("Ú", "Ù", "Ụ", "Ủ", "Ũ", "Ư", "Ứ", "Ừ", "Ự", "Ử", "Ữ");
        $uni[8] = array("í", "ì", "ị", "ỉ", "ĩ");
        $uni[9] = array("Í", "Ì", "Ị", "Ỉ", "Ĩ");
        $uni[10] = array("đ");
        $uni[11] = array("Đ");
        $uni[12] = array("ý", "ỳ", "ỵ", "ỷ", "ỹ");
        $uni[13] = array("Ý", "Ỳ", "Ỵ", "Ỷ", "Ỹ");
        for ($i = 0; $i <= 13; $i++) {
            $text = str_replace($uni[$i], $chars[$i], $text);
        }
        return $text;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $slider = $this->loadModel($id);
        
        if(isset($slider) && $slider) {
            if (isset($slider->image) && $slider->image && file_exists('../uploads/slider/' . $slider->image))
                unlink('../uploads/slider/' . $slider->image);
            
            $slider->delete();
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : Yii::app()->request->urlReferrer);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $homeSlider = Slider::model()->findAllByAttributes(array('location' => 1, 'status' => 1), array('order' => 'ordere'));

        $this->render('admin', array(
            'homeSlider' => $homeSlider
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Slider the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Slider::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Slider $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'slider-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
