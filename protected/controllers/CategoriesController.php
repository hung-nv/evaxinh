<?php

class CategoriesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($alias) {
        $sql = '';
        $criteria = new CDbCriteria;
        $category = Categories::model()->findByAttributes(array('alias' => $alias));

        if (!$category)
            $this->redirect(Yii::app()->createUrl('site/error'));

        $this->cateAlias = $alias;
        $this->cateLabel = $category->title;

        if ($category->meta_title == '')
            $category->meta_title = $category->title;
        $this->meta = array(
            'title' => $category->meta_title,
            'description' => $category->meta_description,
        );

        $cateChild = Categories::model()->findAllByAttributes(array('parent_id' => $category->id));

        if (count($cateChild) > 0) {
            //LÀ DANH MỤC TO
            foreach ($cateChild as $a) {
                $sql[] = 'a.tag like "%' . $a->alias . '%"';
            }
            $criteria->condition = '(' . implode(' || ', $sql) . ')';
        } else {
            //LÀ DANH MỤC TO, 1 CẤP
            $criteria->condition = 'a.tag LIKE "%' . $category->alias . '%"';

            if ($category->parent_id > 0) {
                //LÀ DANH MỤC NHỎ, 2 CẤP
                $this->cateAlias = $category->getParentAlias();
                $this->cateLabel = $category->getParentName();

                $this->subLabel = $category->title;
                $this->subAlias = $category->alias;
            }
        }

        $criteria->order = 'a.id DESC';
        $pagination = 10;

        $criteria->select = 'title, alias, image, description, created_datetime, is_page, content';
        $criteria->alias = 'a';
        $criteria->compare('a.is_question', 0);

        $count = News::model()->count($criteria);

        $pages = new CPagination($count);
        $pages->setPageSize($pagination);
        $pages->applyLimit($criteria);

        $news = News::model()->findAll($criteria);

        $this->render('view', array(
            'news' => $news,
            'pages' => $pages,
            'category' => $category
        ));
    }

    public function actionQuestions() {
        $category = Categories::model()->findByAttributes(array('alias' => 'hoi-dap'));

        if (!$category)
            $this->redirect('site/error');

        if ($category->meta_title == '')
            $category->meta_title = $category->title;
        $this->meta = array(
            'title' => $category->meta_title,
            'description' => $category->meta_description,
        );

        $cmd = Yii::app()->db->createCommand('select id,title,alias from categories where parent_id = '.$category->id.' && status = 1');
        $data = $cmd->queryAll();
        if (isset($data) && $data) {
            $return = array();
            foreach ($data as $i) {
                $cmdNews = Yii::app()->db->createCommand('select * from news where tag = "' . $i['alias'] . '" && status=1 && is_question = 1');
                $dataNews = $cmdNews->queryAll();
                if (isset($dataNews) && $dataNews) {
                    $child = array();
                    foreach ($dataNews as $j) {
                        $child[] = $j;
                    }
                    $return[] = array(
                        'id' => $i['id'],
                        'title' => $i['title'],
                        'alias' => $i['alias'],
                        'child' => $child
                    );
                } else {
                    $return[] = $i;
                }
            }
        }

        $this->render('questions', array(
            'news' => $return
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
