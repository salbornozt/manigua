<?php
	/**
	 * Clase que realiza la conexión a la base de datos
	 */
	class Conexion {

		/**
		 * Conecta con la base de datos
		 * @return Object $conexion Devuelve un objeto para conectar con la base de datos en caso de éxito y false en caso de error
		 */
		public function conectarBD(){

			$conexion = pg_connect("host=manigua1.cqsydmzhg8zh.us-east-2.rds.amazonaws.com port=5432 dbname=manigua1 user=postgres password=root1234") or die ('No se ha podido conectar: ' . pg_last_error());

			return $conexion;
		}

		/**
		 * Cierra la conexión a la base de datos
		 * @param  Object $conexion Conexión a la base de datos
		 * @return boolean $cerrar Devuelve true en caso de éxito y false en caso de error
		 */
		public function desconectarBD($conexion){

			$cerrar = pg_close($conexion)
			or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

			return $cerrar;
		}
	}
?>