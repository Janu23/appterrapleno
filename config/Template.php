<?php
class Template {
  protected $template_dir = '../view/template/';
  protected $vars = array();
  /**
   * Constructor
   */
  public function __construct($template_dir = null) {
    if ($template_dir !== null) {
      $this->template_dir = $template_dir;
    }
  }
  /**
   * Function responsible for get the template
   */
  public function render($template_file) {
    if (file_exists($this->template_dir.$template_file)) {
      include $this->template_dir.$template_file;
    } else {
      throw new Exception('no template file ' . $template_file . ' present in directory ' . $this->template_dir);
    }
  }
  /**
   * Set vars
   */
  public function __set($name, $value) {
    $this->vars[$name] = $value;
  }
  /**
   * Get vars
   */
  public function __get($name) {
    return $this->vars[$name];
  }

}

?>