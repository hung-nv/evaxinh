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
 * @property string $location
 * @property string $type
 * @property string $module
 * @property string $direct
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $ordering
 * @property integer $status
 */
class Categories extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $parentName, $parentAlias;

    function getParentName() {
        if ($this->parent_id > 0)
            return $this->findByPk($this->parent_id)->title;
    }
    
    function getParentAlias() {
        if ($this->parent_id > 0)
            return $this->findByPk($this->parent_id)->alias;
    }

    public function tableName() {
        return 'categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, alias, image, location', 'required'),
            array('parent_id, ordering, status', 'numerical', 'integerOnly' => true),
            array('title, alias, image, direct, meta_title, meta_description, meta_keywords', 'length', 'max' => 255),
            array('location', 'length', 'max' => 20),
            array('type', 'length', 'max' => 10),
            array('module', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, alias, parent_id, image, location, type, module, direct, meta_title, meta_description, meta_keywords, ordering, status', 'safe', 'on' => 'search'),
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
            'parent_id' => 'Parent',
            'image' => 'Image',
            'location' => 'Location',
            'type' => 'Type',
            'module' => 'Module',
            'direct' => 'Direct',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'ordering' => 'Ordering',
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
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('module', $this->module, true);
        $criteria->compare('direct', $this->direct, true);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
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
