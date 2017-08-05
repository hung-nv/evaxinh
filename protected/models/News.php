<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $tag
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $image
 * @property string $description
 * @property string $content
 * @property string $keywords
 * @property string $video_youtube
 * @property integer $view
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property integer $hot
 * @property string $author
 * @property integer $is_page
 * @property integer $is_explain
 * @property integer $is_question
 * @property integer $status
 */
class News extends CActiveRecord {

    public $parentId, $parentName, $parentAlias, $grandId;
    public $tName, $tIntro, $tAvatar;

    /**
     * @return string the associated database table name
     */
    function setUrl() {
        if ($this->is_page == 1)
            $url = Yii::app()->createUrl('news/page', array('alias' => $this->alias));
        else if ($this->is_question == 1)
            $url = Yii::app()->createUrl('news/question', array('alias' => $this->alias));
        else
            $url = Yii::app()->createUrl('news/view', array('alias' => $this->alias));
        return $url;
    }

    public function getIdYoutube() {
        return $this->getYTid($this->video_youtube);
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

    function setImageUrl() {
        if (isset($this->image) && $this->image) {
            return Yii::app()->request->baseUrl . '/uploads/news/' . $this->image;
        }
    }

    function setShortDescription($leng = null) {
        if(!$leng)
            $leng = 150;
        $array = explode(' ', substr(strip_tags($this->description), 0, $leng));
        array_pop($array);
        return implode(' ', $array) . '...';
    }

    function setShortTitle($leng) {
        $title = substr(strip_tags($this->title), 0, $leng);
        $array = explode(' ', $title);
        array_pop($array);
        return implode(' ', $array) . '...';
    }

    function setDescription() {
        if (isset($this->description) && $this->description)
            return $this->description;
        else {
            $desc = substr(strip_tags($this->content), 0, 300);
            $arDesc = explode(' ', $desc);
            array_pop($arDesc);
            return implode(' ', $arDesc) . '[...]';
        }
    }

    function setDate() {
        return date('M d,Y', strtotime($this->created_datetime));
    }

    public function tableName() {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, alias, tag, image, description, content, view, created_datetime', 'required'),
            array('view, hot, is_page, is_explain, status', 'numerical', 'integerOnly' => true),
            array('title, alias, tag, meta_title, meta_description, meta_keywords, image, keywords', 'length', 'max' => 255),
            array('author', 'length', 'max' => 50),
            array('updated_datetime', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, alias, tag, meta_title, meta_description, meta_keywords, image, description, content, keywords, view, created_datetime, updated_datetime, hot, author, is_page, is_explain, status', 'safe', 'on' => 'search'),
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
            'title' => 'Title',
            'alias' => 'Alias',
            'tag' => 'Tag',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'image' => 'Image',
            'description' => 'Description',
            'content' => 'Content',
            'keywords' => 'Keywords',
            'view' => 'View',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'hot' => 'Hot',
            'author' => 'Author',
            'is_page' => 'Is Page',
            'is_explain' => 'Is Explain',
            'is_question' => 'Is Question',
            'status' => 'Status',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('tag', $this->tag, true);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('keywords', $this->keywords, true);
        $criteria->compare('view', $this->view);
        $criteria->compare('created_datetime', $this->created_datetime, true);
        $criteria->compare('updated_datetime', $this->updated_datetime, true);
        $criteria->compare('hot', $this->hot);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('is_page', $this->is_page);
        $criteria->compare('is_explain', $this->is_explain);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
