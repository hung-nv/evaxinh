<?php

/**
 * This is the model class for table "explain_data".
 *
 * The followings are the available columns in table 'explain_data':
 * @property integer $id
 * @property integer $news_id
 * @property string $label
 * @property string $data
 * @property integer $location
 */
class ExplainData extends CActiveRecord {

    public $newsName;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'explain_data';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('news_id, location', 'numerical', 'integerOnly' => true),
            array('label', 'length', 'max' => 255),
            array('data', 'safe'),
            array('location', 'validateLocation'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, news_id, label, data, location', 'safe', 'on' => 'search'),
        );
    }
    
    public function validateLocation($attribute, $params) {
        if ($this->isNewRecord) {
            if ($this->findByAttributes(array('news_id' => $this->news_id, 'location' => 1)) && $this->location == 1)
                $this->addError($attribute, 'Vị trí này đã tồn tại, chọn vị trí khác!');
        }
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
            'news_id' => 'Trang',
            'label' => 'Tiêu đề',
            'data' => 'Nội dung',
            'location' => 'Vị trí',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('news_id', $this->news_id);
        $criteria->compare('label', $this->label, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('location', $this->location);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ExplainData the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
