<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property integer $categories_id
 * @property integer $page_id
 * @property string $name
 * @property string $alias
 * @property integer $parent_id
 * @property string $direct
 * @property string $module
 * @property string $location
 * @property integer $ordering
 * @property string $type
 */
class Menu extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $pageName, $pageAlias, $cateName, $cateAlias, $cateId, $pageId;
    
    function getTitle() {
        switch ($this->type) {
            case 'page':
                return $this->pageName;
                break;
            case 'category':
                return $this->cateName;
                break;
            default:
                return $this->name;
                break;
        }
    }
    
    public function tableName() {
        return 'menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent_id, location, type', 'required'),
            array('categories_id, page_id, parent_id, ordering', 'numerical', 'integerOnly' => true),
            array('name, alias, direct', 'length', 'max' => 255),
            array('module', 'length', 'max' => 100),
            array('location, type', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, categories_id, page_id, name, alias, parent_id, direct, module, location, ordering, type', 'safe', 'on' => 'search'),
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
            'categories_id' => 'Categories',
            'page_id' => 'Page',
            'name' => 'Name',
            'alias' => 'Alias',
            'parent_id' => 'Parent',
            'direct' => 'Direct',
            'module' => 'Module',
            'location' => 'Location',
            'ordering' => 'Ordering',
            'type' => 'Type',
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
        $criteria->join = 'left join categories as b on a.categories_id = b.id left join news as c on a.page_id = c.id && c.is_page = 1';
        $criteria->select = 'a.type,a.name, a.id, a.alias, b.id as cateId, b.title as cateName, b.alias as cateAlias, c.id as pageId, c.title as pageName, c.alias as pageAlias';

        $criteria->compare('a.id', $this->id);
        $criteria->compare('categories_id', $this->categories_id);
        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('a.parent_id', $this->parent_id);
        $criteria->compare('direct', $this->direct, true);
        $criteria->compare('module', $this->module, true);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('type', $this->type, true);
        
        $criteria->order = 'a.ordering';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
