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
            $newCap = $request->getParsedBody();
            $cap = (int)$newCap['cap'];
            $regione = $newCap['regione'];
            $provincia = $newCap['provincia'];
            $qry = "INSERT INTO CODICE (CAP,REGIONE,PROVINCIA) VALUES (?,?,?);";
            $stmt = $this->db->prepare($qry);
            $stmt->bindParam(1,$cap, \PDO::PARAM_INT);
            $stmt->bindParam(2,$regione, \PDO::PARAM_STR);
            $stmt->bindParam(3,$provincia,\PDO::PARAM_STR);
            $stmt->execute();
            return $response->withRedirect('get',301);
        }
        public function delCap(Request $request, Response $response){
            $cap = $request->getAttribute('id');
            $qry = "DELETE FROM CODICE WHERE CAP = ?;";
            $stmt = $this->db->prepare($qry);
            $stmt->bindParam(1,$cap, \PDO::PARAM_INT);
            $stmt->execute();
            return $response->withRedirect('get',301);
        }
        public function updateCap(Request $request, Response $response){
            $newCap = $request->getParsedBody();
            $cap = (int)$request->getAttribute('id');
            $regione = $newCap['regione'];
            $provincia = $newCap['provincia'];
            $qry = "UPDATE CODICE SET REGIONE = ?, PROVINCIA = ? WHERE CAP = ?";
            $stmt = $this->db->prepare($qry);
            $stmt->bindParam(1,$regione, \PDO::PARAM_STR);
            $stmt->bindParam(2,$provincia,\PDO::PARAM_STR);
            $stmt->bindParam(3,$cap, \PDO::PARAM_INT);
            $stmt->execute();
            return $response->withRedirect('/www/api/get',301);
        }
    }