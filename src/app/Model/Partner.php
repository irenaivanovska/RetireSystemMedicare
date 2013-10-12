<?php
App::uses('AppModel', 'Model');
/**
 * Partner Model
 *
 * @property Partner $Partner
 * @property PartnerPage $PartnerPage
 * @property Partner $Partner
 */
class Partner extends AppModel {
	public $primaryKey = 'partner_id';
    public $name = 'Partner';
    public $useTable = 'partners';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
		'PartnerPage' => array(
			'className' => 'PartnerPage',
			'foreignKey' => 'partner_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
