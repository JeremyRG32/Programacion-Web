<?php
    class obra{
        public $codigo;
        public $foto;
        public $tipo;
        public $titulo;
        public $descripcion;
        public $pais;
        public $autor;
        public $personajes = array(); 
    }
    class Personaje{
        public $cedula;
        public $foto;
        public $nombre;
        public $apellido;
        public $fecha_nacimiento;
        public $sexo;
        public $habilidades;
        public $comida_favorita;
        public $edad;
    }
?>