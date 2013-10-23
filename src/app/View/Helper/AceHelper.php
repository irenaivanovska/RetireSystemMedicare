

<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AceHelper extends Helper {
  
  public $helpers = array('Html', 'Form');
  protected $defaultClass = 'TitledForm';
  
  public function create($model, $title, $options) {
    if (!isset($options['class'])) {
      $options['class'] = $this->defaultClass;
    }
    $html = $this->Form->create($model, $options);
    if ($title > '') {
      $html .= "\n\t" . '<div class="title"><span>' . $title . '<span></div>';  
    }
    $html .= "\n\t" . '<div class="content">';
    return $html;
  }
  
  public function end($options = null) {
    return '</div>' . $this->Form->end($options);
  }
}
