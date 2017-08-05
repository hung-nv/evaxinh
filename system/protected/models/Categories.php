<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property integer $parent_id
 * @property string $image
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $status
 */
class Categories extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $search;
    public $locationSelected;
    public $adminCate = false;

    public function tableName() {
        return 'categories';
    }

    public function getTitle() {
        switch ($this->parent_id) {
            case 0:
                return $this->title;
                break;
            default:
                return '- ' . $this->title;
                break;
        }
    }

    function getImage() {
        if (isset($this->image) && $this->image)
            return '<a style="color:blue;" href="../uploads/categories/' . $this->image . '" data-lightbox="roadtrip">Xem ảnh</a>';
        else
            return '';
    }

    function getParent() {
        if ($this->parent_id > 0) {
            return $this->findByPk($this->parent_id)->title;
        } else {
            return '';
        }
    }

    public function beforeFind() {
        $this->title = '';
        parent::beforeFind();
    }
    
    function getListCategory($type = NULL) {
        $return = array();
        $cmd = Yii::app()->db->createCommand('select id,title from categories where status=1 && parent_id=0');
        $data = $cmd->queryAll();
        if (isset($type) && $type == 1)
            $return[''] = 'All Category';
        else if (isset($type) && $type == 0)
            $return[0] = 'Select...';
        if (isset($data) && $data) {
            foreach ($data as $i) {
                $cmdSub = Yii::app()->db->createCommand('select id,title from categories where status=1 && parent_id=' . $i['id']);
                $dataSub = $cmdSub->queryAll();
                if (isset($dataSub) && $dataSub) {
                    $child = array();
                    foreach ($dataSub as $j) {
                        $cmdGrand = Yii::app()->db->createCommand('select id,title from categories where status=1 && parent_id=' . $i['id']);
                        $dataGrand = $cmdGrand->queryAll();
                        if(isset($dataGrand) && $dataGrand) {
                            $grand = array();
                            foreach($dataGrand as $k) {
                                $grand[] = $k;
                            }
                        }
                        $child[] = array(
                            'id' => $j['id'],
                            'title' => $j['title'],
                            'grand' => $grand
                        );
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

    function convertLink($string) {
        $a = array("\\", '*', '^', '`', '~', '$', 'ä', '%', ' - ', '\"', '#', '…', 'Ấ', "'", '"', ")", "(", "ễ", ";", ",", "&", "&quot;", "“", "”", "/", "Á", "À", "Ả", "Ã", "Ạ", "Ó", "Ò", "Ỏ", "Õ", "Ọ", "Ă", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Ô", "Ố", "Ồ", "Ổ", "Ỗ", "Ộ", "Â", "Ã", "Á", "À", "Ả", "Ẫ", "Ậ", "Ơ", "Ớ", "Ờ", "Ở", "Ỡ", "Ợ", "É", "È", "Ẻ", "Ẽ", "Ẹ", "Ú", "Ù", "Ủ", "Ũ", "Ụ", "Ê", "Ễ", "Ề", "Ể", "Ệ", "Ư", "Ứ", "Ừ", "Ử", "Ữ", "Ự", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ý", "Ỳ", "Ỷ", "Ỹ", "Ỵ", "Đ", "á", "à", "ả", "ã", "ạ", "ó", "ò", "ỏ", "õ", "ọ", "ă", "ắ", "ằ", "ẳ", "ẵ", "ặ", "ô", "ố", "ồ", "ổ", "ỗ", "ộ", "â", "ã", "ấ", "ầ", "ẩ", "ẫ", "ậ", "ơ", "ớ", "ờ", "ở", "ỡ", "ợ", "é", "è", "ẻ", "ê", "ế", "ề", "ệ", "ẽ", "ẹ", "ú", "ù", "ủ", "ũ", "ụ", "ê", "ẽ", "ề", "ể", "ệ", "ư", "ứ", "ừ", "ử", "ữ", "ự", "í", "ì", "ỉ", "ĩ", "ị", "ý", "ỳ", "ỷ", "ỹ", "ỵ", "đ", "!", "@", "?", ".", ":");
        $b = array('', '', '', '', '', '', 'a', '', '', '', '', '', '', '', '', "", "", "e", "", "", "", "", "", "", " ", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "u", "i", "i", "i", "i", "i", "y", "y", "y", "y", "y", "d", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "e", "e", "e", "e", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "u", "i", "i", "i", "i", "i", "y", "y", "y", "y", "y", "d", "", "", "", "", "" . "");
        $string = strtolower(str_replace($a, $b, $string));
        $string = preg_replace('/\s{2}+/', ' ', $string);
        $string = str_replace(" ", "-", $string);
        $string = preg_replace('/\-{2}+/', '-', $string);
        return $string;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required', 'message' => '{attribute} không được để trống!'),
            array('parent_id, status', 'numerical', 'integerOnly' => true),
            array('title, alias, image, meta_title, meta_description, meta_keywords', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, parent_id, search, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Name',
            'alias' => 'Alias',
            'parent_id' => 'Danh mục cha',
            'image' => 'Ảnh',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'status' => 'Trạng thái',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('title', $this->search, true);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('status', 1);

        $criteria->order = 'id';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 10)
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Categories the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
