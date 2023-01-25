<?php
    include_once("../Config/Database.php");

    class UsuariosModel {
        private $id;
        private $usuario;
        private $password;        

        public function __construct()
        {            
        }

        public function setId($_ID) {
            $this->id = $_ID;
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function setUsuario($_usuario) {
            $this->usuario = $_usuario;
        }
        
        public function getUsuario() {
            return $this->usuario;
        }        

        public function setPassword($_password) {
            $this->password = $_password;
        }
        
        public function getPassword() {
            return $this->password;
        }

        public function crear() {
            $conn = new DataBase();

            $sql = "insert into usuarios(id,usuario,password) values (null,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ss",$this->usuario,$this->password);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function Login() {
            $conn = new DataBase();

            $sql = "select * from usuarios where usuario = ? and password = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ss",$this->usuario,$this->password);
            $stmt->execute();
            $result = $stmt->get_result();            
            while ($row = $result->fetch_assoc()) {                
                if($row != null) {
                    return true;
                }
            }            
        }

        public function eliminar() {
            $conn = new DataBase();
            
            $sql = "delete from vehiculo where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();
        }

        public function BuscarPorUsuario() {
            $conn = new DataBase();
            $sql = "select * from usuarios where usuario = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$this->usuario);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();            
        }
    }
?>