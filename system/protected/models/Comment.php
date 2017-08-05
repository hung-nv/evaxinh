<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $avatar
 * @property integer $news_id
 */
class Comment extends CActiveRecord {

    public $oldAvatar, $avatarFile, $inforComment, $newsName;
    
    public function getInforComment() {
        return '<div class="col-md-2 col-sm-4"><p><img src="../uploads/comment/'.$this->avatar.'" style="width:100px;height: auto;" /></p><p>'.$this->name.'</p></div>
                <div class="col-md-10 col-sm-8" style="padding:10px 0;"><p>'.$this->content.'</p></div>';
    }
    
    public function afterFind() {
        $this->oldAvatar = $this->avatar;
        parent::afterFind();
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'comment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('news_id', 'numerical', 'integerOnly' => true),
            array('name, avatar', 'length', 'max' => 255),
            array('content', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, content, avatar, news_id', 'safe', 'on' => 'search'),
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
            'content' => 'Content',
            'avatar' => 'Avatar',
            'news_id' => 'News',
            'newsName' => 'Page'
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
        $criteria->join = 'inner join news as b on a.news_id=b.id';
        $criteria->select = 'a.*, b.title as newsName';

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('news_id', $this->news_id);
        
        $criteria->order = 'id desc';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
