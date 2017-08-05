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
 * @property integer $view
 * @property integer $video_youtube
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property integer $hot
 * @property string $author
 * @property integer $is_page
 * @property integer $is_products
 * @property integer $is_question
 * @property integer $is_explain
 * @property integer $status
 * @property integer $teacher_id
 * @property integer $old_price
 * @property integer $new_price
 * @property string $open_datetime
 */
class News extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $date, $parent;
    public $oldImage, $imgFile;
    public $oldAlias;
    public $notPage = true;
    public $action;

    public function afterFind() {
        $this->oldImage = $this->image;
        $this->oldAlias = $this->alias;
        return parent::afterFind();
    }

    public function beforeSave() {
        if ($this->alias == '')
            $this->alias = $this->convertLink($this->title);
        return parent::beforeSave();
    }

    function convertLink($string) {
        $a = array("\\", '*', '^', '`', '~', '$', 'ä', '%', ' - ', '\"', '#', '…', 'Ấ', "'", '"', ")", "(", "ễ", ";", ",", "&", "&quot;", "“", "”", "/", "Á", "À", "Ả", "Ã", "Ạ", "Ó", "Ò", "Ỏ", "Õ", "Ọ", "Ă", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Ô", "Ố", "Ồ", "Ổ", "Ỗ", "Ộ", "Â", "Ã", "Á", "À", "Ả", "Ẫ", "Ậ", "Ơ", "Ớ", "Ờ", "Ở", "Ỡ", "Ợ", "É", "È", "Ẻ", "Ẽ", "Ẹ", "Ú", "Ù", "Ủ", "Ũ", "Ụ", "Ê", "Ễ", "Ề", "Ể", "Ệ", "Ư", "Ứ", "Ừ", "Ử", "Ữ", "Ự", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ý", "Ỳ", "Ỷ", "Ỹ", "Ỵ", "Đ", "á", "à", "ả", "ã", "ạ", "ó", "ò", "ỏ", "õ", "ọ", "ă", "ắ", "ằ", "ẳ", "ẵ", "ặ", "ô", "ố", "ồ", "ổ", "ỗ", "ộ", "â", "ã", "ấ", "ầ", "ẩ", "ẫ", "ậ", "ơ", "ớ", "ờ", "ở", "ỡ", "ợ", "é", "è", "ẻ", "ê", "ế", "ề", "ệ", "ẽ", "ẹ", "ú", "ù", "ủ", "ũ", "ụ", "ê", "ẽ", "ề", "ể", "ệ", "ư", "ứ", "ừ", "ử", "ữ", "ự", "í", "ì", "ỉ", "ĩ", "ị", "ý", "ỳ", "ỷ", "ỹ", "ỵ", "đ", "!", "@", "?", ".", ":");
        $b = array('', '', '', '', '', '', 'a', '', '', '', '', '', '', '', '', "", "", "e", "", "", "", "", "", "", " ", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "u", "i", "i", "i", "i", "i", "y", "y", "y", "y", "y", "d", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "a", "a", "a", "a", "a", "a", "a", "o", "o", "o", "o", "o", "o", "e", "e", "e", "e", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "e", "e", "e", "e", "e", "u", "u", "u", "u", "u", "u", "i", "i", "i", "i", "i", "y", "y", "y", "y", "y", "d", "", "", "", "", "" . "");
        $string = strtolower(str_replace($a, $b, $string));
        $string = preg_replace('/\s{2}+/', ' ', $string);
        $string = str_replace(" ", "-", $string);
        $string = preg_replace('/\-{2}+/', '-', $string);
        return $string;
    }

    function getListCategory($option = NULL) {
        $return = array();
        $cmd = Yii::app()->db->createCommand('select id,title,alias from categories where status=1 && parent_id=0');
        $data = $cmd->queryAll();
        if (isset($option) && $option == 1)
            $return[''] = 'Select...';
        if (isset($data) && $data) {
            foreach ($data as $i) {
                $cmdSub = Yii::app()->db->createCommand('select id,title,alias from categories where status=1 && parent_id=' . $i['id']);
                $dataSub = $cmdSub->queryAll();
                if (isset($dataSub) && $dataSub) {
                    foreach ($dataSub as $j) {
                        $return[$i['title']][$j['alias']] = $j['title'];
                    }
                } else {
                    $return[$i['alias']] = $i['title'];
                }
            }
        }
        return $return;
    }
    
    function getListParentPage() {
        $return = array();
        $cmd = Yii::app()->db->createCommand('select id,title,alias from categories where status=1 && parent_id=0');
        $data = $cmd->queryAll();
        if (isset($data) && $data) {
            foreach ($data as $i) {
                $cmdSub = Yii::app()->db->createCommand('select id,title,alias from categories where status=1 && parent_id=' . $i['id']);
                $dataSub = $cmdSub->queryAll();
                if (isset($dataSub) && $dataSub) {
                    $child = array();
                    foreach ($dataSub as $j) {
                        $cmdGrand = Yii::app()->db->createCommand('select id,title,alias from categories where status=1 && parent_id=' . $i['id']);
                        $dataGrand = $cmdGrand->queryAll();
                        if(isset($dataGrand) && $dataGrand) {
                            $grand = array();
                            foreach($dataGrand as $k) {
                                $grand[] = $k;
                            }
                        }
                        $child[] = array(
                            'id' => $j['id'],
                            'alias' => $j['alias'],
                            'title' => $j['title'],
                            'grand' => $grand
                        );
                    }
                    
                    $return[] = array(
                        'id' => $i['id'],
                        'alias' => $i['alias'],
                        'title' => $i['title'],
                        'child' => $child
                    );
                } else {
                    $return[] = $i;
                }
            }
        }
        return $return;
    }

    function getParent() {
        if (isset($this->tag) && $this->tag) {
            $category = Categories::model()->findByAttributes(array('alias' => $this->tag));
            if (isset($category) && $category)
                return $category->title;
        }else {
            return '';
        }
    }

    function getTitle() {
        return '<p style="font-family: Arial;font-size: 13px;font-weight: bold;">' . $this->title . '</p><p style="padding-left:20px;font-size:13px;">- ' . $this->description . '</p>';
    }
    
    function getInforPage() {
        $msgHeader = '';
        $msgFirst = '';
        $msgSecond = '';
        $msgTeacher = '';
        $title = '<p style="font-family: Arial;font-size: 13px;font-weight: bold;">' . $this->title . ' <a target="_blank" style="color: red;font-size: 12px;padding-left: 10px;" href="http://'.$_SERVER['SERVER_NAME'].'/page/'.$this->alias.'">[Xem Trang...]</a></p>';
        $header = ExplainData::model()->findByAttributes(array('news_id' => $this->id, 'location' => 1));
        if(isset($header) && $header) {
            $msgHeader = '<p style="padding-left:20px;font-size:13px;"><span style="color:red;">- [Header]</span></p>
                <ul style="list-style-type: disc; font-size:13px; padding-left:55px;"><li>'.$header->label.'
                    <a class="label label-primary explain-action" href="'.Yii::app()->createUrl('explainData/update', array('id' => $header->id)).'">Cập nhật</a>
                    <a onclick="return confirm(`Do you want to delete?`)" class="label label-primary explain-action" href="'.Yii::app()->createUrl('explainData/delete', array('id' => $header->id)).'">Xóa</a>
                        </li></ul>';
        }
        
        $first = ExplainData::model()->findAllByAttributes(array('news_id' => $this->id, 'location' => 2));
        if(isset($first) && $first) {
            $msgFirst = '<p style="padding-left:20px;font-size:13px;"><span style="color:red;">- [First After Content]</span></p>';
            foreach($first as $i) {
                $si[] = '<li>'.$i->label.' <a class="label label-primary explain-action" href="'.Yii::app()->createUrl('explainData/update', array('id' => $i->id)).'">Cập nhật</a>
                    <a onclick="return confirm(`Do you want to delete?`)" class="label label-primary explain-action" href="'.Yii::app()->createUrl('explainData/delete', array('id' => $i->id)).'">Xóa</a></li>';
            }
            $msgFirst .= '<ul style="list-style-type: disc; font-size:13px; padding-left:55px;line-height:1.8;">'.  implode('', $si).'</ul>';
        }
        
        $second = ExplainData::model()->findAllByAttributes(array('news_id' => $this->id, 'location' => 3));
        if(isset($second) && $second) {
            $msgSecond = '<p style="padding-left:20px;font-size:13px;"><span style="color:red;">- [Second After Content]</span></p>';
            foreach($second as $j) {
                $sj[] = '<li>'.$j->label.'<a class="label label-primary explain-action" href="'.Yii::app()->createUrl('explainData/update', array('id' => $j->id)).'">Cập nhật</a>
                    <a onclick="return confirm(`Do you want to delete?`)" class="label label-primary explain-action" href="'.Yii::app()->createUrl('explainData/delete', array('id' => $j->id)).'">Xóa</a></li>';
            }
            $msgSecond .= '<ul style="list-style-type: disc; font-size:13px; padding-left:55px;line-height:1.8;">'.  implode('', $sj).'</ul>';
        }
        
        if(isset($this->teacher_id) && $this->teacher_id)
            $msgTeacher = '<p style="padding-left:20px;font-size:13px;"><span style="color:red;">- Teacher: </span>'.Teacher::model()->findByPk($this->teacher_id)->name.'</p>';
        
        return $title.$msgHeader.$msgFirst. $msgSecond.$msgTeacher;
    }

    function getImage() {
        if (isset($this->image) && $this->image) {
            return '<span class="label label-primary">Available</span><div style="text-align: center; margin-top:10px;"><a class="img-ok" href="../uploads/news/' . $this->image . '" data-lightbox="roadtrip">XEM ẢNH</a></div>';
        } else {
            return '<span class="label label-danger">Empty</span>';
        }
    }
    
    function setExplain() {
        if($this->is_explain == 1)
            return '<a class="label label-primary" href="'.Yii::app()->createUrl('explainData/create', array('news_id' => $this->id)).'">Tạo dữ liệu landing page</a>'.$this->setTeacher().$this->setComment();
        else
            return '<a class="label label-primary" href="'.Yii::app()->createUrl('explainData/create', array('news_id' => $this->id)).'">Tạo dữ liệu landing page</a>';
    }
    
    function setComment() {
        return '<a style="margin-left:10px;" class="label label-success" href="'.Yii::app()->createUrl('comment/create', array('news_id' => $this->id)).'">Tạo Comment</a>';
    }
    
    function setTeacher() {
        return '<a class="label label-warning" style="cursor: pointer; margin-left:10px;" data-toggle="modal" 
            data-target="#modal-dialog-'.$this->id.'">Set Teacher</a>
            <div class="modal fade bs-example-modal-sm" id="modal-dialog-'.$this->id.'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Set Teacher</h4>
                  </div>
                  <form class="form-horizontal" id="vip-form" data-toggle="validator" role="form" method="post">
                  <input name="Teacher[id]" type="hidden" value="'.$this->id.'">
                  <div class="modal-body">
                       <div class="box-body">
                          <div class="form-group" style="margin-bottom:15px; display: block;">
                            <label class="col-sm-3 control-label">Page</label>
                            <div class="col-sm-9">
                              <input name="Teacher[title]" type="text" value="'.$this->title.'" placeholder="Title" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="form-group" style="display:block;">
                            <label class="col-sm-3 control-label">Teacher</label>
                            <div class="col-sm-9" style="text-align:left;">
                              <select class="form-control" name="Teacher[teacher_id]" >
                              '.$this->getListTeacher().'
                              </select>
                            </div>
                          </div>
                        </div>
                  </div>
                  <div class="modal-footer" style="padding:10px 20px 10px; margin-top:0;">
                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                  </div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            
            <script type="text/javascript">
            $("#vip-form").on("submit", function(e) {
                
            });
            </script>
            ';
    }
    
    function getListTeacher() {
        $teacher = Teacher::model()->findAll();
        if(isset($teacher) && $teacher) {
            foreach($teacher as $item) {
                $i[] = '<option value="'.$item->id.'">'.$item->name.'</option>';
            }
            $return = implode('', $i);
        }
        return $return;
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
        $rules = array(
            array('title, content', 'required', 'message' => '{attribute} không được để trống!'),
            array('view, hot, status, is_page, old_price, new_price', 'numerical', 'integerOnly' => true),
            array('title, alias, tag, meta_title, meta_description, meta_keywords, image, keywords, video_youtube', 'length', 'max' => 255),
            array('author', 'length', 'max' => 50),
            array('updated_datetime', 'safe'),
            array('alias', 'validateAlias'),
            array('image', 'file', 'allowEmpty' => true, 'types' => Yii::app()->params['imageType']),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('title, tag, keywords, created_datetime, author, status, date, is_page, is_question, is_explain', 'safe', 'on' => 'search'),
        );
        
        if($this->notPage)
            $rules[] = array('description', 'required');
        
        if ($this->isNewRecord && Yii::app()->controller->action->id == 'create') {
            $rules[] = array('image', 'file', 'allowEmpty' => false, 'types' => Yii::app()->params['imageType'], 'on' => 'insert', 'message' => 'Chọn ảnh đại diện!');
        }

        return $rules;
    }

    public function validateAlias($attribute, $params) {
        if ($this->isNewRecord) {
            if ($this->findByAttributes(array('alias' => $this->alias)))
                $this->addError($attribute, 'Already Exits! Please try again.');
        }else {
            if ($this->findByPk($this->id)->alias != $this->alias && $this->findByAttributes(array('alias' => $this->alias)))
                $this->addError($attribute, 'Already Exits! Please try again.');
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
            'title' => 'Tiêu đề',
            'alias' => 'Alias',
            'tag' => 'Danh mục cha',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'image' => 'Ảnh đại diện',
            'description' => 'Mô tả ngắn',
            'content' => 'Nội dung',
            'keywords' => 'Từ khóa',
            'view' => 'Lượt xem',
            'created_datetime' => 'Ngày tạo',
            'updated_datetime' => 'Updated Datetime',
            'hot' => 'Hot',
            'author' => 'Tác giả',
            'status' => 'Trạng thái',
            'video_youtube' => 'Video Youtube',
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
        if (isset($this->title) && $this->title) {
            $criteria->compare('title', $this->title, true);
            $criteria->compare('keywords', $this->title, true, 'OR');
        }
        $criteria->compare('tag', $this->tag, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('status', $this->status);

        $criteria->compare('is_page', $this->is_page);
        $criteria->compare('is_question', $this->is_question);
        $criteria->compare('is_explain', $this->is_explain);

        $criteria->order = 'id desc';

        if (isset($this->date) && $this->date) {
            $array = explode('-', $this->date);
            if (isset($array) && $array) {
                $exp = '/\d{2}\/\d{2}\/\d{4}/';
                if (preg_match($exp, trim($array[0])) && preg_match($exp, trim($array[1]))) {
                    $begin = date('Y-m-d', strtotime(trim($array[0])));
                    $end = date('Y-m-d', strtotime(trim($array[1])));
                    if ($begin == $end) {
                        if (isset($begin) && $begin)
                            $criteria->compare('created_datetime', '>' . $begin);
                    } else {
                        if (isset($begin) && $begin)
                            $criteria->compare('created_datetime', '>' . $begin);
                        if (isset($end) && $end)
                            $criteria->compare('created_datetime', '<' . $end);
                    }
                }
            }
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 20)
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
