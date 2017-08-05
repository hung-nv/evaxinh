<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class MenuCategoryForm extends CFormModel {

    public $category;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
                // username and password are required
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'category' => 'Category',
        );
    }

    function getListCategory() {
        $return = array();
        $cmd = Yii::app()->db->createCommand('select id,title,alias from categories where parent_id=0 && status=1');

        $data = $cmd->queryAll();
        if (isset($data) && $data) {
            foreach ($data as $i) {
                $cmdChild = Yii::app()->db->createCommand('select id,title,alias from categories where parent_id=' . $i['id'] . ' && status=1');
                $dataChild = $cmdChild->queryAll();
                if (isset($dataChild) && $dataChild) {
                    $child = array();
                    foreach ($dataChild as $j) {
                        $child[] = $j;
                    }
                    $return[] = array(
                        'id' => $i['id'],
                        'title' => $i['title'],
                        'child' => $child
                    );
                } else {
                    $return[] = $i;
                }
            }
        }
        return $return;
    }

}
