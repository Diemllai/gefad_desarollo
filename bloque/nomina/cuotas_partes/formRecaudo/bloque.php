<?

/* --------------------------------------------------------------------------------------------------------------------------
  @ Derechos de Autor: Vea el archivo LICENCIA.txt que viene con la distribucion
  --------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------
 * @name          bloque.php 
 * @author        Violeta Sosa
 * @revision      Última revisión 02 de agosto de 2013
  /*--------------------------------------------------------------------------------------------------------------------------
 * @subpackage		bloqueAdminVinculacion
 * @package		bloques
 * @copyright    	Universidad Distrital Francisco Jose de Caldas
 * @version      	0.0.0.1 - Julio 30 de 2013
 * @author	
 * @author		Oficina Asesora de Sistemas
 * @link		N/D
 * @description  	Bloque para gestionar formularios de cuotas partes.
 *                      Implementa:

  Despliegue formulario cuotas partes registro recaudo
 *                      Registro información de formularios
 */
/* -------------------------------------------------------------------------------------------------------------------------- */


if (!isset($GLOBALS["autorizado"])) {
    include("../index.php");
    exit;
}
//echo "<br>action ".$_REQUEST['action'];
//echo "<br>opcion ".$_REQUEST['opcion'];
include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/bloque.class.php");
include_once("sql.class.php");
include_once("funcion.class.php");

//Clase
class bloque_formRecaudo extends bloque {

    private $configuracion;

    public function __construct($configuracion) {
        $this->configuracion = $configuracion;
        $this->sql = new sql_formRecaudo();
        $this->funcion = new funciones_formRecaudo($configuracion, $this->sql);
    }

    function html() {
        if (isset($_REQUEST['opcion'])) {
            $accion = $_REQUEST['opcion'];

            switch ($accion) {

                case "historiaRecaudo":
                    $this->funcion->mostrarRecaudos();
                    break;

                case "consultar":
                    $consultar_recaudos = array();
                    $saldo_cuenta = 0;
                    foreach ($_REQUEST as $key => $value) {
                        if ($key != 'action' && $key != 'opcion') {
                            $consultar_recaudos[$key] = $_REQUEST[$key];
                        }
                    }

                    $this->funcion->historiaRecaudos($consultar_recaudos,$saldo_cuenta);
                    break;

                case "registro_pago":

                    $cuentas_pago = array();
                    $cont = 0;

                    foreach ($_REQUEST["cuenta_pagar"] as $key => $value) {

                        $cuentas_pago[$cont] = array(
                            'fecha_cuenta' => $_REQUEST["fecha_cuenta"][$key],
                            'consecutivo_cuenta' => $_REQUEST["consecutivo_pagar"][$key],
                            'empleador' => $_REQUEST["entidad_empleador"][$key],
                            'previsor' => $_REQUEST["entidad_previsora"][$key],
                            'fechai_pago' => $_REQUEST["fechai_pago"][$key],
                            'fechaf_pago' => $_REQUEST["fechaf_pago"][$key],
                            'valor_pago' => $_REQUEST["valor_pago"][$key],
                            'saldo' => $_REQUEST["saldo"][$key],
                            'identificacion' => $_REQUEST["identificacion"][$key]);

                        $cont = $cont + 1;
                    }

                    $this->funcion->mostrarFormulario($cuentas_pago);
                    break;


                default :
                    $this->funcion->inicio();
                    break;
            }
        } else {
            $accion = "inicio";
            $this->funcion->mostrarFormulario();
        }
    }

    function action() {

        switch ($_REQUEST['opcion']) {

            case"guardarRecaudo":
                $parametros_recaudo = array();

                foreach ($_REQUEST as $key => $value) {
                    if ($key != 'action' && $key != 'opcion') {
                        $parametros_recaudo[$key] = $_REQUEST[$key];
                    }
                }

                $this->funcion->procesarFormulario($parametros_recaudo);
                break;

            default :
                $pagina = $this->configuracion["host"] . $this->configuracion["site"] . "/index.php?";
                $variable = "pagina=reportesCuotas";
                $variable .= "&opcion=";
                $variable = $this->funcion->cripto->codificar_url($variable, $this->configuracion);
                echo "<script>location.replace('" . $pagina . $variable . "')</script>";
                break;
        }
    }

}

// @ Crear un objeto bloque especifico
$esteBloque = new bloque_formRecaudo($configuracion);
//echo var_dump($_REQUEST);exit;
//"blouqe ".$_REQUEST['action'];exit;


if (!isset($_REQUEST['action'])) {
    $esteBloque->html();
} else {

    $esteBloque->action();
}
?>