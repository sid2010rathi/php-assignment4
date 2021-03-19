<?php
    class Items {
        private $name;
        private $price;

        function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }

        function set_name($name) {
            $this->name = $name;
        }
        function get_name() {
            return $this->name;
        }

        function set_price($price) {
            $this->price = $price;
        }
        function get_price() {
            return $this->price;
        }
    }
?>