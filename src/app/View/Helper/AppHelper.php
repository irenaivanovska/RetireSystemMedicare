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
class AppHelper extends Helper {

  public function toUrl($filename, $ext, $pathPrefix) {
    if (DS == '\\') {
      $filename = str_replace('\\', '/', $filename);
    }
    return $this->assetUrl($filename, array('pathPrefix' => $pathPrefix, 'ext' => $ext, 'fullBase' => false));
  }

  public function toUrlCSS($filename) {
    return $this->toUrl($filename, '.css', Configure::read('App.cssBaseUrl'));
  }

  public function toUrlJS($filename) {
    return $this->toUrl($filename, '.js', Configure::read('App.jsBaseUrl'));
  }

  public function toPathWWW($aRelativePath = '') {
    $path = rtrim(ROOT, DS) . DS . rtrim(APP_DIR, DS) . DS . rtrim(WEBROOT_DIR, DS);
    if ($aRelativePath > '') {
      if (DS == '\\') {
        $aRelativePath = str_replace('/', '\\', $aRelativePath);
      }
      $path .= DS . ltrim($aRelativePath, DS);
    }
    return $path;
  }
  
  public function toPathExtended($prefix, $aRelativePath, $ext) {
    return $this->toPathWWW($prefix . DS . ltrim($aRelativePath, DS) . $ext);
  }

  public function getCurrentController() {
    return $this->params['controller'];
  }

  public function getCurrentAction() {
    return $this->params['action'];
  }

  public function getCurrentArgs() {
    return $this->params['pass'];
  }

} ?>