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
 * @property string $hotline
 * @property string $email
 * @property string $fax
 * @property string $logo
 * @property string $favico
 * @property string $fanpage
 * @property string $youtube
 * @property string $googlemap
 */
class Site extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public function getIdYoutube() {
        return $this->getYTid($this->youtube);
    }

    function getYTid($ytURL) {

        $ytvIDlen = 11; // This is the length of YouTube's video IDs
        // The ID string starts after "v=", which is usually right after
        // "youtube.com/watch?" in the URL
        $idStarts = strpos($ytURL, "?v=");

        // In case the "v=" is NOT right after the "?" (not likely, but I like to keep my
        // bases covered), it will be after an "&":
        if ($idStarts === FALSE)
            $idStarts = strpos($ytURL, "&v=");
        // If still FALSE, URL doesn't have a vid ID
        if ($idStarts === FALSE)
            die("YouTube video ID not found. Please double-check your URL.");

        // Offset the start location to match the beginning of the ID string
        $idStarts +=3;

        // Get the ID string and return it
        $ytvID = substr($ytURL, $idStarts, $ytvIDlen);

        return $ytvID;
    }

	public function tableName()
	{
		return 'site';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('meta_title, meta_description, meta_keywords', 'required'),
			array('meta_title, meta_description, meta_keywords, address, logo, favico, fanpage, youtube, googlemap', 'length', 'max'=>255),
			array('skype, phone, hotline, email, fax', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, meta_title, meta_description, meta_keywords, skype, address, phone, hotline, email, fax, logo, favico, fanpage, youtube, googlemap', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'skype' => 'Skype',
			'address' => 'Address',
			'phone' => 'Phone',
			'hotline' => 'Hotline',
			'email' => 'Email',
			'fax' => 'Fax',
			'logo' => 'Logo',
			'favico' => 'Favico',
			'fanpage' => 'Fanpage',
			'youtube' => 'Youtube',
			'googlemap' => 'Googlemap',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('hotline',$this->hotline,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('favico',$this->favico,true);
		$criteria->compare('fanpage',$this->fanpage,true);
		$criteria->compare('youtube',$this->youtube,true);
		$criteria->compare('googlemap',$this->googlemap,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Site the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
