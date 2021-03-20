<?php
    class Items {
        private $name;
        private $price;

        function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }

        function setName($name) {
            $this->name = $name;
        }
        function getName() {
            return $this->name;
        }

        function setPrice($price) {
            $this->price = $price;
        }
        function getPrice() {
            return $this->price;
        }
    }
?>