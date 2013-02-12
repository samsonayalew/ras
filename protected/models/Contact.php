<?php

/**
 * 
 * @author samson ayalew
 *
 */
class Contact extends CFormModel
{
	public $email;
	public $subject;
	public $body;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email, subject', 'required'),
			// email has an email validation
			array('email', 'email'),
		);
	}
}
