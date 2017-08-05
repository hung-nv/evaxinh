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
    public $bottom;

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $site;
    public $cateAlias, $cateLabel, $subAlias, $subLabel;
    public $meta;
    public $allPrograms;
    public $submenu;
    public $hotNews;

    public function init() {
        $this->site = Site::model()->findByPk(1);
        $this->menu = $this->getMenu(0, 'top');
        $this->bottom = $this->getMenu(0, 'bottom');

        $criteria = new CDbCriteria;
        $criteria->compare('is_explain', 1);
        $criteria->compare('status', 1);
        $criteria->select = 'id,alias,title,image,is_page';
        $this->allPrograms = News::model()->findAll($criteria);
        $this->hotNews = News::model()->findAllByAttributes(array('status' => 1, 'hot' => 1, 'is_page' => 0), array('limit' => 5));
        parent::init();
    }

    public function getMenu($parent_id, $location, $floor = 3, $type = NULL) {
        $menu = array();

        if (isset($type) && $type)
            $type = ' && ' . $type;

        $sql = 'select a.type, a.name, a.id, a.alias, a.direct, a.module, 
                        b.id as cateId, b.title as cateName, b.alias as cateAlias, 
                        c.id as pageId, c.title as pageName, c.alias as pageAlias
                            from menu as a left join categories as b on a.categories_id = b.id left join news as c on a.page_id = c.id && c.is_page = 1
                            where a.parent_id = "' . $parent_id . '" && a.location="' . $location . '" order by a.ordering';
        $cmd = Yii::app()->db->createCommand($sql);
        $data = $cmd->queryAll();

        if (isset($data) && $data) {
            foreach ($data as $item) {
                $sqlSub = 'select a.type, a.name, a.id, a.alias, a.direct, a.module, 
                                b.id as cateId, b.title as cateName, b.alias as cateAlias, 
                                c.id as pageId, c.title as pageName, c.alias as pageAlias
                                    from menu as a left join categories as b on a.categories_id = b.id left join news as c on a.page_id = c.id && c.is_page = 1
                                    where a.parent_id = "' . $item['id'] . '" && a.location="' . $location . '" order by a.ordering';
                $cmdsub = Yii::app()->db->createCommand($sqlSub);

                $dataSub = $cmdsub->queryAll();
                if (isset($dataSub) && $dataSub && $floor > 1) {
                    $child = array();
                    foreach ($dataSub as $itemSub) {
                        $sqlGrand = 'select a.type, a.name, a.id, a.alias, a.direct, a.module, 
                                        b.id as cateId, b.title as cateName, b.alias as cateAlias, 
                                        c.id as pageId, c.title as pageName, c.alias as pageAlias
                                            from menu as a left join categories as b on a.categories_id = b.id left join news as c on a.page_id = c.id && c.is_page = 1
                                            where a.parent_id = "' . $itemSub['id'] . '" && a.location="' . $location . '" order by a.ordering';
                        $cmdgrand = Yii::app()->db->createCommand($sqlGrand);
                        $datagrand = $cmdgrand->queryAll();

                        $grand = array();
                        if (isset($datagrand) && $datagrand && $floor > 2) {
                            foreach ($datagrand as $itemgrand) {
                                $item['label'] = $this->setLabelMenu($itemgrand['type'], $itemgrand['name'], $itemgrand['cateName'], $itemgrand['pageName']);
                                $itemgrand['url'] = $this->setUrlMenu($itemgrand['type'], $itemgrand['alias'], $itemgrand['cateAlias'], $itemgrand['pageAlias'], $itemgrand['module'], $itemgrand['direct']);
                                $grand[] = $itemgrand;
                            }
                        }

                        $itemSub['label'] = $this->setLabelMenu($itemSub['type'], $itemSub['name'], $itemSub['cateName'], $itemSub['pageName']);
                        $itemSub['url'] = $this->setUrlMenu($itemSub['type'], $itemSub['alias'], $itemSub['cateAlias'], $itemSub['pageAlias'], $itemSub['module'], $itemSub['direct']);

                        $child[] = array(
                            'id' => $itemSub['id'],
                            'label' => $itemSub['label'],
                            'type' => $itemSub['type'],
                            'alias' => $itemSub['alias'],
                            'url' => $itemSub['url'],
                            'grand' => $grand
                        );
                    }

                    $item['label'] = $this->setLabelMenu($item['type'], $item['name'], $item['cateName'], $item['pageName']);
                    $item['url'] = $this->setUrlMenu($item['type'], $item['alias'], $item['cateAlias'], $item['pageAlias'], $item['module'], $item['direct']);

                    $menu[] = array(
                        'id' => $item['id'],
                        'label' => $item['label'],
                        'type' => $item['type'],
                        'alias' => $item['alias'],
                        'url' => $item['url'],
                        'child' => $child
                    );
                } else {
                    $item['label'] = $this->setLabelMenu($item['type'], $item['name'], $item['cateName'], $item['pageName']);
                    $item['url'] = $this->setUrlMenu($item['type'], $item['alias'], $item['cateAlias'], $item['pageAlias'], $item['module'], $item['direct']);

                    $menu[] = array(
                        'id' => $item['id'],
                        'label' => $item['label'],
                        'type' => $item['type'],
                        'alias' => $item['alias'],
                        'url' => $item['url'],
                    );
                }
            }
        }

        return $menu;
    }

    private function setUrlMenu($type, $alias, $cateAlias, $pageAlias, $module, $direct) {
        switch ($type) {
            case 'category':
                $return = Yii::app()->createUrl('categories/view', array('alias' => $cateAlias));
                break;
            case 'page':
                $return = Yii::app()->createUrl('news/page', array('alias' => $pageAlias));
                break;
            case 'module':
                $return = Yii::app()->createUrl($module);
                break;
            case 'direct':
                $return = $direct;
                break;
            default:
                $return = 'error';
                break;
        }
        return $return;
    }

    private function setLabelMenu($type, $name, $cateName, $pageName) {
        switch ($type) {
            case 'category':
                $return = $cateName;
                break;
            case 'page':
                $return = $pageName;
                break;
            default:
                $return = $name;
                break;
        }
        return $return;
    }

    public function sendmail($to, $id_send, $pass_send, $subject, $content, $website) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = $id_send;
        $mail->Password = $pass_send;
        $mail->ClearAddresses();

        //Set who the message is to be sent from
        $mail->setFrom($id_send, $website);

        //Set an alternative reply-to address
        $mail->addReplyTo($to, 'Reply from customer');

        //Set who the message is to be sent to
        $mail->addAddress($to, $website);
        $mail->WordWrap = 50; // set word wrap
        //$mail->Body = $message;
        $mail->CharSet = 'UTF-8';
        $mail->IsHTML(true); // send as HTML

        $mail->Subject = $subject;
        $mail->MsgHTML($content);

        if ($mail->Send()) {
            return true;
        } else {
            return false;
        }
    }

}