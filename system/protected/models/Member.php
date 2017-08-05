<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $address
 * @property string $mobile
 * @property string $password
 * @property string $created_datetime
 * @property integer $status
 */
class Member extends CActiveRecord {

    public $date, $action, $inforMember;

    public function getInforMember() {
        $quote = '<blockquote>';
        $name = '';
        $mobile = '';
        $address = '';
        $infor = '<p>' . $this->email . '</p>
                <small>Created Time: <cite class="text-light-blue">' . $this->created_datetime . '</cite></small>
                ';
        if (isset($this->name) && $this->name)
            $name = '<small>Name: <cite class="text-red">' . $this->name . '</cite></small>';
        if (isset($this->address) && $this->address)
            $address = '<small>Address: <cite>' . $this->address . '</cite></small>';
        if (isset($this->mobile) && $this->mobile)
            $mobile = '<small>Mobile: <cite>' . $this->mobile . '</cite></small>';
        $end = '</blockquote>';
        return $quote . $infor . $name . $mobile . $address . $end;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'member';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, password', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('email, name, password, address', 'length', 'max' => 255),
            array('mobile', 'length', 'max' => 15),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, name, password, created_datetime, status', 'safe', 'on' => 'search'),
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
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'created_datetime' => 'Created Datetime',
            'status' => 'Status',
            'mobile' => 'Mobile',
            'address' => 'Address',
            'inforMember' => 'Information Member'
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('created_datetime', $this->created_datetime, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Member the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
