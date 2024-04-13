<?php
    namespace App\Controllers;

    use Psr\Container\ContainerInterface;

    class CapController {
        private $db;
        protected $container;

        public function __construct(ContainerInterface $container){
//            $this->db =  new \PDO('mysql:host=localhost;dbname=PM', 'root', '');
            $this->container = $container;
            $this->db = new \PDO(
                $container
            )
        }
    }