<?php

namespace Core\HTML;

class BootstrapForm extends Form {

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html) {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param string $name
     * @param string $label
     * @param [] $options 
     * @return string
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        if ($label != '') {
            $label = '<label>' . $label . '</label>';
        }
        if ($type === 'textarea') {
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else if ($type === 'disabled') {
            $input = '<input name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control" disabled>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';
        }
        return $this->surround($label . $input);
    }

    /**
     * @param string $name
     * @param string $label
     * @return string
     */
    public function password($name, $label) {
        return $this->surround(
                        '<label>' . $label . '</label>' .
                        '<input type="password" name="' . $name . '" value="" class="form-control">'
        );
    }

    /**
     * @return string
     */
    public function submit() {
        return $this->surround(
                        '<button type="submit" class="btn btn-primary">Envoyer</button>'
        );
    }

    public function select($name, $label, $options) {
        if ($label != '') {
            $label = '<label>' . $label . '</label>';
        }
        $input = '<select class="form-control" name="' . $name . '">';
        foreach ($options as $k => $v) {
            $attributes = '';
            if ($k == $this->getValue($name)) {
                $attributes = 'selected';
            }
            $input .="<option value='$k' $attributes>$v</option>";
        }
        $input .='</select>';
        return $this->surround($label . $input);
    }

}
