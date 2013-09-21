<?php

require_once('UI.php');

class UI_Form_Select extends UI {

    protected $label;
    protected $key;
    protected $helpText;
    protected $allowMultiple;
    protected $options;
    protected $defaultOptionKeys;

    public function __construct($label, $key, $helpText = '', $allowMultiple = false) {
        $this->label = $label;
        $this->key = $key;
        $this->helpText = $helpText;
        $this->allowMultiple = $allowMultiple;
        $this->options = array();
        $this->defaultOptionKeys = NULL;
    }

    public function addOption($label, $value) {
        $this->options[] = array($label, $value);
    }

    public function addDefaultOption($key) {
        $this->defaultOptionKeys[$key] = true;
    }

    public function getHTML() {
        $out = '<div class="form-group">';
        $out .= '<label class="col-lg-2 control-label">'.$this->label.'</label>';
        $out .= '<div class="col-lg-10">';
        $out .= '<select';
        if ($this->allowMultiple) {
            $out .= ' multiple="multiple"';
        }
        $out .= ' class="form-control" name="'.$this->key.'">';
        foreach ($this->options as $option) {
            $out .= '<option value="'.htmlspecialchars($option[1]).'"';
            if (isset($this->defaultOptionKeys[$option[1]])) {
                $out .= ' selected="selected"';
            }
            $out .= '>'.htmlspecialchars($option[0]).'</option>';
        }
        $out .= '</select>';
        if ($this->helpText != '') {
            $out .= '<span class="help-block">'.$this->helpText.'</span>';
        }
        $out .= '</div>';
        $out .= '</div>';
        return $out;
    }

}

?>