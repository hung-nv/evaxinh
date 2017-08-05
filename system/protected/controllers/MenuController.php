<?php

class MenuController extends AccessController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $module = 'categories';

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'refresh', 'addpage', 'addcategory', 'addcustom', 'remove', 'update'),
                'users' => array('@'),
                'expression' => (string) Yii::app()->user->authenticate($this->module)
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionAdmin() {
        if (Yii::app()->getRequest()->getParam('location'))
            $location = Yii::app()->getRequest()->getParam('location');
        else
            $location = 'top';

        $custom = new MenuCustomForm;
        $menuCategory = new MenuCategoryForm;
        $menuPage = new MenuPageForm;

        $menu = $this->getListMenu($location);
        $parent = $this->getListMenu($location);

        $this->render('menu', array(
            'custom' => $custom,
            'menuCategory' => $menuCategory,
            'menuPage' => $menuPage,
            'menu' => $menu,
            'location' => $location,
            'parent' => $parent
        ));
    }

    public function actionAddpage($ids, $location) {
        $this->layout = '/layouts/blank';

        $cmd = Yii::app()->db->createCommand('select id,title,alias from news where id in (' . $ids . ')');
        $data = $cmd->queryAll();
        if (isset($data) && $data) {
            foreach ($data as $item) {
                Yii::app()->db->createCommand('insert into menu(page_id,type,parent_id,location) 
                                values("' . $item['id'] . '", "page", "0","' . $location . '")')->execute();
            }
            return true;
        }
    }

    public function actionAddcategory($ids, $location) {
        $this->layout = '/layouts/blank';

        $cmd = Yii::app()->db->createCommand('select id,title,alias from categories where parent_id=0 && id in (' . $ids . ')');
        $data = $cmd->queryAll();
        if (isset($data) && $data) {
            foreach ($data as $i) {
                $parent_id = 0;
                $menu = new Menu;
                $cmdChild = Yii::app()->db->createCommand('select id,title,alias from categories where parent_id=' . $i['id'] . ' && id in (' . $ids . ')');
                $dataChild = $cmdChild->queryAll();
                if (isset($dataChild) && $dataChild) {
                    $menu->categories_id = $i['id'];
                    $menu->type = "category";
                    $menu->location = $location;
                    $menu->parent_id = $parent_id;
                    if ($menu->save()) {
                        $parent_id = $menu->id;
                    }

                    foreach ($dataChild as $j) {
                        $menuChild = new Menu;
                        $menuChild->categories_id = $j['id'];
                        $menuChild->type = "category";
                        $menuChild->parent_id = $parent_id;
                        $menuChild->location = $location;
                        $menuChild->save();
                        unset($menuChild);
                    }
                } else {
                    $menu->categories_id = $i['id'];
                    $menu->type = "category";
                    $menu->location = $location;
                    $menu->parent_id = $parent_id;
                    $menu->save();
                }
                unset($menu);
            }
            echo 1;
        } else {
            echo 0;
        }
    }

    public function actionAddcustom($title, $url, $location) {
        $this->layout = '/layouts/blank';

        $menu = new Menu;
        $menu->name = $title;
        $menu->alias = News::model()->convertLink($title);
        $menu->location = $location;
        $menu->type = "direct";
        $menu->direct = $url;
        $menu->parent_id = 0;
        if ($menu->save()) {
            echo 1;
        } else {
            var_dump($menu->getErrors());
        }
    }
    
    public function actionUpdate($id, $order, $parent_id) {
        $this->layout = '/layouts/blank';
        $menu = $this->loadModel($id);
        $menu->ordering = $order;
        $menu->parent_id = $parent_id;
        if($menu->save())
            echo 1;
        else
            echo 0;
    }

    public function actionRefresh() {
        $this->layout = '/layouts/blank';

        if (Yii::app()->getRequest()->getParam('location'))
            $location = Yii::app()->getRequest()->getParam('location');
        else
            $location = 'top';

        $menu = $this->getListMenu($location);
        $parent = $this->getListMenu($location);

        $this->render('_refreshmenu', array(
            'menu' => $menu,
            'location' => $location,
            'parent' => $parent
        ));
    }

    function getListMenu($location) {
        $cmd = Yii::app()->db->createCommand('select a.parent_id,a.id, a.type, a.ordering, a.name, a.direct, a.module, b.id as cateId, b.title as cateName, c.id as pageId, c.title as pageName
                                from menu as a left join categories as b on a.categories_id = b.id left join news as c on a.page_id = c.id && c.is_page = 1
                                where a.parent_id = 0 && location = "'.$location.'" order by a.ordering');
        $data = $cmd->queryAll();
        $menu = array();
        if (isset($data) && $data) {
            foreach ($data as $i) {
                if ($i['type'] == "category") {
                    $i['title'] = $i['cateName'];
                } else if ($i['type'] == "page") {
                    $i['title'] = $i['pageName'];
                } else {
                    $i['title'] = $i['name'];
                }

                $cmdChild = Yii::app()->db->createCommand('select a.parent_id,a.type, a.name, a.id, a.ordering, a.direct, a.module, b.id as cateId, b.title as cateName, c.id as pageId, c.title as pageName
                                from menu as a left join categories as b on a.categories_id = b.id left join news as c on a.page_id = c.id && c.is_page = 1
                                where a.parent_id = ' . $i['id'] . ' && location = "'.$location.'" order by a.ordering');
                $dataChild = $cmdChild->queryAll();
                if (isset($dataChild) && $dataChild) {
                    $child = array();
                    foreach ($dataChild as $j) {
                        if ($j['type'] == "category") {
                            $j['title'] = $j['cateName'];
                        } else if ($j['type'] == "page") {
                            $j['title'] = $j['pageName'];
                        } else {
                            $j['title'] = $j['name'];
                        }

                        $child[] = array(
                            'id' => $j['id'],
                            'title' => $j['title'],
                            'type' => $j['type'],
                            'parent_id' => $j['parent_id'],
                            'ordering' => $j['ordering'],
                        );
                    }
                    $menu[] = array(
                        'id' => $i['id'],
                        'title' => $i['title'],
                        'type' => $i['type'],
                        'parent_id' => $i['parent_id'],
                        'ordering' => $i['ordering'],
                        'child' => $child
                    );
                } else {
                    $menu[] = array(
                        'id' => $i['id'],
                        'title' => $i['title'],
                        'type' => $i['type'],
                        'parent_id' => $i['parent_id'],
                        'ordering' => $i['ordering'],
                    );
                }
            }
        }
        return $menu;
    }

    public function actionRemove($id) {
        $this->loadModel($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : Yii::app()->request->urlReferrer);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Menu the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Menu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Menu $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'menu-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
