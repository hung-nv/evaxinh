<?php

/**
 * This is the model class for table "contact".
 *
 * The followings are the available columns in table 'contact':
 * @property integer $id
 * @property string $name
 * @property string $subject
 * @property string $address
 * @property string $email
 * @property string $mobile
 * @property string $content
 * @property string $created_datetime
 */
class Contact extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $inforPersion, $inforMessenger;
    
    function getInforPersion() {
        $quote = '<blockquote>';
        $name = '';
        $mobile = '';
        $address = '';
        $infor = '<p>' . $this->name . '</p>
                <small>Created Time: <cite class="text-light-blue">' . $this->created_datetime . '</cite></small>
                ';
        if (isset($this->email) && $this->email)
            $name = '<small>Email: <cite class="text-red">' . $this->email . '</cite></small>';
        if (isset($this->address) && $this->address)
            $address = '<small>Address: <cite>' . $this->address . '</cite></small>';
        if (isset($this->mobile) && $this->mobile)
            $mobile = '<small>Mobile: <cite>' . $this->mobile . '</cite></small>';
        $end = '</blockquote>';
        return $quote . $infor . $name . $mobile . $address . $end;
    }
    
    function getInforMessenger() {
        return $this->inforMessenger = '<p>Nội dung: '.$this->content.'</p>';
    }
    
    public function tableName() {
        return 'contact';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, subject, address, email, mobile, content, created_datetime', 'required'),
            array('name, email', 'length', 'max' => 100),
            array('subject, address', 'length', 'max' => 255),
            array('mobile', 'length', 'max' => 15),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, subject, address, email, mobile, content, created_datetime', 'safe', 'on' => 'search'),
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
            'subject' => 'Chủ đề',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'mobile' => 'Điện thoại',
            'content' => 'Nội dung',
            'created_datetime' => 'Ngày gửi',
            'inforPersion' => 'Thông tin người gửi',
            'inforMessenger' => 'Thông điệp'
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
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('created_datetime', $this->created_datetime, true);
        
        $criteria->order = 'id desc';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Contact the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
