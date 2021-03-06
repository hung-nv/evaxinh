<?php

/**
 * This is the model class for table "teacher".
 *
 * The followings are the available columns in table 'teacher':
 * @property integer $id
 * @property string $name
 * @property string $introduction
 * @property string $avatar
 */
class Teacher extends CActiveRecord {
    
    public $oldAvatar, $avatarFile, $inforTeacher;
    
    public function getInforTeacher() {
        return '<div class="col-md-2 col-sm-4"><p><img src="../uploads/teacher/'.$this->avatar.'" style="width:200px;height: auto;" /></p><p>'.$this->name.'</p></div>
                <div class="col-md-10 col-sm-8" style="padding:10px 0;"><p>'.$this->introduction.'</p></div>';
    }
    
    public function afterFind() {
        $this->oldAvatar = $this->avatar;
        parent::afterFind();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'teacher';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, avatar', 'length', 'max' => 255),
            array('introduction', 'safe'),
            array('avatar', 'file', 'allowEmpty' => true, 'types' => Yii::app()->params['imageType']),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, introduction, avatar', 'safe', 'on' => 'search'),
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
            'name' => 'Name',
            'introduction' => 'Introduction',
            'avatar' => 'Avatar',
            'inforTeacher' => 'Teacher'
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('introduction', $this->introduction, true);
        $criteria->compare('avatar', $this->avatar, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Teacher the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
