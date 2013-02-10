<?php

/**
 * This is the model class for table "file".
 *
 * The followings are the available columns in table 'file':
 * @property integer $id
 * @property string $name
 * @property string $extension
 * @property string $type
 * @property integer $size
 * @property integer $account_id
 *
 * The followings are the available model relations:
 * @property Account $account
 * 
 * @property string directoryPath
 * @property string path
 */
class File extends CActiveRecord
{
	public $file;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return File the static model class
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
		return 'file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file', 'file'),
// 			array('name, extension, type, size, account_id', 'required'),
// 			array('size, account_id', 'numerical', 'integerOnly'=>true),
// 			array('name, extension, type', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, extension, type, size, account_id', 'safe', 'on'=>'search'),
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
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'extension' => 'Extension',
			'type' => 'Type',
			'size' => 'Size',
			'account_id' => 'Account',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('account_id',$this->account_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getDirectoryPath()
	{
		return Yii::app()->basePath.DIRECTORY_SEPARATOR.
			Yii::app()->controller->module->filesPath.DIRECTORY_SEPARATOR.
			$this->id.DIRECTORY_SEPARATOR;
	}

	public function getPath()
	{
		return $this->getDirectoryPath().DIRECTORY_SEPARATOR.
			$this->name;
	}
}