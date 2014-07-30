<?php

class Loaders {

    //CREA MENU DE OPCIONES
    public function get_menu() {
        $CI = & get_instance();
        $CI->load->model('admin/objeto_model', 'objObjeto');

        if ($CI->uri->segment(2) == "") {
            $ruta = $CI->uri->segment(1);
        } else {
            $ruta = $CI->uri->segment(1) . '/' . $CI->uri->segment(2);
        }

        $url = $ruta;
        $data = array('url' => $url);
        $CI->session->set_userdata($data);
        return $CI->objObjeto->listaMenuOpciones2();
    }

//    public function get_menu_body() {
//        $CI = & get_instance();
//        $CI->load->model('admin/objeto_model', 'objObjeto');
//        $url = $CI->uri->segment(1) . '/' . $CI->uri->segment(2). '/' . $CI->uri->segment(3);
//        $data = array('url' => $url);
//        $CI->session->set_userdata($data);
//        return $CI->objObjeto->listaMenuOpciones3();
//    }
    //VERIFICAR ACCESO DE USUARIO
    public function verificaAcceso($plataforma) {
        $CI = & get_instance();
        $iduser = $CI->session->userdata('nUsuID');

        if ($iduser) {
            $url = $CI->uri->segment(1) . '/' . $CI->uri->segment(2);
            $iduser = $CI->session->userdata('nUsuID');
        } else {
            redirect("acceso/");
        }
    }

    public function generaconsulta($Accion, $tabla, $campos, $Data) {
        $CI = & get_instance();
        $comilla = "'";
        if ($Accion == "INS") {
            $stringcampos = $campos[0];
            for ($i = 1; $i < count($campos); $i++) {
                $stringcampos = $stringcampos . "," . $campos[$i];
            }
            $stringsubdata = "";
            for ($i = 0; $i < count($Data); $i++) {
                for ($j = 0; $j < count($campos); $j++) {
                    if ($j == 0) {
                        $stringsubdata = $stringsubdata . "(" . $comilla . $Data[$i][$j] . $comilla;
                    } else {
                        $stringsubdata = $stringsubdata . "," . $comilla . $Data[$i][$j] . $comilla;
                    }
                }
                if ($i == count($Data) - 1) {
                    $stringsubdata = $stringsubdata . ");";
                } else {
                    $stringsubdata = $stringsubdata . "),";
                }
            }
            $generaconsulta = "insert into " . $tabla . "  (" . $stringcampos . ") values" . $stringsubdata;
        }

        $query = $CI->db->query($generaconsulta);
        $CI->db->close();
        if ($query)
            return true;
        else
            return false;
    }

    // FUNCION DE VERIFICACION DE DATOS
    function validacionDato($accion, $parametro, $parametro2, $tipo, $param2, $param3) {
        $CI = & get_instance();
        $parametros = array(
            $accion,
            $parametro,
            $parametro2,
            $tipo,
            $param2,
            $param3,
            '',
            '',
            '',
        );

        $query = $CI->db->query("CALL USP_GEN_S_VerificarDato(?,?,?,?,?,?,?,?,?)", $parametros);
        $CI->db->close();
        if ($query->num_rows() > 0) {
            return "true";
        } else {
            return "false";
        }
    }

    //EVITAR INYECCION SQL - renzo probando
    public function FiltrarTexto($str, $html = true, $e = 'ISO-8859-15') {
        if (is_array($str)) {
            $final = array();

            foreach ($str as $param => $value)
                $final[$param] = self::FilterText($value, $html, $e);

            return $final;
        }

        if (!is_string($str))
            return $str;

        if (self::isUtf8($str))
            $e = 'UTF-8';

        $str = stripslashes(trim($str));

        if ($html)
            $str = htmlentities($str, ENT_QUOTES, $e, false);

        $str = self::escape($str);
        $str = str_replace('&amp;', '&', $str);
        $str = iconv($e, 'ISO-8859-15//TRANSLIT//IGNORE', $str);

        return nl2br($str);
    }

    public function isUtf8($str) {
        $len = strlen($str);

        for ($i = 0; $i < $len; $i++) {
            $c = ord($str[$i]);

            if ($c > 128) {
                if (($c > 247))
                    return false;
                else if ($c > 239)
                    $bytes = 4;
                else if ($c > 223)
                    $bytes = 3;
                else if ($c > 191)
                    $bytes = 2;
                else
                    return false;

                if (($i + $bytes) > $len)
                    return false;

                while ($bytes > 1) {
                    $i++;
                    $b = ord($str[$i]);

                    if ($b < 128 || $b > 191)
                        return false;

                    $bytes--;
                }
            }
        }

        return true;
    }

    function escape($str, $magic_quotes = false) {
        switch (gettype($str)) {
            case 'string' :
                $replaceQuote = "\\'"; /// string to use to replace quotes
                if (!$magic_quotes) {

                    if ($replaceQuote [0] == '\\') {
                        $str = str_replace("\0", "\\\0", str_replace('\\', '\\\\', $str));
                    }
                    return "'" . str_replace("'", $replaceQuote, $str) . "'";
                }

                // undo magic quotes for "
                $str = str_replace('\\"', '"', $str);

                if ($replaceQuote == "\\'") {// ' already quoted, no need to change anything
                    return "'$str'";
                } else {// change \' to '' for sybase/mssql
                    $str = str_replace('\\\\', '\\', $str);
                    return "'" . str_replace("\\'", $treplaceQuote, $str) . "'";
                }
                break;
            case 'boolean' : $str = ($str === FALSE) ? 0 : 1;
                return $str;
                break;
            case 'integer' : $str = ($str === NULL) ? 'NULL' : $str;
                return $str;
                break;
            default : $str = ($str === NULL) ? 'NULL' : $str;
                return $str;
                break;
        }
    }

    // Encriptar cadenas con key predeterminada - Cuidado!, renzot probando
    function encrypt($string) {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr(KEY_ENCRIPT, ($i % strlen(KEY_ENCRIPT)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result.=$char;
        }
        return base64_encode($result);
    }

    // Desencriptar cadenas con key predeterminada - Cuidado!, renzot probando
    function decrypt($string) {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr(KEY_ENCRIPT, ($i % strlen(KEY_ENCRIPT)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result.=$char;
        }
        return $result;
    }

}