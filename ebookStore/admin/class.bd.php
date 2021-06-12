<?php
class BD
{
  private $servidor = "localhost";
  private $basededatos = "ochoa";
  private $usuario ="root";
  private $clave ="";
  private $link;
  function get_servidor()
  {
  	return $this->servidor;
  }
  function set_servidor($valor)
  {
  	$this->servidor=$valor;
  }
  function get_basededatos()
  {
  	return $this->basededatos;
  }
  function set_basededatos($valor)
  {
  	$this->basededatos=$valor;
  }
  function get_usuario()
  {
  	return $this->usuario;
  }
  function set_usuario($valor)
  {
  	$this->usuario=$valor;
  }
  function get_clave()
  {
  	return $this->clave;
  }
  function set_clave($valor)
  {
  	$this->clave=$valor;
  }
  private function conectar()
  {
  	$this->link=mysql_connect($this->servidor,$this->usuario,$this->clave);
  	mysql_select_db($this->basededatos);
  }
  function __construct()
  {
  	$this->conectar();
  }
  function ejecutar($sql)
  {
  	return mysql_query($sql);

  }
  function retornar($registros, $tipo = MYSQL_ASSOC)
  {
  	return mysql_fetch_array($registros, $tipo);
        //_NUM
    //_BOTH
  }




}
?>
