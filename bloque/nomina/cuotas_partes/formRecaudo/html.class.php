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
  |				Control Versiones				         |
  ----------------------------------------------------------------------------------------
  | fecha      |        Autor            | version     |              Detalle            |
  ----------------------------------------------------------------------------------------
  | 11/06/2013 | Violet Sosa             | 0.0.0.1     |                                 |
  ----------------------------------------------------------------------------------------
  | 02/08/2013 | Violet Sosa             | 0.0.0.2     |                                 |
  ----------------------------------------------------------------------------------------
  | 01/03/2014 | Violet Sosa             | 0.0.0.3     |                                 |
  ----------------------------------------------------------------------------------------
 */
if (!isset($GLOBALS["autorizado"])) {
    //include("../index.php");
    exit;
}

class html_formRecaudo {

    public $configuracion;
    public $cripto;
    public $indice;

    function __construct($configuracion) {

        $this->configuracion = $configuracion;
        include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/encriptar.class.php");
        include_once($configuracion["raiz_documento"] . $configuracion["clases"] . "/html.class.php");
        $indice = $this->configuracion["host"] . $this->configuracion["site"] . "/index.php?";
        $this->cripto = new encriptar();
        $this->indice = $configuracion["host"] . $configuracion["site"] . "/index.php?";
        $this->html = new html();
    }

    function form_valor() {

        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/dbms.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/sesion.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/encriptar.class.php");
        $this->formulario = "formRecaudo";
        ?>
        <script>
            function acceptNum(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = "01234567890";
                especiales = [8, 39];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    return false;
                }
            }
        </script>

        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />
        <form method='POST' action='index.php' name='<? echo $this->formulario; ?>' autocomplete='off'>

            <h2>Ingrese la cédula a consultar <br>Historial de Recaudos: </h2>
            <br>
            <input type="text" name="cedula_emp" required='required' onKeyPress='return acceptNum(event)' title="*Campo Obligatorio">
            <br><br>
            <center> <input id="registrarBoton" type="submit" class="navbtn"  value="Consultar" ></center>

