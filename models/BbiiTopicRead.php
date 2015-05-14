 <?php

namespace frontend\modules\bbii\models;

use frontend\modules\bbii\models\BbiiAR;

/**
 * This is the model class for table "bbii_topic_read".
 *
 * The followings are the available columns in table 'bbii_topic_read':
 * @property string $user_id
 * @property string $data
 */
class BbiiTopicRead extends BbiiAR
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BbiiTopicRead the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'bbii_topic_read';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, data', 'required'),
            array('user_id', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, data', 'safe', 'on' => 'search'),
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
     * @return array customized attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return array(
            'user_id' => 'User',
            'data' => 'Data',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return ActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('user_id',$this->user_id,true);
        $criteria->compare('data',$this->data,true);

        return new ActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
} 