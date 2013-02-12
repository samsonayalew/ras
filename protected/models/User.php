<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $userName
 * @property string $password
 * @property string $city
 * @property string $phoneNumber
 * @property string $email
 * @property string $role
 * @property string $dateCreated
 */
class User extends CActiveRecord
{
	public $password2;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, lastName, userName, password, phoneNumber, password2', 'required'),
			array('firstName, lastName, userName, password, city, phoneNumber, email', 'length', 'max'=>50),
			array('role', 'length', 'max'=>45),
			array('dateCreated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, firstName, lastName, userName, password, city, phoneNumber, email, role, dateCreated', 'safe', 'on'=>'search'),
			//array('userName','exist'),
			array('email','email'),
			array('password', 'length', 'min'=>8, 'max'=>50, 'on'=>'register, recover'),
			// when in register scenario, password must match password2
			array('password2', 'compare', 'compareAttribute'=>'password', 'on'=>'register'),
			//when in login scenario, password must be authenticated
			//array('password', 'authenticate', 'on'=>'login'),
			//array('password2', 'safe'),
			//array('password', 'compare', 'compareAttribute'=>'password2', 'on'=>'register'),
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
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'userName' => 'User Name',
			'password' => 'Password',
			'city' => 'City',
			'phoneNumber' => 'Phone Number',
			'email' => 'Email',
			'role' => 'Role',
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
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phoneNumber',$this->phoneNumber,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}