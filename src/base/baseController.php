<?php
    namespace App\Base;

    class BaseController{
        protected $container;

        public function __construct($container) {
            $this->container = $container;
        }

        public function get($key) {
            return $this->container->get($key);
        }

        /* public function __call($name, $arguments) {
            $this->get('logger')->info("Method {$method} called");
            if (method_exists($this, $method)) {
                return call_user_func_array([$this, $method], $args);
            }
        } */
    }