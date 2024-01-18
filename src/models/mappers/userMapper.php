<?php
    namespace App\Models\Mapper;

    class EntityUser {
        public $idUsuario;
        public $nombre;
        public $correo;
        public $contrasenia; 

        public function __construct($idUsuario, $nombre, $correo, $contrasenia) {
            $this->idUsuario = $idUsuario;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->contrasenia = $contrasenia;
        }
    }

    class ViewUser {
        public $idUsuario;
        public $nombre;
        public $correo;

        public function __construct($idUsuario, $nombre, $correo) {
            $this->idUsuario = $idUsuario;
            $this->nombre = $nombre;
            $this->correo = $correo;
        }
    }

    class UserMapper {
        public function __construct() {
        }

        public function mapEntityToView($entity) {
            return new ViewUser(
                $entity->idUsuario,
                $entity->nombre,
                $entity->correo
            );
        }

        public function mapEntityToEntity($entity) {
            return new EntityUser(
                $entity->idUsuario,
                $entity->nombre,
                $entity->correo,
                $entity->contrasenia
            );
        }

        public function mapViewToEntity($view) {
            return new EntityUser(
                $view->idUsuario,
                $view->nombre,
                $view->correo,
                $view->contrasenia
            );
        }
    }