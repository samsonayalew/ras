<?php

/**
 * This is the model class for table "schedule".
 *
 * The followings are the available columns in table 'schedule':
 * @property integer $id
 * @property integer $rMovie
 * @property integer $rCinema
 * @property string $dayOfTheWeek
 * @property string $startTime
 * @property string $endTime
 * @property string $dateCreated
 *
 * The followings are the available model relations:
 * @property Cinema $rCinema0
 * @property Movie $rMovie0
 * @property Seat[] $seats
 */
class Schedule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Schedule the static model class
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
		return 'schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rMovie, rCinema', 'required'),
			array('rMovie, rCinema', 'numerical', 'integerOnly'=>true),
			array('startTime, endTime', 'length', 'max'=>15),
			array('dayOfTheWeek, dateCreated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rMovie, rCinema, dayOfTheWeek, startTime, endTime, dateCreated', 'safe', 'on'=>'search'),
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
			'rCinema0' => array(self::BELONGS_TO, 'Cinema', 'rCinema'),
			'rMovie0' => array(self::BELONGS_TO, 'Movie', 'rMovie'),
			'seats' => array(self::HAS_MANY, 'Seat', 'rSchedule'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rMovie' => 'R Movie',
			'rCinema' => 'R Cinema',
			'dayOfTheWeek' => 'Day Of The Week',
			'startTime' => 'Start Time',
			'endTime' => 'End Time',
			'dateCreated' => 'Date Created',
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
		$criteria->compare('rMovie',$this->rMovie);
		$criteria->compare('rCinema',$this->rCinema);
		$criteria->compare('dayOfTheWeek',$this->dayOfTheWeek,true);
		$criteria->compare('startTime',$this->startTime,true);
		$criteria->compare('endTime',$this->endTime,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}