<?php

class NewsController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($alias)
    {
        $criteria = new CDbCriteria;
        $criteria->join = 'inner join categories as b on a.tag=b.alias';
        $criteria->alias = 'a';
        $criteria->select = 'a.*,b.id as parentId,b.title as parentName,b.alias as parentAlias,b.parent_id as grandId';
        $criteria->compare('a.alias', $alias);
        $criteria->compare('a.status', 1);
        $data = News::model()->findAll($criteria);

        if (isset($data) && $data) {
            $model = $data[0];
            if ($model->meta_title == '')
                $model->meta_title = $model->title;
            $this->meta = array(
                'title' => $model->meta_title,
                'description' => $model->meta_description,
            );

            if ($model->grandId != '0') {
                //NẰM TRONG DANH MỤC 2 LỚP
                $this->subAlias = $model->parentAlias;
                $this->subLabel = $model->parentName;
                $this->cateAlias = Categories::model()->findByPk($model->grandId)->alias;
                $this->cateLabel = Categories::model()->findByPk($model->grandId)->title;
            } else {
                //NẰM TRONG DANH MỤC 1 LỚP
                $this->cateAlias = $model->parentAlias;
                $this->cateLabel = $model->parentName;
            }

            $criRelated = new CDbCriteria;
            $criRelated->compare('is_page', 0);
            $criRelated->compare('status', 1);
            $criRelated->select = 'id,title,alias,is_page,image';
            $criRelated->compare('id', '<>' . $model->id);
            $criRelated->limit = 6;
            $related = News::model()->findAll($criRelated);

        } else {
            $this->redirect(Yii::app()->createUrl('site/error'));
        }

        $this->render('view', array(
            'model' => $model,
            'related' => $related
        ));
    }

    public function actionPage($alias)
    {
        $contact = new Contact;

        $criteria = new CDbCriteria;
        $criteria->join = 'left join teacher as c on a.teacher_id = c.id';
        $criteria->alias = 'a';
        $criteria->select = 'a.*,c.name as tName,c.introduction as tIntro,c.avatar as tAvatar';
        $criteria->compare('a.alias', $alias);
        $criteria->compare('a.is_page', 1);
        $criteria->compare('a.status', 1);
        $data = News::model()->findAll($criteria);

        if (isset($data) && $data) {
            $model = $data[0];

            if ($model->is_explain == 1)
                $tplview = 'training';
            else
                $tplview = 'page';

            if ($model->meta_title == '')
                $model->meta_title = $model->title;
            $this->meta = array(
                'title' => $model->meta_title,
                'description' => $model->meta_description,
            );

            $header = Explain::model()->findByAttributes(array('news_id' => $model->id, 'location' => 1));
            $firstAfterContent = Explain::model()->findAllByAttributes(array('news_id' => $model->id, 'location' => 2));
            $secondAfterContent = Explain::model()->findAllByAttributes(array('news_id' => $model->id, 'location' => 3));
            $comment = Comment::model()->findAllByAttributes(array('news_id' => $model->id));

            $criRelated = new CDbCriteria;
            $criRelated->compare('is_explain', 1);
            $criRelated->compare('status', 1);
            $criRelated->select = 'id,title,alias,is_page,image';
            $criRelated->compare('id', '<>' . $model->id);
            $criRelated->limit = 6;
            $related = News::model()->findAll($criRelated);

            if (isset($_POST['Contact'])) {
                $contact->attributes = $_POST['Contact'];

                $programs = '';
                if (isset($_POST['Contact']['program']) && $_POST['Contact']['program'])
                    $programs = '<p>Đăng ký khóa học: ' . implode(', ', $_POST['Contact']['program']) . '</p>';

                $contact->content .= $programs;

                if ($contact->save()) {
                    $subject = 'Đăng ký từ Vienthammyevaxinh';
                    $msg = '<html><head><title>' . $subject . '</title><meta http-equiv=\'Content-Type\' content=\'text/html; charset=UTF-8\'></head><body>
                    <p>Tên: ' . $contact->name . '</p>' .
                        '<p>Email: ' . $contact->email . '</p>' .
                        '<p>Số điện thoại: ' . $contact->mobile . '</p>' .
                        '<p>Địa chỉ: ' . $contact->address . '</p>' .
                        '</body></html>';
                    $this->sendmail($this->site->email, 'ngaminh20@gmail.com', 'ffkioslzwwgcywcx', $subject, $msg, 'vienthammyevaxinh');

                    Yii::app()->user->setFlash('successful', 'Chúc mừng bạn đã đăng ký khóa học');
                }
            }

        } else {
            $this->redirect(Yii::app()->createUrl('site/error'));
        }

        $this->render($tplview, array(
            'model' => $model,
            'header' => $header,
            'firstAfterContent' => $firstAfterContent,
            'secondAfterContent' => $secondAfterContent,
            'related' => $related,
            'comment' => $comment
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return News the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param News $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
