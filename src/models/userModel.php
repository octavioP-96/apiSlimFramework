<?php
    namespace App\Models;
    use App\Base\BaseModel;
    class UserModel extends BaseModel {
        public function __construct($db) {
            parent::__construct($db, 'idUsuario', 'usuarios');
        }

        public function listar() {
            return $this->getAll();
        }

        public function obtenerPorId($id) {
            return $this->getById($id);
        }

        public function crearUsuario($usuario){
            return $this->insert($usuario);
        }
    }