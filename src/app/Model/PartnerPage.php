<?php
App::uses('AppModel', 'Model');
class PartnerPage extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'partner_page_id';
    public $name = 'PartnerPage';
    public $useTable = 'partner_pages';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Partner' => array(
			'className' => 'Partner',
			'foreignKey' => 'partner_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
