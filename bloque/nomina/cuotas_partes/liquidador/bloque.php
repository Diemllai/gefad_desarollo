<?

/* --------------------------------------------------------------------------------------------------------------------------
  @ Derechos de Autor: Vea el archivo LICENCIA.txt que viene con la distribucion
  --------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------
 * @name          bloque.php 
 * @author        Paulo Cesar Coronado
 * @revision      Última revisión 12 de enero de 2009
  /*--------------------------------------------------------------------------------------------------------------------------
 * @subpackage		bloqueLiquidador
 * @package		bloques
 * @copyright    	Universidad Distrital Francisco Jose de Caldas
 * @version      	0.0.0.1 - Julio 09  de 2013
 * @author		
 * @author		Oficina Asesora de Sistemas
 * @link		N/D
 * @description  	Bloque para gestionar cuotas partes. Implementa los casos
 * 			de uso: 
 * 			Registro de historias laborales
 * 			Generación  cuenta de cobro
  /*-------------------------------------------------------------------------------------------------------------------------- */

if (!isset($GLOBALS["autorizado"])) {
    include("../index.php");
    exit;
}

include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/bloque.class.php");
include_once("funcion.class.php");
include_once("sql.class.php");

//Clase
class bloqueLiquidador extends bloque {

    public function __construct($configuracion) {
        $this->sql = new sql_liquidador();
        $this->funcion = new funciones_liquidador($configuracion, $this->sql);
    }

    function html($configuracion) {
        //Rescatar datos de sesion        

        switch ($_REQUEST['opcion']) {
            case "recuperar":
                $this->funcion->datosEntidad();
                break;

            case "liquidarfechas":
                $periodo_liquidar = array();
                foreach ($_REQUEST as $key => $values) {
                    $periodo_liquidar[$key] = $_REQUEST[$key];
                }

                $this->funcion->periodoLiquidar($periodo_liquidar);
                exit;
                break;

            case "liquidar":
                foreach ($_REQUEST as $key => $value) {
                    if ($key != 'action' && $key != 'opcion') {
                        $datos_liquidacion[$key] = $_REQUEST[$key];
                    }
                }

                $this->funcion->mostrarLiquidacion($datos_liquidacion);
                break;

            case "cuentacobro":
                $consecutivo = $_REQUEST['consecutivo_liq'];
                $datos_basicos = unserialize($_REQUEST['datos_basicos']);
                $this->funcion->reporteCuenta($datos_basicos);
                break;

            case "resumencuenta":
                $consecutivo = $_REQUEST['consecutivo_liq'];
                $datos_basicos = unserialize($_REQUEST['datos_basicos']);
                $this->funcion->reporteResumen($datos_basicos);
                break;

            case "detallecuenta":
                $consecutivo = $_REQUEST['consecutivo_liq'];
                $datos_basicos = unserialize($_REQUEST['datos_basicos']);
                $liquidacion = array();
                $this->funcion->reportesDetalle($datos_basicos, $liquidacion, $consecutivo);
                break;

            case "formatos":
                $datos_basicos = unserialize($_REQUEST['datos_basicos']);
                $liquidacion = unserialize($_REQUEST['liquidacion']);
                $totales_liquidacion = unserialize($_REQUEST['totales_liquidacion']);

                $this->funcion->guardarLiquidacion($datos_basicos, $totales_liquidacion);

                if ($_REQUEST['reportes_formato'] == 'Generar Reportes') {
                    $this->funcion->reportes($datos_basicos, $liquidacion);
                }

                break;


            default:
                $this->funcion->datosIniciales();
        }
    }

// fin funcion html

    function action($configuracion) {
        switch ($_REQUEST['opcion']) {

            default:
                $this->funcion->consultar();
                break;
        }
    }

//fin funcion action
}

// fin clase bloque_liquidador
// @ Crear un objeto bloque especifico
//echo "bloque";
//var_dump($configuracion);
$esteBloque = new bloqueLiquidador($configuracion);



if (isset($_REQUEST['cancelar'])) {
    unset($_REQUEST['action']);
    $pagina = $configuracion["host"] . $configuracion["site"] . "/index.php?";
    $variable = "pagina=liquidadorCP";
    $variable .= "&opcion=consultar";
    include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/encriptar.class.php");
    $this->cripto = new encriptar();
    $variable = $this->cripto->codificar_url($variable, $configuracion);

    echo "<script>location.replace('" . $pagina . $variable . "')</script>";
}


//echo "action".$_REQUEST['action'];exit;
//var_dump($_REQUEST);exit;
if (!isset($_REQUEST['action'])) {
    $esteBloque->html($configuracion);
} else {

    $esteBloque->action($configuracion);
}
?>


