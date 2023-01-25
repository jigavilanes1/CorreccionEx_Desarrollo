<?php
    include_once("../Config/Database.php");

    class Vehiculo {
        private $id;
        private $placa;
        private $marca;
        private $motor;
        private $chasis;
        private $combustible;
        private $anio;
        private $color;        
        private $avaluo;
        private $usuId;

        public function __construct()
        {            
        }

        public function setId($_ID) {
            $this->id = $_ID;
        }
        
        public function getId() {
            return $this->id;
        }

        
        /**
         * Get the value of anio
         */ 
        public function getAnio()
        {
                return $this->anio;
        }

        /**
         * Set the value of anio
         *
         * @return  self
         */ 
        public function setAnio($anio)
        {
                $this->anio = $anio;

                return $this;
        }

        /**
         * Get the value of placa
         */ 
        public function getPlaca()
        {
                return $this->placa;
        }

        /**
         * Set the value of placa
         *
         * @return  self
         */ 
        public function setPlaca($placa)
        {
                $this->placa = $placa;

                return $this;
        }

        /**
         * Get the value of marca
         */ 
        public function getMarca()
        {
                return $this->marca;
        }

        /**
         * Set the value of marca
         *
         * @return  self
         */ 
        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }

        /**
         * Get the value of motor
         */ 
        public function getMotor()
        {
                return $this->motor;
        }

        /**
         * Set the value of motor
         *
         * @return  self
         */ 
        public function setMotor($motor)
        {
                $this->motor = $motor;

                return $this;
        }

        /**
         * Get the value of chasis
         */ 
        public function getChasis()
        {
                return $this->chasis;
        }

        /**
         * Set the value of chasis
         *
         * @return  self
         */ 
        public function setChasis($chasis)
        {
                $this->chasis = $chasis;

                return $this;
        }

        /**
         * Get the value of combustible
         */ 
        public function getCombustible()
        {
                return $this->combustible;
        }

        /**
         * Set the value of combustible
         *
         * @return  self
         */ 
        public function setCombustible($combustible)
        {
                $this->combustible = $combustible;

                return $this;
        }

        /**
         * Get the value of avaluo
         */ 
        public function getAvaluo()
        {
                return $this->avaluo;
        }

        /**
         * Set the value of avaluo
         *
         * @return  self
         */ 
        public function setAvaluo($avaluo)
        {
                $this->avaluo = $avaluo;

                return $this;
        }

        /**
         * Get the value of color
         */ 
        public function getColor()
        {
                return $this->color;
        }

        /**
         * Set the value of color
         *
         * @return  self
         */ 
        public function setColor($color)
        {
                $this->color = $color;

                return $this;
        }

        /**
         * Get the value of usuId
         */ 
        public function getUsuId()
        {
                return $this->usuId;
        }

        /**
         * Set the value of usuId
         *
         * @return  self
         */ 
        public function setUsuId($usuId)
        {
                $this->usuId = $usuId;

                return $this;
        }

        public function insertar() {
            $conn = new DataBase();

            $sql = "insert into vehiculo(id,placa,marca,motor,chasis,combustible,anio,color,foto,avaluo,usu_id) values (null,?,?,?,?,?,?,?,'foto.jpg',?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("sisssiidi",$this->placa,$this->marca,$this->motor,$this->chasis,$this->combustible,$this->anio,$this->color,$this->avaluo,$this->usuId);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function actualizar() {
            $conn = new DataBase();
            
            $sql = "update vehiculo set placa = ?,marca = ?,motor = ?,chasis = ?,combustible = ?,anio = ?,color = ?, avaluo = ? where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("sisssiidi",$this->placa,$this->marca,$this->motor,$this->chasis,$this->combustible,$this->anio,$this->color,$this->avaluo,$this->id);            
            $stmt->execute();            
        }
        
        public function BuscarTodos() {
            $conn = new DataBase();

            $sql = "select v.id,v.placa,m.descripcion,v.motor,v.chasis,v.combustible,v.anio,c.descripcion,v.avaluo from vehiculo v,marca m,color c where v.marca = m.id and v.color = c.id and v.usu_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->usuId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();            
        }

        public function eliminar() {
            $conn = new DataBase();
            
            $sql = "delete from vehiculo where id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();
        }
    }
?>