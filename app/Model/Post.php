<?php
class Post extends AppModel {
	public $useDbConfig = 'mongo';

	public $validate = array(
		'email' => array(
			array(
				'rule' => 'notempty',
				'message' => '入力してください'
			),
			array(
				'rule' => 'email',
				'message' => 'メールアドレス形式'
			)
		),
		'title' => array(
			array(
				'rule' => 'notempty',
				'message' => '入力してください'
			)
		),
		'body' => array(
			array(
				'rule' => array('minLength', '5'),
				'message' => '5文字以上で入力してください'
			)
		)
	);
}