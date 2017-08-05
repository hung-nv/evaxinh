<?php

/**
 * This is the model class for table "slider".
 *
 * The followings are the available columns in table 'slider':
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $url
 * @property integer $location
 * @property integer $ordere
 * @property integer $status
 */
class Slider extends CActiveRecord {
    
    public $oldImage, $imgFile;
    public $nameTrans, $idTrans;
    /**
     * @return string the associated database table name
     */
    public function afterFind() {
        $this->oldImage = $this->image;
        return parent::afterFind();
    }
    
    function getNameTrans() {
        if (isset($this->nameTrans) && $this->nameTrans)
            return '<p style="color:red;font-weight:bold;">' . $this->nameTrans . '</p><p><a style="color:blue;" href="' . Yii::app()->createUrl('sliderTrans/update', array('id' => $this->idTrans)) . '">->Update<-</a></p>';
        else
            return '<a style="color:blue;" href="' . Yii::app()->createUrl('sliderTrans/create', array('slider_id' => $this->id)) . '">Cập nhật bản dịch</a>';
    }
    
    function getLocation() {
        switch ($this->location) {
            case 1:
                return 'Trang chủ';
                break;
            default:
                return 'Khác';
                break;
        }
    }
    
    function getImage() {
        if (isset($this->image) && $this->image)
            return '<a style="color:blue;" href="../uploads/slider/' . $this->image . '" data-lightbox="roadtrip">Xem ảnh</a>';
        else
            return '';
    }
    
    public function tableName() {
        return 'slider';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('location', 'required'),
            array('location, ordere, status', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            array('image', 'file', 'allowEmpty' => true, 'types' => Yii::app()->params['imageType']),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, image, url, location, ordere, status', 'safe', 'on' => 'search'),
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
            'name' => 'Tên',
            'image' => 'Ảnh',
            'url' => 'Url',
            'location' => 'Vị trí',
            'ordere' => 'Thứ tự',
            'status' => 'Trạng thái',
            'nameTrans' => 'Tên Tiếng Anh'
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
        $criteria->alias = 'a';
        $criteria->join = 'left join slider_trans as b on a.id=b.slider_id';
        $criteria->select = 'a.*,b.name as nameTrans,b.id as idTrans';

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('location', $this->location);
        $criteria->compare('ordere', $this->ordere);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Slider the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
