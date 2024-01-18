<?php
namespace App\Controllers;

use App\Base\BaseController;
use App\Models\UserModel;
use App\Base\ResponseModel as RM;

class UserController extends BaseController {
    private $logger;
    private $db;
    private $userModel;

    public function __construct($container) {
        parent::__construct($container);
        $this->logger = $this->get('logger');
        $this->db = $this->get('db');
        $this->userModel = new UserModel($this->db);
    }

    public function index($request, $response, $args) {
        $response->getBody()->write(RM::SUCCESS("Bienvenido a API REST v1.0"));
    }

    public function getUsers($request, $response, $args) {
        try{
            $users = $this->userModel->listar();
            $response->getBody()->write(RM::SUCCESS($users)); 
        }catch(\Exception $ex){
            $this->logger->error($ex->getMessage());
            $response->getBody()->write(RM::ERROR('Error al obtener usuarios'));
        }
    }

    public function getUser($request, $response, $args) {
        try{
            $id = $args['id'];
            $user = $this->userModel->obtenerPorId($id);
            $response->getBody()->write(RM::SUCCESS($user)); 
        }catch(\Exception $ex){
            $this->logger->error($ex->getMessage());
            $response->getBody()->write(RM::ERROR('Error al obtener usuario'));
        }
    }

    public function createUser($request, $response, $args) {
        try {
            $data = $request->getParsedBody();
            $user = $this->userModel->crearUsuario($data);
            $response->getBody()->write(RM::SUCCESS($user));
        } catch (\Exception $ex) {
            $this->logger->error($ex->getMessage());
            $response->getBody()->write(RM::ERROR('Error al crear usuario'));
        }
    }
}