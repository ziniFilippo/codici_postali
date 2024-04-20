<?php
    namespace App\Controllers;
    
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Container\ContainerInterface;

    class CapController {
        private $db;
        protected $container;

        public function __construct(ContainerInterface $container){
            $this->db =  new \PDO('mysql:host=localhost;dbname=CODPOST', 'root', '');
            $this->container = $container;
        }
        public function getCaps(Response $response){
            $qry = "SELECT * FROM CODICE";
            $stmt = $this->db->prepare($qry);
            $stmt->execute();
            $caps = $stmt->fetchAll();
            return $response->withJson($caps);
        }
        public function addCap(Request $request, Response $response){

        }
        public function delCap(Request $request, Response $response){

        }
        public function updateCap(Request $request, Response $response){

        }
    }