            <input type='hidden' name='pagina' value='formularioRecaudo'>
            <input type='hidden' name='opcion' value='historiaRecaudo'>
            <br>
        </form>
        <?
    }

    function form_valor_cp() {

        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/dbms.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/sesion.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/encriptar.class.php");
        $this->formulario = "formRecaudo";
        ?>
        <script>
            function acceptNum(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = "01234567890";
                especiales = [8, 39];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    return false;
                }
            }
        </script>

        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />
        <form method='POST' action='index.php' name='<? echo $this->formulario; ?>' autocomplete='off'>

            <h2>Ingrese la cédula a consultar <br>Historial de Recaudos: </h2>
            <br>
            <input type="text" name="cedula_emp" required='required' onKeyPress='return acceptNum(event)' title="*Campo Obligatorio">
            <br><br>
            <center> <input id="registrarBoton" type="submit" class="navbtn"  value="Consultar" ></center>

            <input type='hidden' name='pagina' value='formularioRecaudo'>
            <input type='hidden' name='opcion' value='historiaRecaudo_cobropago'>
            <br>
        </form>
        <?
    }

    function datosRecaudos($cedula, $datos_en) {

        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/dbms.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/sesion.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/encriptar.class.php");

        $this->formulario = "formRecaudo";
        ?>
        <script>
            function acceptNum(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = "01234567890";
                especiales = [8, 39];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    return false;
                }
            }
        </script>
        <!referencias a estilos y plugins>
        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />
        <link href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "stylesheet" type = "text/css"/>
        <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <form id="form" method="post" action='index.php' name='<? echo $this->formulario; ?>' autocomplete='off'>
            <h2>Ingrese los parámetros para consultar <br>Recaudos registrados:</h2>
            <div class="formrow f1">
                <div class="formrow f1">
                    <div id="p1f4" class="field n1">
                        <div class="staticcontrol">
                            <div class="hrcenter px1"></div>
                        </div>
                        <div class="null"></div>
                    </div>
                    <div class="null"></div>
                </div>
            </div>

            <div class="formrow f1">
                <div id="p1f7" class="field n1">
                    <div class="caption capleft alignleft">
                        <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve">Cédula Empleado</span></span></span></label>
                        <div class="null"></div>
                    </div>
                    <div class="control capleft">
                        <div>
                            <input type="text" onpaste="return false" title="*Campo Obligatorio" id="p1f7c" name="cedula_emp" readonly class="fieldcontent" required='required'  onKeyPress='return acceptNum(event)' value="<?php echo $cedula['cedula'] ?>">
                        </div>
                        <div class="null"></div>
                    </div>
                    <div class="null"></div>
                </div>
                <div class="null"></div>
            </div>

            <div id="p1f103" class="field n1">
                <div class="caption capleft alignleft">
                    <label class="fieldlabel" for="entidades"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" >Entidad a cobrar:</span></span></span></label>
                    <div class="null"></div>
                </div>
            </div>

            <div class="control capleft">
                <div class="dropdown">

                    <?
                    unset($combo);
                    //prepara los datos como se deben mostrar en el combo
                    $combo[0][0] = '0';
                    $combo[0][1] = '';
                    foreach ($datos_en as $cmb => $values) {
                        $combo[$cmb][0] = isset($datos_en[$cmb]['hlab_nitprev']) ? $datos_en[$cmb]['hlab_nitprev'] : 0;
                        $combo[$cmb][1] = isset($datos_en[$cmb]['prev_nombre']) ? $datos_en[$cmb]['prev_nombre'] : '';
                    }
                    // echo$combo;
                    if (isset($_REQUEST['hlab_nitprev'])) {
                        $lista_combo = $this->html->cuadro_lista($combo, 'hlab_nitprev', $this->configuracion, $_REQUEST['hlab_nitprev'], 0, FALSE, 0, 'hlab_nitprev');
                    } else {
                        $lista_combo = $this->html->cuadro_lista($combo, 'hlab_nitprev', $this->configuracion, 0, 0, FALSE, 0, 'hlab_nitprev');
                    }
                    echo $lista_combo;
                    ?> 
                </div>
            </div>
            <div>
                <br><br><br>
                <input id="generarBoton" type="submit" class="navbtn"  value="Generar">
                <input type='hidden' name='pagina' value='formularioRecaudo'>
                <input type='hidden' name='opcion' value='consultar'>
            </div>
        </form>
        <?
    }

    function datosRecaudos_cp($cedula, $datos_en) {

        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/dbms.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/sesion.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/encriptar.class.php");

        $this->formulario = "formRecaudo";
        ?>
        <script>
            function acceptNum(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = "01234567890";
                especiales = [8, 39];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    return false;
                }
            }
        </script>
        <!referencias a estilos y plugins>
        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />
        <link href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "stylesheet" type = "text/css"/>
        <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <form id="form" method="post" action='index.php' name='<? echo $this->formulario; ?>' autocomplete='off'>
            <h2>Ingrese los parámetros para consultar <br>Recaudos registrados:</h2>
            <div class="formrow f1">
                <div class="formrow f1">
                    <div id="p1f4" class="field n1">
                        <div class="staticcontrol">
                            <div class="hrcenter px1"></div>
                        </div>
                        <div class="null"></div>
                    </div>
                    <div class="null"></div>
                </div>
            </div>

            <div class="formrow f1">
                <div id="p1f7" class="field n1">
                    <div class="caption capleft alignleft">
                        <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve">Cédula Empleado</span></span></span></label>
                        <div class="null"></div>
                    </div>
                    <div class="control capleft">
                        <div>
                            <input type="text" onpaste="return false" title="*Campo Obligatorio" id="p1f7c" name="cedula_emp" readonly class="fieldcontent" required='required'  onKeyPress='return acceptNum(event)' value="<?php echo $cedula['cedula'] ?>">
                        </div>
                        <div class="null"></div>
                    </div>
                    <div class="null"></div>
                </div>
                <div class="null"></div>
            </div>

            <div id="p1f103" class="field n1">
                <div class="caption capleft alignleft">
                    <label class="fieldlabel" for="entidades"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" >Entidad a cobrar:</span></span></span></label>
                    <div class="null"></div>
                </div>
            </div>

            <div class="control capleft">
                <div class="dropdown">

                    <?
                    unset($combo);
                    //prepara los datos como se deben mostrar en el combo
                    $combo[0][0] = '0';
                    $combo[0][1] = '';
                    foreach ($datos_en as $cmb => $values) {
                        $combo[$cmb][0] = isset($datos_en[$cmb]['hlab_nitprev']) ? $datos_en[$cmb]['hlab_nitprev'] : 0;
                        $combo[$cmb][1] = isset($datos_en[$cmb]['prev_nombre']) ? $datos_en[$cmb]['prev_nombre'] : '';
                    }
                    // echo$combo;
                    if (isset($_REQUEST['hlab_nitprev'])) {
                        $lista_combo = $this->html->cuadro_lista($combo, 'hlab_nitprev', $this->configuracion, $_REQUEST['hlab_nitprev'], 0, FALSE, 0, 'hlab_nitprev');
                    } else {
                        $lista_combo = $this->html->cuadro_lista($combo, 'hlab_nitprev', $this->configuracion, 0, 0, FALSE, 0, 'hlab_nitprev');
                    }
                    echo $lista_combo;
                    ?> 
                </div>
            </div>
            <div>
                <br><br><br>
                <input id="generarBoton" type="submit" class="navbtn"  value="Generar">
                <input type='hidden' name='pagina' value='formularioRecaudo'>
                <input type='hidden' name='opcion' value='consultar_cp'>
            </div>
        </form>
        <?
    }

    function reporteCobrosPagos($historial, $cobros, $saldo_cuenta) {

        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/dbms.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/sesion.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/encriptar.class.php");

        $this->formulario = "formRecaudo";

        $variable = 'pagina=formularioRecaudo';
        $variable = $this->cripto->codificar_url($variable, $this->configuracion);
        ?>

        <!referencias a estilos y plugins>
        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />
        <link href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "stylesheet" type = "text/css"/>
        <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <!referencias a estilos y plugins>
        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />

        <link href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "stylesheet" type = "text/css"/>
        <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <h2>Reporte de Cobros y Recaudos</h2>

        <h1>Cuentas de Cobro Registradas</h1>

        <form id="<? echo $this->formulario; ?>" method="post" action="index.php" name='<? echo $this->formulario; ?>' autocomplete='Off' onSubmit="return validate();">
            <center> <table class='bordered'  width ="75%" align="center">
                    <tr>
                        <th colspan="11" class='encabezado_registro'>CUENTAS COBRO REGISTRADAS</th>
                        <td class='texto_elegante<? echo '' ?> estilo_td' ></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;FECHA GENERACIÓN&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;ENTIDAD EMPLEADOR&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>NIT ENTIDAD PREVISORA</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>CONSECUTIVO CUENTA COBRO</td>
                        <td colspan="2" class='texto_elegante2 estilo_td' align=center>PERIODO DE COBRO</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;VALOR SIN INTERÉS&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;INTERÉS&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;TOTAL CON INTERÉS&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;SALDO&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;IE_CORRESPONDENCIA&nbsp;</td>
                    </tr>
                    <tr>
                        <td class='texto_elegante2 estilo_td' style="text-align:center" >INICIO</td>
                        <td class='texto_elegante2 estilo_td' style="text-align:center" >FIN</td>
                    </tr>
                    <tr>
                        <?
                        if (is_array($cobros)) {

                            foreach ($cobros as $key => $value) {
                                echo "<tr id='yesOptions'>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_fgenerado'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_nitemp'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_nitprev'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_consecu_cta'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_finicial'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_ffinal'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_ts_interes']) . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_interes']) . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_tc_interes']) . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_saldo']) . "</td>"; //SALDO * * * * * *
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_ie_correspondencia'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                </table >
            </center>
        </form>

        <br><br>

        <h1>Recaudos Registrados</h1>

        <center><table class='bordered'  width ="75%" align="center">
                <tr>
                    <th colspan="11" class='encabezado_registro'>RECAUDOS REGISTRADOS</th>
                    <td class='texto_elegante<? echo '' ?> estilo_td' ></td>
                </tr>
                <tr>
                    <td  class='texto_elegante2 estilo_td' align=center>&nbsp;ENTIDAD PREVISIN&nbsp;</td>
                    <td  class='texto_elegante2 estilo_td' align=center>&nbsp;CONSECUTIVO CUENTA COBRO&nbsp;</td>
                    <td  class='texto_elegante2 estilo_td' align=center>IE_CORRESPONDENCIA</td>
                    <td  class='texto_elegante2 estilo_td' align=center>RES. ORDEN DE PAGO</td>
                    <td  class='texto_elegante2 estilo_td' align=center>FECHA RES. ORDEN DE PAGO</td>
                    <td  class='texto_elegante2 estilo_td' align=center>FECHA PAGO</td>
                    <td  class='texto_elegante2 estilo_td' align=center>&nbsp;VALOR A CAPITAL&nbsp;</td>
                    <td  class='texto_elegante2 estilo_td' align=center>&nbsp;VALOR A INTERESES&nbsp;</td>
                    <td  class='texto_elegante2 estilo_td' align=center>&nbsp;MEDIO DE PAGO&nbsp;</td>
                </tr>

                <tr>
                    <?
                    if (is_array($historial)) {
                        foreach ($historial as $key => $value) {
                            echo "<tr>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['prev_nombre'] . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['recta_consecu_cta'] . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['cob_ie_correspondencia'] . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['rec_resolucionop'] . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['rec_fecha_resolucion'] . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['recta_fechapago'] . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$" . number_format($historial[$key]['rec_pago_capital']) . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$" . number_format($historial[$key]['rec_pago_interes']) . "</td>";
                            echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['rec_medio_pago'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                        echo "</tr>";
                    }
                    ?>
            </table >
        </center>
        <?
    }

    function historiaRecaudos($historial, $cobros, $saldo_cuenta) {

        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/dbms.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/sesion.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/encriptar.class.php");

        $this->formulario = "formRecaudo";

        $variable = 'pagina=formularioRecaudo';
        $variable.='&opcion=interrupcion';
        $variable = $this->cripto->codificar_url($variable, $this->configuracion);
        $a = 0;

        foreach ($cobros as $key => $values) {
            $a++;
        }
        ?>

        <script>
            function validate() {
                a = <?php echo $a ?>;


                count = 0;
                for (x = 0; x < a; x++) {
        <?php foreach ($cobros as $key => $values) { ?>
                        if (document.formRecaudo.cuenta_pagar<?php echo $key ?>.checked === true) {
                            count++;
                        }
        <?php } ?>
                }

                if (count === 0) {
                    alert("¡Debe elegir al menos una cuenta de cobro!");
                    return false
                }
            }
        </script>

        <!referencias a estilos y plugins>
        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />
        <link href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "stylesheet" type = "text/css"/>
        <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <!referencias a estilos y plugins>
        <link href = "<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/cuentaCobro/cuentaC.css" rel = "stylesheet" type = "text/css" />

        <link href = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "stylesheet" type = "text/css"/>
        <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <h2>Reporte de Cobros y Recaudos</h2>

        <h1>Cuentas de Cobro Registradas</h1>

        <form id="<? echo $this->formulario; ?>" method="post" action="index.php" name='<? echo $this->formulario; ?>' autocomplete='Off' onSubmit="return validate();">
            <center><table class='bordered'  width ="75%" align="center">
                    <tr>
                        <th colspan="12" class='encabezado_registro'>CUENTAS COBRO REGISTRADAS</th>
                        <td class='texto_elegante<? echo '' ?> estilo_td' ></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;FECHA GENERACIÓN&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;ENTIDAD EMPLEADOR&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>NIT ENTIDAD PREVISORA</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>CONSECUTIVO CUENTA COBRO</td>
                        <td colspan="2" class='texto_elegante2 estilo_td' align=center>PERIODO DE COBRO</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;VALOR SIN INTERÉS&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;INTERÉS&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;TOTAL CON INTERÉS&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;SALDO&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;IE_CORRESPONDENCIA&nbsp;</td>
                        <td rowspan="2" class='texto_elegante2 estilo_td' align=center>&nbsp;&nbsp;&nbsp;REGISTRO&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td class='texto_elegante2 estilo_td' style="text-align:center" >INICIO</td>
                        <td class='texto_elegante2 estilo_td' style="text-align:center" >FIN</td>
                    </tr>
                    <tr>
                        <?
                        if (is_array($cobros)) {

                            foreach ($cobros as $key => $value) {
                                $saldo = $cobros[$key]['cob_saldo'];
                                echo "<tr id='yesOptions'>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_fgenerado'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_nitemp'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_nitprev'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_consecu_cta'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_finicial'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_ffinal'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_ts_interes']) . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_interes']) . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_tc_interes']) . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$&nbsp" . number_format($cobros[$key]['cob_saldo']) . "</td>"; //SALDO * * * * * *
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $cobros[$key]['cob_ie_correspondencia'] . "</td>";
                                echo "<td class='texto_elegante estilo_td' style='text-align:center;'>
                                     
                                  <input type='hidden' name='consecutivo_pagar[" . $key . "]' value='" . $cobros[$key]['cob_consecu_cta'] . "'>
                                  <input type='hidden' name='fecha_cuenta[" . $key . "]' value='" . $cobros[$key]['cob_fgenerado'] . "'>
                                  <input type='hidden' name='entidad_empleador[" . $key . "]' value='" . $cobros[$key]['cob_nitemp'] . "'>
                                  <input type='hidden' name='entidad_previsora[" . $key . "]' value='" . $cobros[$key]['cob_nitprev'] . "'>
                                  <input type='hidden' name='fechai_pago[" . $key . "]' value='" . $cobros[$key]['cob_finicial'] . "'>
                                  <input type='hidden' name='fechaf_pago[" . $key . "]' value='" . $cobros[$key]['cob_ffinal'] . "'>
                                  <input type='hidden' name='valor_pago[" . $key . "]' value='" . $cobros[$key]['cob_tc_interes'] . "'>
                                  <input type='hidden' name='saldo[" . $key . "]' value='" . $saldo . "'>
                                  <input type='hidden' name='identificacion[" . $key . "]' value='" . $cobros[$key]['cob_cedula'] . "'>
                                  
                                  <input type='checkbox' id='cuenta_pagar" . $key . "' name='cuenta_pagar[" . $key . "]' value='" . $key . "'>  
                                      
                                  </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "</tr>";
                        }
                        ?>
                </table >
            </center>

            <div>
                <input id="generarBoton" type="submit" class="navbtn"  value="Registrar Pago">
                <input type='hidden' name='pagina' value='formularioRecaudo'>
                <input type='hidden' name='opcion' value='registro_pago'>
            </div>
        </form>

        <br><br>

        <h1>Recaudos Registrados</h1>

        <table class='bordered'  width ="75%" align="center">
            <tr>
                <th colspan="11" class='encabezado_registro'>RECAUDOS REGISTRADOS</th>
                <td class='texto_elegante<? echo '' ?> estilo_td' ></td>
            </tr>
            <tr>
                <td  class='texto_elegante2 estilo_td' align=center>&nbsp;ENTIDAD PREVISIÓN&nbsp;</td>
                <td  class='texto_elegante2 estilo_td' align=center>&nbsp;CONSECUTIVO CUENTA COBRO&nbsp;</td>
                <td  class='texto_elegante2 estilo_td' align=center>IE_CORRESPONDENCIA</td>
                <td  class='texto_elegante2 estilo_td' align=center>RES. ORDEN DE PAGO</td>
                <td  class='texto_elegante2 estilo_td' align=center>FECHA RES. ORDEN DE PAGO</td>
                <td  class='texto_elegante2 estilo_td' align=center>FECHA PAGO</td>
                <td  class='texto_elegante2 estilo_td' align=center>&nbsp;VALOR A CAPITAL&nbsp;</td>
                <td  class='texto_elegante2 estilo_td' align=center>&nbsp;VALOR A INTERESES&nbsp;</td>
                <td  class='texto_elegante2 estilo_td' align=center>&nbsp;MEDIO DE PAGO&nbsp;</td>
            </tr>

            <tr>
                <?
                if (is_array($historial)) {
                    foreach ($historial as $key => $value) {
                        echo "<tr>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['prev_nombre'] . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['recta_consecu_cta'] . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['cob_ie_correspondencia'] . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['rec_resolucionop'] . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['rec_fecha_resolucion'] . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['recta_fechapago'] . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$" . number_format($historial[$key]['rec_pago_capital']) . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>$" . number_format($historial[$key]['rec_pago_interes']) . "</td>";
                        echo "<td class='texto_elegante estilo_td' style='text-align:center;'>" . $historial[$key]['rec_medio_pago'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "<td class='texto_elegante estilo_td' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                    echo "</tr>";
                }
                ?>
        </table >

        <?
    }

    function formularioRecaudos($cuentas_pago, $fecha_minima_datepicker) {

        $this->formulario = "formRecaudo";


        $identificacion = $cuentas_pago[0]['identificacion'];
        $nit_previsora = $cuentas_pago[0]['previsor'];
        $nit_empleador = $cuentas_pago[0]['empleador'];

        $maxDate = $fecha_minima_datepicker;

        foreach ($cuentas_pago as $key => $values) {
            $fecha_cobro[$key] = array(
                'inicio' => $cuentas_pago[$key]['fechai_pago'],
                'fin' => $cuentas_pago[$key]['fechaf_pago']
            );
        }


        $f_fecha_anio = date('Y', (strtotime(str_replace('/', '-', $fecha_minima_datepicker))));
        $f_fecha_dia = date('d', (strtotime(str_replace('/', '-', $fecha_minima_datepicker))));
        $f_fecha_mes = date('m', (strtotime(str_replace('/', '-', $fecha_minima_datepicker))));

        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/dbms.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/sesion.class.php");
        include_once($this->configuracion["raiz_documento"] . $this->configuracion["clases"] . "/encriptar.class.php");
        ?>

        <style>                    h3{text-align: left}                </style>

        <!referencias a estilos y plugins>
        <script type="text/javascript" src="<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["plugins"]; ?>/datepicker/js/datepicker.js"></script>
        <link	href="<? echo $this->configuracion["host"] . $this->configuracion["site"] . $this->configuracion["bloques"] ?>/nomina/cuotas_partes/formRecaudo/form_estilo.css"	rel="stylesheet" type="text/css" />
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <script>

            $(document).ready(function() {
                $("#fecha_resolucion").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1940:c',
                    maxDate: "+1m",
                    dateFormat: 'dd/mm/yy'
                });
                $("#fecha_resolucion").datepicker('option', 'minDate', '<?php echo $maxDate ?>');
            });

        <? foreach ($fecha_cobro as $key => $values) { ?>

                $(document).ready(function() {
                    $("#fecha_pago_inicio<? echo $key ?>").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '1940:c',
                        maxDate: "+0D",
                        dateFormat: 'dd/mm/yy'
                    });
                    $("#fecha_pago_inicio<? echo $key ?>").datepicker('option', 'minDate', '<?php echo $minPago = date('d/m/Y', strtotime(str_replace('/', '-', $fecha_cobro[$key]['inicio']))) ?>');
                    $("#fecha_pago_inicio<? echo $key ?>").datepicker('option', 'maxDate', '<?php echo $maxPago = date('d/m/Y', strtotime(str_replace('/', '-', $fecha_cobro[$key]['fin']))) ?>');
                    $("#fecha_pago_inicio<? echo $key ?>").datepicker('setDate', '<? echo $minPago = date('d/m/Y', strtotime(str_replace('/', '-', $fecha_cobro[$key]['inicio']))) ?>');
                });

                $(document).ready(function() {
                    $("#fecha_pago_fin<? echo $key ?>").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '1940:c',
                        maxDate: "+0D",
                        dateFormat: 'dd/mm/yy'
                    });
                    $("#fecha_pago_fin<? echo $key ?>").datepicker('option', 'minDate', '<?php echo $minPago = date('d/m/Y', strtotime(str_replace('/', '-', $fecha_cobro[$key]['inicio']))) ?>');
                    $("#fecha_pago_fin<? echo $key ?>").datepicker('option', 'maxDate', '<?php echo $maxPago = date('d/m/Y', strtotime(str_replace('/', '-', $fecha_cobro[$key]['fin']))) ?>');
                    $("#fecha_pago_fin<? echo $key ?>").datepicker('setDate', '<? echo $maxPago = date('d/m/Y', strtotime(str_replace('/', '-', $fecha_cobro[$key]['fin']))) ?>');
                });

        <? } ?>

            $(document).ready(function() {
                $("#fecha_pago_cuenta").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1940:c',
                    maxDate: "+1m",
                    dateFormat: 'dd/mm/yy'
                });
                $("#fecha_pago_cuenta").datepicker('option', 'minDate', '<?php echo $maxDate ?>');
            });</script>

        <script language = "Javascript">
            //Éste script valida si las fechas ingresadas en el formulario no son menores a la fecha de retiro de la entidad
            function echeck(str) {

                var min = new Date('<? echo $f_fecha_anio ?>,<? echo $f_fecha_mes ?>,<? echo $f_fecha_dia ?>,');
                var y = str.substring(6);
                var m3 = str.substring(3, 5);
                var m2 = m3 - 1;
                var m = '0' + m2;
                var d = str.substring(0, 2);
                var cadena = new Date(y, m, d);
                if (cadena < min) {
                    alert('Ingrese una fecha válida')
                    return false
                }

                return true
            }

            function echeck2(str) {

        <?
        foreach ($fecha_cobro as $key => $values) {

            $i_fecha_anio = date('Y', (strtotime(str_replace('/', '-', $fecha_cobro[$key]['inicio']))));
            $i_fecha_mes = date('m', (strtotime(str_replace('/', '-', $fecha_cobro[$key]['inicio']))));
            $i_fecha_dia = date('d', (strtotime("" . str_replace('/', '-', $fecha_cobro[$key]['inicio']))));

            $f_fecha_anio = date('Y', (strtotime(str_replace('/', '-', $fecha_cobro[$key]['fin']))));
            $f_fecha_mes = date('m', (strtotime(str_replace('/', '-', $fecha_cobro[$key]['fin']))));
            $f_fecha_dia = date('d', (strtotime("" . str_replace('/', '-', $fecha_cobro[$key]['fin']))));

            echo "var min = new Date('" . $i_fecha_anio . "," . $i_fecha_mes . "," . $i_fecha_dia . "');\n";
            echo "var max = new Date('" . $f_fecha_anio . "," . $f_fecha_mes . "," . $f_fecha_dia . "');    \n";

            echo "var y1 = str.substring(6);\n\n";
            echo "var m13 = str . substring(3, 5);\n\n";
            echo "var m12 = m13 - 1;\n\n";
            echo "var m1 = '0' + m12;\n\n";
            echo "var d1 = str.substring(0, 2);\n\n";
            echo "var cadena = new Date(y1, m1, d1);\n\n";

            echo "var ming = min.getTime();\n\n";
            echo "var maxg = max.getTime();\n\n";
            echo "var cadenag = cadena.getTime();\n\n";

            echo "if (cadenag > ming && cadenag < maxg) {\n";
            // echo "alert(min  cadena  max)\n\n";
            echo "alert('Periodo pago inválido. Fuera del periodo de cobro.')\n";
            echo " return false\n";
            echo "    }\n\n";
        }
        ?>
                return true
            }

            function minDate() {

                var fechaID = document.formRecaudo.fecha_resolucion
                if ((fechaID.value == null) || (fechaID.value == "")) {
                    alert("Ingrese una fecha válida!")
                    fechaID.focus()
                    return false
                }

                if (echeck(fechaID.value) == false) {
                    fechaID.value = ""
                    fechaID.focus()
                    return false
                }

                var fechaID = document.formRecaudo.fecha_pago_cuenta
                if ((fechaID.value == null) || (fechaID.value == "")) {
                    alert("Ingrese una fecha válida!")
                    fechaID.focus()
                    return false
                }

                if (echeck(fechaID.value) == false) {
                    fechaID.value = ""
                    fechaID.focus()
                    return false
                }

                var fechaID = document.formRecaudo.fecha_pago_inicio
                if ((fechaID.value == null) || (fechaID.value == "")) {
                    alert("Ingrese una fecha válida!")
                    fechaID.focus()
                    return false
                }

                if (echeck2(fechaID.value) == false) {
                    fechaID.value = ""
                    fechaID.focus()
                    return false
                }

                var fechaID = document.formRecaudo.fecha_pago_fin
                if ((fechaID.value == null) || (fechaID.value == "")) {
                    alert("Ingrese una fecha válida!")
                    fechaID.focus()
                    return false
                }

                if (echeck2(fechaID.value) == false) {
                    fechaID.value = ""
                    fechaID.focus()
                    return false
                }

            }

        </script>

        <script>
            function acceptNum2(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = "01234567890";
                especiales = [8, 39];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    return false;
                }
            }
        </script>

        <script>
            function acceptNumLetter(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.-";
                especiales = [8, 9, 32];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    return false;
                }
            }
        </script>

        <script>
            function confirmarEnvio()
            {
                var r = confirm("Confirmar envío de formulario.");
                if (r == true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>


        <script  type="text/javascript">

            function valor3()
            {
                //VALOR PAGADO
        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var num<?php echo $key ?> = document.formRecaudo.valor_pago_<?php echo $key ?>.value;
        <? } ?>
                var total = 0;

        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var total = parseInt(num<?php echo $key ?>) + total;
        <? } ?>

                //VALOR COBRADO

        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var numc_<?php echo $key ?> = document.formRecaudo.valor_cobro_<?php echo $key ?>.value;
        <? } ?>

                var total_cobro = 0;

        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var total_cobro = parseInt(numc_<?php echo $key ?>) + total_cobro;
        <? } ?>
                // COMPARACIÓN VALORES COBRADOS

                var capital = document.getElementById('valor_pagado_capital').value;
                var interes = document.getElementById('valor_pagado_interes').value;

                var total_cuenta = parseInt(capital) + parseInt(interes);

                if (total_cuenta > 0) {
                    document.getElementById('total_recaudo').value = total_cuenta;
                } else {
                    document.getElementById('total_recaudo').value = 0;
                }

                if (total_cuenta !== total_cobro) {
                    alert("¡Cuidado! El Valor Total a Pagar es diferente al Valor Capital+Valor Interés")
                    return false
                }

            }

            function valor()
            {
                var total_capital = 0;
                var total_interes = 0;
                var total_capint = 0;
                var total_cobro = 0;
                document.getElementById('total_recaudo').value = null;
                //VALOR PAGADO CAPITAL
        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var num<?php echo $key ?> = document.formRecaudo.valor_pagado_capital<?php echo $key ?>.value;
        <? } ?>


        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var total_capital = parseInt(num<?php echo $key ?>) + total_capital;
        <? } ?>
                //VALOR PAGADO INTERES
        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var num<?php echo $key ?> = document.formRecaudo.valor_pagado_interes<?php echo $key ?>.value;
        <? } ?>


        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var total_interes = parseInt(num<?php echo $key ?>) + total_interes;
        <? } ?>

                total_capint = total_interes + total_capital;
                //VALOR COBRADO

        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var numc_<?php echo $key ?> = document.formRecaudo.valor_cobro_<?php echo $key ?>.value;
        <? } ?>

        <? foreach ($cuentas_pago as $key => $values) { ?>
                    var total_cobro = parseInt(numc_<?php echo $key ?>) + total_cobro;
        <? } ?>
                // COMPARACIÓN VALORES COBRADOS
                if (total_cobro < total_capint) {
                    alert("¡Cuidado! Suma de Valor Pago es MAYOR a la Suma de Valor Cobrado")
                    document.getElementById('total_recaudo').value = total_capint;
                    return false
                }

                if (total_cobro > total_capint) {
                    alert("¡Cuidado! Suma de Valor Pago es MENOR a la Suma de Valor Cobrado")
                    document.getElementById('total_recaudo').value = total_capint;
                    return false
                }

                document.getElementById('total_recaudo').value = total_capint;
            }
        </script>

        <form id="form" method="post" action="index.php" name='<? echo $this->formulario; ?>' autocomplete='off'  onSubmit="return minDate();">
            <h1>Registro Recaudos Pensionado CP</h1>
            <div class="formrow f1">
                <div id="p1f1" class="field n1">
                    <div class="staticcontrol"><span class="wordwrap"><span class="pspan arial" style="text-align: left; font-size:14px;"><span class="ispan" style="color:#000099" xml:space="preserve">INFORMACIÓN BÁSICA</span><span class="ispan" style="color:#EE3D23" xml:space="preserve"> </span></span></span></div>
                    <div class="null"></div>
                </div>
            </div>

            <div class="formrow f1">
                <div id="p1f2" class="field n1">
                    <div class="caption capleft alignleft">
                        <label class="fieldlabel" for="p1f2c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Cédula Pensionado</span></span></span></label>
                    </div>
                    <div>
                        <input type="text" title="*Campo Obligatorio" id="p1f2c" onpaste="return false" name="cedula_emp" readonly class="fieldcontent" readonly required='required' onKeyPress='return acceptNum(event)' value='<? echo $identificacion ?>'>
                    </div>
                </div>

                <div class="formrow f1">
                    <div id="p1f4" class="field n1">
                        <div class="staticcontrol">
                            <div class="hrcenter px1"></div>
                        </div>          
                    </div>         
                </div>
                <div class="formrow f1">
                    <div id="p1f5" class="field n1">
                        <div class="staticcontrol"><span class="wordwrap"><span class="pspan arial" style="text-align: left; font-size:14px;"><span class="ispan" style="color:#000099" xml:space="preserve">DATOS DEL PAGO</span><span class="ispan" style="color:#EE3D23" xml:space="preserve"> </span></span></span></div>
                    </div>
                </div>

                <div class="formrow f1">
                    <div id="p1f7" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Nit. Entidad<BR>  Empleadora</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" title="*Campo Obligatorio" id="resolucion" onpaste="return false" name="nit_empleador" class="fieldcontent" readonly required='required' onKeyPress='return acceptNum(event)' value='<? echo $nit_empleador ?>'>
                            </div> 
                        </div> 
                    </div>
                </div>

                <div class="formrow f1">
                    <div id="p1f6" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f6c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Nit Entidad<BR>  Previsora</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" id="p1f2cc" title="*Campo Obligatorio" onpaste="return false" name="nit_previsional" class="fieldcontent" readonly required='required'  onKeyPress='return acceptNum(event)' value='<? echo $nit_previsora ?>'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="formrow f1 ">
                    <div id="p1f7" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Resolución</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" id="resolucion" title="*Campo Obligatorio" onpaste="return false" name="resolucion" class="fieldcontent" required='required' maxlength='10' onKeyPress='return acceptNumLetter(event)'>
                            </div> 
                        </div> 
                    </div>
                </div> 

                <div class="formrow f1 f2">
                    <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Resolución<BR>  Orden Pago</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" id="resolucion" onpaste="return false" name="resolucion_OP" title="Si no aplica, escriba 0" class="fieldcontent" required='required' maxlength='8' onKeyPress='return acceptNumLetter(event)' >
                            </div> 
                        </div> 
                    </div>

                    <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Fecha<BR>  Resolución</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" id="fecha_resolucion"  name="fecha_resolucion" title="Si no aplica, escriba 0" class="fieldcontent" required='required' placeholder="dd/mm/aaaa" maxlength="10" pattern="(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d" >
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="formrow f1 f2">
                    <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Consecutivo<BR>  Cuenta Cobro</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <?
                                foreach ($cuentas_pago as $key => $value) {
                                    $valor = $key;
                                    $cuenta = $cuentas_pago[$key]['consecutivo_cuenta'];
                                    echo "<input type='text' onpaste='return false' name='consec_cc" . $valor . "' class='fieldcontent' required='required'  readonly value='" . $cuenta . "'> <br>";
                                }
                                ?>
                            </div> 
                        </div> 
                    </div>

                    <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve">   Valor<BR>   Cuenta Cobro</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <?
                            foreach ($cuentas_pago as $key => $value) {
                                $valor = $key;
                                $cobro = $cuentas_pago[$key]['valor_pago'];
                                echo "<input type='text' onpaste='return false' pattern='\d{4,8}\.?\d{0,2}' name='valor_cobro_" . $valor . "' class='fieldcontent' required='required'  readonly value='" . $cobro . "'> <br>";
                            }
                            ?>
                        </div> 
                    </div>
                </div>

                <div class="formrow f1">
                    <div id="p1f7" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve">  Saldo Actual</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <?
                                foreach ($cuentas_pago as $key => $value) {
                                    $valor = $key;
                                    $saldo = $cuentas_pago[$key]['saldo'];
                                    echo "<input type='text' onpaste='return false' pattern='\d{4,8}\.?\d{0,2}' name='valor_saldo" . $valor . "' class='fieldcontent' required='required'  readonly value='" . $saldo . "'> <br>";
                                }
                                ?>
                            </div> 
                        </div> 
                    </div></div>

                <div class="formrow f1 f2">
                    <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Valor Pagado <BR>  Capital</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <?
                                foreach ($cuentas_pago as $key => $value) {
                                    $valor = $key;
                                    $cobro = $cuentas_pago[$key]['saldo'];
                                    echo "<input type='text'  id='valor_pagado_capital" . $valor . "' onpaste='return false' value='" . $cobro . "'title='*Campo Obligatorio' placeholder='00000000.00' pattern='\d{4,8}\.?\d{0,2}' name='valor_pagado_capital" . $valor . "' class='fieldcontent' maxlength='11' required='required' onKeyPress='return acceptNum2(event)' ><br>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f12"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" >   Valor Pagado <BR>   Interes</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <?
                                foreach ($cuentas_pago as $key => $value) {
                                    $valor = $key;
                                    echo "<input type='text' id='valor_pagado_interes" . $valor . "' value='0' onpaste='return false' title='*Campo Obligatorio' placeholder='00000000.00' pattern='\d{0,8}\.?\d{0,2}' name='valor_pagado_interes" . $valor . "' class='fieldcontent' maxlength='11' required='required' onKeyPress='return acceptNum2(event)'><br>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>    
                </div> 

                <div class="formrow f1">
                    <div id="p1f7" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f12c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Total Pagado</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" id="total_recaudo" readonly onpaste='return false' title="*Campo Obligatorio" pattern="\d{4,8}\.?\d{0,2}" placeholder="00000000.00" name="total_recaudo" class="fieldcontent" required='required' maxlength="11" onKeyPress='return acceptNum2(event)'>
                                <input name="suma" type="button" class="navbtn2" value="Sumar" onClick="valor()" />
                            </div>                       
                        </div>      
                    </div>
                </div>
                <div class="formrow f1">
                    <div id="p1f7" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Fecha Pago</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" id="fecha_pago_cuenta"  name="fecha_pago_cuenta" title="Campo obligatorio" class="fieldcontent" required='required' placeholder="dd/mm/aaaa" maxlength="10" pattern="(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d" >
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="formrow f1 f2">
                    <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" ><a STYLE="color: red" >* </a>Fecha Desde<br>  Pago</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <?
                                foreach ($cuentas_pago as $key => $value) {
                                    $valor = $key;
                                    echo "<input type='text' id='fecha_pago_inicio" . $valor . "' title='*Campo Obligatorio' onpaste='return false' name='fecha_pinicio" . $valor . "' class='fieldcontent' placeholder='dd/mm/aaaa' required='required' maxlength='10' pattern='(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d' >";
                                }
                                ?>

                            </div>
                        </div>
                    </div>  <div id="p1f12" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f7c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Fecha Hasta<BR>  Pago</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <?
                                foreach ($cuentas_pago as $key => $value) {
                                    $valor = $key;
                                    echo "<input type='text' id='fecha_pago_fin" . $valor . "' title='*Campo Obligatorio' onpaste='return false' name='fecha_pfin" . $valor . "' class='fieldcontent' placeholder='dd/mm/aaaa' required='required' maxlength='10' pattern='(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d' >";
                                }
                                ?>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="formrow f1">
                    <div id="p1f6" class="field n1">
                        <div class="caption capleft alignleft">
                            <label class="fieldlabel" for="p1f12c"><span><span class="pspan arial" style="text-align:left;font-size:14px;"><span class="ispan" style="color:#9393FF" xml:space="preserve"><a STYLE="color: red" >* </a>Observación<br>  de Pago</span></span></span></label>
                        </div>
                        <div class="control capleft">
                            <div>
                                <input type="text" id="p1f7c" onpaste='return false' title="*Campo Obligatorio" name="medio_pago" maxlength="50" placeholder="Medio de pago/Prescripción Cuota" class="fieldcontent" required='required' onKeyPress='return acceptNumLetter(event)' >
                            </div>
                            <div align="left"><a STYLE="color: red" ><br><br>* Campo obligatorio</a></div>
                        </div>      
                    </div>
                </div>






                <div class="null"></div
                <center> <input id="registrarBoton" type="submit" class="navbtn"  value="Guardar" onClick='return confirmarEnvio();'></center>
                <input type='hidden' name='opcion' value='guardarRecaudo'>
                <input type='hidden' name='action' value='<? echo $this->formulario; ?>'>
                <?
                foreach ($fecha_cobro as $key => $values) {
                    echo "<input type='hidden' name='fecha_cinicio" . $key . "' value='" . $fecha_cobro[$key]['inicio'] . "'>";
                    echo "<input type='hidden' name='fecha_cfin" . $key . "' value='" . $fecha_cobro[$key]['fin'] . "'>";
                }
                ?>
            </div>
        </form>

        <?
    }

}
