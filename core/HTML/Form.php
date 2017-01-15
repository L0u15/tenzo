<?php

namespace Core\HTML;

/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form {

    /**
     * @var array Données utilisées par le formulaire
     */
    private $data;

    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * @param array $data Données utilisées par le formulaire
     */
    public function __construct($data = array()) {
        $this->data = $data;
    }

    /**
     * @param string $html Code HTML à entourer
     */
    protected function surround($html) {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * @param string $index Index de  la valeur à récupérer
     * @return string
     */
    protected function getValue($index) {
        if (is_object($this->data)) {
            return $this->data->$index;
        } else {
            return isset($this->data[$index]) ? $this->data[$index] : null;
        }
    }

    /**
     * @param string $name
     * @param string $label
     * @param [] $options 
     * @return string
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
                        '<label>' . $label . '</label>' .
                        '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    /**
     * @param string $name
     * @param string $label
     * @return string
     */
    public function password($name, $label) {
        return $this->surround(
                        '<label>' . $label . '</label>' .
                        '<input type="password" name="' . $name . '" value="">'
        );
    }

    /**
     * @return string
     */
    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }

}
