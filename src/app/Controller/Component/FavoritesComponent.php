<?php
App::uses('Component', 'Controller', 'Controllers/Components/SessionComponent');

class FavoritesComponent extends Component {
  
  public $components = array('Auth', 'Session');
  
  public function __construct() {
    
  }
  
  function startup(Controller $controller) {
    foreach ($this->components as $component_name) {
      $controller->Components->load($component_name);
      $this->$component_name = $controller->$component_name;
      /* App::import('Component', $component_name);
       $component_class = "{$component_name}Component";
      $this->$component_name = new $component_class($controller->Components);
      $this->$component_name->startup($controller);*/
    }
  }
  
  public function save(&$model, $fieldname, $value, $userid_field_name = 'user_id', $user_id) {
    if (is_array($value)) {
      foreach($value as $item) {
        $this->save($model, $fieldname, $item, $userid_field_name, $user_id);
      }
      return true;
    }
    $modelname = $model->name;
    $conditions = array($modelname . '.' . $fieldname => $value, $modelname . '.' . $userid_field_name => $user_id);
    if ($model->hasAny($conditions)) return true;
    $data = array($modelname => array(
        $fieldname => $value,
        $userid_field_name => $user_id
    ));
    $model->save($data);
  }
  
  public function moveFromSession($session_name, &$model, $fieldname, $userid_field_name = 'user_id') {
    $user_id = AuthComponent::user('id');
    if ($user_id) {
      if ($this->Session->check($session_name)) {
        $an_array = $this->Session->read($session_name);
        $this->save($model, $fieldname, $an_array, $userid_field_name, $user_id);
      }
    }
  }
  
  public function add($session_name, &$model, $fieldname, $value, $userid_field_name = 'user_id') {
    $value = (int)$value;
    if ($value > 0) {
      $user_id = AuthComponent::user('id');
      if ($user_id) {
        $this->save($model, $fieldname, $value, $userid_field_name, $user_id);
      } else {
        $an_array = array();
        if ($this->Session->check($session_name)) {
          $an_array = $this->Session->read($session_name); //merging arrays
          if (in_array($value, $an_array, true) === false) {
            array_push($an_array, $value);
          }
        } else {
          array_push($an_array, $value);
        }
        $this->Session->write($session_name, $an_array);
      }
      return true;
    }
    return false;
  }
  
  
}