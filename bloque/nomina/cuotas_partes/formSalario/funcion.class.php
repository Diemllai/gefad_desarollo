
<?

/*
  ############################################################################
  #    UNIVERSIDAD DISTRITAL Francisco Jose de Caldas                        #
  #    Copyright: Vea el archivo EULA.txt que viene con la distribucion      #
  ############################################################################
 */
/* --------------------------------------------------------------------------------------------------------------------------
  @ Derechos de Autor: Vea el archivo LICENCIA.txt que viene con la distribucion
  --------------------------------------------------------------------------------------------------------------------------- */
/* ---------------------------------------------------------------------------------------
  |				Control Versiones				    	|
  ----------------------------------------------------------------------------------------
  | fecha      |        Autor            | version     |              Detalle            |
  ----------------------------------------------------------------------------------------
  | 18/05/2013 | Violet Sosa             | 0.0.0.1     |                                 |
  ----------------------------------------------------------------------------------------
  | 02/08/2013 | Violet Sosa             | 0.0.0.2     |                                 |
  ----------------------------------------------------------------------------------------
  | 11/10/2013 | Violet Sosa             | 0.0.0.3     |                                 |
  ----------------------------------------------------------------------------------------
 */

/* --------------------------------------------------------------------------------------------------------------------------
  @ Derechos de Autor: Vea el archivo LICENCIA.txt que viene con la distribucion
  --------------------------------------------------------------------------------------------------------------------------- */


if (!isset($GLOBALS["autorizado"])) {
    include("../index.php");
    exit;
}

include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/funcionGeneral.class.php");
include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/navegacion.class.php");
include_once("html.class.php");

class funciones_formSalario extends funcionGeneral {

    function __construct($configuracion, $sql) {

        include ($configuracion["raiz_documento"] . $configuracion["estilo"] . "/basico/tema.php");
        include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/encriptar.class.php");
        include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/log.class.php");

        $this->cripto = new encriptar();
        $this->log_us = new log();
        $this->tema = $tema;
        $this->sql = $sql;

        //Conexion General
        $this->acceso_db = $this->conectarDB($configuracion, "mysqlFrame");

        //Conexión a Postgres -
        $this->acceso_indice = $this->conectarDB($configuracion, "cuotas_partes");
        //Datos de sesion

        $this->usuario = $this->rescatarValorSesion($configuracion, $this->acceso_db, "id_usuario");
        $this->identificacion = $this->rescatarValorSesion($configuracion, $this->acceso_db, "identificacion");

        $this->configuracion = $configuracion;

        $this->html_formSalario = new html_formSalario($configuracion);
    }

    function mostrarFormulario() {
        $this->html_formSalario->formularioSalario();
    }

    function ConsultarSalario() {
        $parametros = "";
        $cadena_sql = $this->sql->cadena_sql($this->configuracion, $this->acceso_indice, "Consultar", $parametros);
        $datos = $this->ejecutarSQL($this->configuracion, $this->acceso_indice, $cadena_sql, "busqueda");
        $this->html_formSalario->tablaSalarios($datos);
    }

    function procesarFormulario($datos) {

        $estado = 1;
        $fecha_registro = date('d/m/Y');

        foreach ($datos as $key => $value) {

            if ($datos[$key] == "") {
                echo "<script type=\"text/javascript\">" .
                "alert('Formulario NO diligenciado correctamente');" .
                "</script> ";
                $pagina = $this->configuracion["host"] . $this->configuracion["site"] . "/index.php?";
                $variable = 'pagina=reportesCuotaFormularis';
                $variable.='&opcion=';
                $variable = $this->cripto->codificar_url($variable, $this->configuracion);
                echo "<script>location.replace('" . $pagina . $variable . "')</script>";
                exit;
            }
        }

        $parametros = "";
        $anio = $datos['anio_registrar'];

        $cadena_sql = $this->sql->cadena_sql($this->configuracion, $this->acceso_indice, "VeriAnio", $parametros);
        $verificacion = $this->ejecutarSQL($this->configuracion, $this->acceso_indice, $cadena_sql, "verificar");

        foreach ($verificacion as $key => $value) {
            $Ani_ = $verificacion[$key]['salario_anio'];

            if ($anio == $Ani_) {

                echo "<script type=\"text/javascript\">" .
                "alert('El año ya registra monto de salario.');" .
                "</script> ";
                $pagina = $this->configuracion["host"] . $this->configuracion["site"] . "/index.php?";
                $variable = "pagina=formularioSalario";
                $variable .= "&opcion=";
                $variable = $this->cripto->codificar_url($variable, $this->configuracion);
                echo "<script>location.replace('" . $pagina . $variable . "')</script>";
                exit;
            }
        }

        $parametros2 = array(
            'salario_norma' => (isset($datos['norma']) ? $datos['norma'] : ''),
            'salario_numero' => (isset($datos['numero']) ? $datos['numero'] : ''),
            'salario_anio' => (isset($datos['anio_registrar']) ? $datos['anio_registrar'] : ''),
            'salario_vdesde' => (isset($datos['fecvig_desde']) ? $datos['fecvig_desde'] : ''),
            'salario_vhasta' => (isset($datos['fecvig_hasta']) ? $datos['fecvig_hasta'] : ''),
            'salario_monto' => (isset($datos['monto_mensual']) ? $datos['monto_mensual'] : ''),
            'salario_estado' => $estado,
            'salario_registro' => $fecha_registro);

        $cadena_sql2 = $this->sql->cadena_sql($this->configuracion, $this->acceso_indice, "insertarSalario", $parametros2);
        $datos_registrados = $this->ejecutarSQL($this->configuracion, $this->acceso_indice, $cadena_sql2, "registrar");

        if ($datos_registrados == true) {

            $registro[0] = "GUARDAR";
            $registro[1] = $parametros2['salario_anio'] . '|' . $parametros2['salario_monto']; //
            $registro[2] = "CUOTAS_PARTES_SALARIOS";
            $registro[3] = $parametros2['salario_anio'] . '|' . $parametros2['salario_vdesde'] . '|' . $parametros2['salario_vhasta']; //
            $registro[4] = time();
            $registro[5] = "Registra datos básicos salario minimo para el ";
            $registro[5] .= " Anio =" . $parametros2['salario_anio'];
            $this->log_us->log_usuario($registro, $this->configuracion);

            echo "<script type=\"text/javascript\">" .
            "alert('Los datos se registraron correctamente');" .
            "</script> ";

            $pagina = $this->configuracion["host"] . $this->configuracion["site"] . "/index.php?";
            $variable = "pagina=formularioSalario";
            $variable .= "&opcion=";
            $variable = $this->cripto->codificar_url($variable, $this->configuracion);
            echo "<script>location.replace('" . $pagina . $variable . "')</script>";
        } else {
            echo "<script type=\"text/javascript\">" .
            "alert('Los datos NO se registraron correctamente');" .
            "</script> ";
            $pagina = $this->configuracion["host"] . $this->configuracion["site"] . "/index.php?";
            $variable = "pagina=formularioSalario";
            $variable .= "&opcion=";
            $variable = $this->cripto->codificar_url($variable, $this->configuracion);
            echo "<script>location.replace('" . $pagina . $variable . "')</script>";
            exit;
        }
    }

}

?>