<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $isEditor = false;
    public $is_products = false;

    public function init() {
        if (Yii::app()->db->schema->getTable('products') !== null)
            $this->is_products = true;

        $this->menu = $this->getMenu();

        parent::init();
    }

    function getMenu() {
        $return = array();
        $cmd = Yii::app()->db->createCommand('select * from menu_system where status=1 && parent_id=0 order by ordering');
        $data = $cmd->queryAll();
        if (isset($data) && $data) {
            foreach ($data as $i) {
                $cmdChild = Yii::app()->db->createCommand('select * from menu_system where status=1 && parent_id=' . $i['id'] . ' order by ordering');
                $dataChild = $cmdChild->queryAll();
                if (isset($dataChild) && $dataChild) {
                    $child = array();
                    $s = array();
                    foreach ($dataChild as $j) {
                        $s[] = $j['module'];
                        $child[] = $j;
                    }
                    $return[] = array(
                        'name' => $i['name'],
                        'icon' => $i['icon'],
                        'module' => $i['module'],
                        'child' => $child,
                        's' => implode(',', $s)
                    );
                } else {
                    $return[] = $i;
                }
            }
        }
        return $return;
    }
    
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

}