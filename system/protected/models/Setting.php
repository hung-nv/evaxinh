<?php

/**
 * This is the model class for table "site".
 *
 * The followings are the available columns in table 'site':
 * @property integer $id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $skype
 * @property string $address
 * @property string $phone
 * @property string $address2
 * @property string $phone2
 * @property string $address3
 * @property string $phone3
 * @property string $address4
 * @property string $phone4
 * @property string $address5
 * @property string $phone5
 * @property string $address6
 * @property string $phone6
 * @property string $hotline
 * @property string $email
 * @property string $fax
 * @property string $logo
 * @property string $favico
 * @property string $fanpage
 * @property string $youtube
 * @property string $googlemap
 * @property string $name
 * @property string $description
 * @property string $why_me_label
 * @property string $why_me_content
 * @property string $promotion_label
 * @property string $promotion_content
 * @property string $news_ids
 */
class Setting extends CActiveRecord {
    
    public $oldLogo, $oldFavico, $logoFile, $favicoFile;
    
    public function afterFind() {
        $this->oldFavico = $this->favico;
        $this->oldLogo = $this->logo;
        parent::afterFind();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'site';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('meta_title, meta_description, meta_keywords', 'required'),
            array('meta_title, meta_description, meta_keywords, address, address2, address3, address4, address5, address6, logo, favico, fanpage, youtube, name, description, why_me_label, promotion_label, promotion_content', 'length', 'max' => 255),
            array('skype, phone, hotline, email, fax, news_ids', 'length', 'max' => 100),
            array('phone2, phone3, phone4, phone5, phone6', 'length', 'max' => 15),
            array('googlemap, why_me_content', 'safe'),
            array('logo, favico', 'file', 'allowEmpty' => true, 'types' => Yii::app()->params['imageType']),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, meta_title, meta_description, meta_keywords, skype, address, phone, hotline, email, fax, logo, favico, fanpage, youtube, googlemap, name, description, why_me_label, why_me_content, promotion_label, promotion_content', 'safe', 'on' => 'search'),
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
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'skype' => 'Skype',
            'address' => 'Address',
            'phone' => 'Phone',
            'address2' => 'Address2',
            'phone2' => 'Phone2',
            'address3' => 'Address3',
            'phone3' => 'Phone3',
            'address4' => 'Address4',
            'phone4' => 'Phone4',
            'address5' => 'Address5',
            'phone5' => 'Phone5',
            'address6' => 'Address6',
            'phone6' => 'Phone6',
            'hotline' => 'Hotline',
            'email' => 'Email',
            'fax' => 'Fax',
            'logo' => 'Logo',
            'favico' => 'Favico',
            'fanpage' => 'Fanpage',
            'youtube' => 'Youtube',
            'googlemap' => 'Googlemap',
            'name' => 'Name',
            'description' => 'Description',
            'why_me_label' => 'Why Me Label',
            'why_me_content' => 'Why Me Content',
            'promotion_label' => 'Promotion Label',
            'promotion_content' => 'Promotion Content',
            'news_ids' => 'News Ids'
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
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('skype', $this->skype, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('hotline', $this->hotline, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('favico', $this->favico, true);
        $criteria->compare('fanpage', $this->fanpage, true);
        $criteria->compare('youtube', $this->youtube, true);
        $criteria->compare('googlemap', $this->googlemap, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('why_me_label', $this->why_me_label, true);
        $criteria->compare('why_me_content', $this->why_me_content, true);
        $criteria->compare('promotion_label', $this->promotion_label, true);
        $criteria->compare('promotion_content', $this->promotion_content, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Setting the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
