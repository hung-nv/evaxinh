<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class MenuPageForm extends CFormModel {

    public $page;

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
            'page' => 'Page',
        );
    }
    
    function getListPage() {
        $return = array();
        $cmd = Yii::app()->db->createCommand('select a.id,a.title,a.alias from news as a left join menu as b on a.id=b.page_id where 
            a.status=1 && a.is_page=1');
        $data = $cmd->queryAll();
        if (isset($data) && $data) {
            foreach ($data as $i) {
                $return[$i['id']] = $i['title'];
            }
        }
        return $return;
    }

}
