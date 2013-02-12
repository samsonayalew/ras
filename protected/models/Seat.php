<?php

/**
 * This is the model class for table "seat".
 *
 * The followings are the available columns in table 'seat':
 * @property integer $id
 * @property integer $rSchedule
 * @property integer $no
 * @property string $seatCondition
 * @property string $dateCreted
 *
 * The followings are the available model relations:
 * @property Schedule $rSchedule0
 */
class Seat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Seat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rSchedule, no', 'numerical', 'integerOnly'=>true),
			array('seatCondition', 'length', 'max'=>8),
			array('dateCreted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rSchedule, no, seatCondition, dateCreted', 'safe', 'on'=>'search'),
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
			'rSchedule0' => array(self::BELONGS_TO, 'Schedule', 'rSchedule'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rSchedule' => 'R Schedule',
			'no' => 'No',
			'seatCondition' => 'Seat Condition',
			'dateCreted' => 'Date Creted',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('rSchedule',$this->rSchedule);
		$criteria->compare('no',$this->no);
		$criteria->compare('seatCondition',$this->seatCondition,true);
		$criteria->compare('dateCreted',$this->dateCreted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}