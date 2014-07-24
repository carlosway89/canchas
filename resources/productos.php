<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class productos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/productos_categoria_model');
        $this->load->model('admin/productos_marca_model');
        $this->load->model('admin/productos_model');
        $this->load->model('admin/buzon_mensajes_model');
    }

    function index() {
        $this->loaders->verificaAcceso('W');
        $idioma = $this->uri->segment(1);
        $data['titulo'] = '.: Favarato Express Inc. - ' . lang('idioma.productos-title-cabecera') . ' :.';
        $data['main_content'] = 'admin/productos/productos/panel_view';
        $data['mensajes_cabecera'] = $this->buzon_mensajes_model->mensajesQryCabecera(1);
        $data['categorias'] = $this->productos_categoria_model->productos_categoriaCombo(Array('L-PRODUCTO-CATEGORIA-COMBO', 'idioma' => $idioma, ''));
        $this->load->view('admin/panel_usuario/template', $data);
    }

    function cboSubCategoriasGet() {
        $idioma = $this->uri->segment(1);
        $tipo_cbo = $this->input->post('tipo');
        $id_cat = $this->input->post('id_cat');

        $query = $this->productos_categoria_model->productos_subcategoriaQry(array('L-PRODUCTO-PORTAL-SUBCATEGORIAS', $idioma, $id_cat));

        if ($tipo_cbo == "fnd") {
            $data[''] = lang('idioma.productos-search-combosubcat');
        } else {
            $data[''] = lang('idioma.productos-search-combo');
        }

        foreach ($query as $fila) {
            $data[utf8_encode($fila->nCatID)] = mb_convert_encoding($fila->cTbIdDescripcion, "UTF-8");
        }
        if ($tipo_cbo == "fnd") {
            $result = form_dropdown('cbo_fnd_productos_subcategorias', $data, '', 'id="cbo_fnd_productos_subcategorias" class="input-large cursor_pointer"');
        } else if ($tipo_cbo == "ins") {
            $result = form_dropdown('cbo_ins_prod_subcategorias', $data, '', 'id="cbo_ins_prod_subcategorias" class="input-xlarge cursor_pointer" required="required"');
        } else {
            $result = form_dropdown('cbo_upd_prod_subcategorias', $data, '', 'id="cbo_upd_prod_subcategorias" class="input-xlarge cursor_pointer" required="required"');
        }
        print_r($result);
    }

    function cboMarcasGet() {
        $id_categoria = $this->input->post('id_cat');
        $tipo_cbo = $this->input->post('tipo');
        $query = $this->productos_marca_model->productos_marcaQry(Array('L-PRODUCTO-MARCA-CRITERIO', '', 'no-data', $id_categoria));

        $data[''] = lang('idioma.productos-search-combo');

        foreach ($query as $fila) {
            $data[utf8_encode($fila->nMarID)] = mb_convert_encoding($fila->cMarDescripcion, "UTF-8");
        }

        if ($tipo_cbo == "ins") {
            $result = form_dropdown('cbo_ins_prod_marcas', $data, '', 'id="cbo_ins_prod_marcas" class="input-xlarge cursor_pointer" required="required"');
        } else {
            $result = form_dropdown('cbo_upd_prod_marcas', $data, '', 'id="cbo_upd_prod_marcas" class="input-xlarge cursor_pointer" required="required"');
        }

        print_r($result);
    }

    function getVista($parametros = null) {
        $this->load->view('admin/productos/productos/qry_view', $parametros);
    }

    function loadControlesAdicionales() {
        $accion = $this->input->post('accion');
        if ($accion == "ins") {
            $data["id_categoria"] = $this->input->post('id_cat');
            $this->load->view('admin/productos/productos/controles_adicionales_view', $data);
        } else {
            $data["nCatID"] = $this->input->post('id_cat');
            $this->load->view('admin/productos/productos/controles_adicionales_upd_view', $data);
        }
    }

    function productosQry($criterio = null, $categoria = null, $subcategoria = null) {
        $idioma = $this->uri->segment(1);
        $opcionesGrid = array(
            lang('idioma.productos-list-optedit') => "pencil",
            lang('idioma.productos-list-optfoto') => "folder-collapsed",
            lang('idioma.productos-list-optdel') => "trash",
        );

        if ($subcategoria == "") {
            $accion = 'L-PRODUCTOS-CRITERIO-1';
        } else {
            $accion = 'L-PRODUCTOS-CRITERIO-2';
        }

        $datos = $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'productos_model',
                    'metodo' => 'productosQry',
                    'criterios' => array(
                        'accion' => $accion,
                        'idioma' => $idioma,
                        'criterio' => rawurldecode($criterio),
                        'categoria' => $categoria,
                        'subcategoria' => $subcategoria,
                    ),
                    'pkid' => 'nProdID',
                    'opciones' => $opcionesGrid,
                    'columns' => array(
                        'nProdID',
                        'foto_producto',
                        'nombre_producto',
                        'descripcion_producto',
                        'categoria',
                        'subcategoria',
                        'cTbIdEstado',
                        'opcion'),
                )
        );
        print_r($datos);
    }

    function productosIns() {
        $this->form_validation->set_rules('txt_ins_prod_nombre_es', 'nombre (español)', 'required|trim');
        $this->form_validation->set_rules('txt_ins_prod_nombre_en', 'nombre (inglés)', 'required|trim');
        $this->form_validation->set_rules('txt_ins_prod_descripcion_es', 'descripción (español)', 'required|trim');
        $this->form_validation->set_rules('txt_ins_prod_descripcion_en', 'descripción (inglés)', 'required|trim');
        $this->form_validation->set_rules('cbo_ins_prod_categorias', 'categoría', 'required|trim');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == TRUE) {
            $this->productos_model->setProdNombreEs($this->input->post('txt_ins_prod_nombre_es'));
            $this->productos_model->setProdNombreEn($this->input->post('txt_ins_prod_nombre_en'));
            $this->productos_model->setProdDescripcionEs($this->input->post('txt_ins_prod_descripcion_es'));
            $this->productos_model->setProdDescripcionEn($this->input->post('txt_ins_prod_descripcion_en'));
            $this->productos_model->setProdCatId($this->input->post('cbo_ins_prod_categorias'));
            if ($this->input->post('cbo_ins_prod_subcategorias')) {
                $subcategoria = $this->input->post('cbo_ins_prod_subcategorias');
            } else {
                $subcategoria = null;
            }
            $this->productos_model->setProdSubCatId($subcategoria);
            if ($this->input->post('cbo_ins_prod_marcas')) {
                $marca = $this->input->post('cbo_ins_prod_marcas');
            } else {
                $marca = null;
            }
            $this->productos_model->setProdMarId($marca);
            $this->productos_model->setProdPrecio($this->input->post('txt_ins_prod_precio'));
            if ($this->input->post('txt_ins_prod_tallas_es') && $this->input->post('txt_ins_prod_tallas_en')) {
                $tallas_es = $this->input->post('txt_ins_prod_tallas_es');
                $tallas_en = $this->input->post('txt_ins_prod_tallas_en');
            } else {
                $tallas_es = null;
                $tallas_en = null;
            }
            $this->productos_model->setProdTallasEs($tallas_es);
            $this->productos_model->setProdTallasEn($tallas_en);
            $result = $this->productos_model->productosIns();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    function productosGet($nProdId) {
        $query = $this->productos_model->productosGet(Array('L-PRODUCTOS-CODIGO', '', $nProdId, '', ''));

        if ($query) {
            $data['nProdID'] = $this->productos_model->getProdId();
            $data['cProdNombreEs'] = $this->productos_model->getProdNombreEs();
            $data['cProdNombreEn'] = $this->productos_model->getProdNombreEn();
            $data['cProdDescripcionEs'] = $this->productos_model->getProdDescripcionEs();
            $data['cProdDescripcionEn'] = $this->productos_model->getProdDescripcionEn();
            $data['foto_producto'] = $this->productos_model->getProdFotoPortada();
            $data['nCatID'] = $this->productos_model->getProdCatId();
            $data['nSubCatID'] = $this->productos_model->getProdSubCatId();
            $data['nMarID'] = $this->productos_model->getProdMarId();
            $data['cProdFechaRegistro'] = $this->productos_model->getProdFechaRegistro();
            $data['cProdPrecio'] = $this->productos_model->getProdPrecio();
            $data['cProdTallasEs'] = $this->productos_model->getProdTallasEs();
            $data['cProdTallasEn'] = $this->productos_model->getProdTallasEn();
            $data['cProdEstado'] = $this->productos_model->getProdEstado();
            return $data;
        } else {
            return false;
        }
    }

    function popupEditar($nProdId) {
        $idioma = $this->uri->segment(1);
        $data = $this->productosGet($nProdId);
        $data['categorias_upd'] = $this->productos_categoria_model->productos_categoriaCombo(Array('L-PRODUCTO-CATEGORIA-COMBO', 'idioma' => $idioma, ''));
        $data['subcategorias_upd'] = $this->productos_categoria_model->productos_subcategoriaQry(array('L-PRODUCTO-PORTAL-SUBCATEGORIAS', $idioma, $data['nCatID']));
        $data['marcas_upd'] = $this->productos_marca_model->productos_marcaQry(Array('L-PRODUCTO-MARCA-CRITERIO', '', 'no-data', $data['nCatID']));

        $this->load->view('admin/productos/productos/upd_view', $data);
    }

    function productosUpd($nProdId) {
        $this->form_validation->set_rules('txt_upd_prod_nombre_es', 'nombre (español)', 'required|trim');
        $this->form_validation->set_rules('txt_upd_prod_nombre_en', 'nombre (inglés)', 'required|trim');
        $this->form_validation->set_rules('txt_upd_prod_descripcion_es', 'descripción (español)', 'required|trim');
        $this->form_validation->set_rules('txt_upd_prod_descripcion_en', 'descripción (inglés)', 'required|trim');
        $this->form_validation->set_rules('cbo_upd_prod_categorias', 'categoría', 'required|trim');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == TRUE) {
            $this->productos_model->setProdId($nProdId);
            $this->productos_model->setProdNombreEs($this->input->post('txt_upd_prod_nombre_es'));
            $this->productos_model->setProdNombreEn($this->input->post('txt_upd_prod_nombre_en'));
            $this->productos_model->setProdDescripcionEs($this->input->post('txt_upd_prod_descripcion_es'));
            $this->productos_model->setProdDescripcionEn($this->input->post('txt_upd_prod_descripcion_en'));
            $this->productos_model->setProdCatId($this->input->post('cbo_upd_prod_categorias'));
            
            if ($this->input->post('cbo_upd_prod_subcategorias')) {
                $subcategoria = $this->input->post('cbo_upd_prod_subcategorias');
            } else {
                $subcategoria = null;
            }
            
            $this->productos_model->setProdSubCatId($subcategoria);
            
            if ($this->input->post('cbo_upd_prod_marcas')) {
                $marca = $this->input->post('cbo_upd_prod_marcas');
            } else {
                $marca = null;
            }
            
            
            $this->productos_model->setProdMarId($marca);
            $this->productos_model->setProdPrecio($this->input->post('txt_upd_prod_precio'));
            
            if ($this->input->post('txt_upd_prod_tallas_es') && $this->input->post('txt_upd_prod_tallas_en')) {
                $tallas_es = $this->input->post('txt_upd_prod_tallas_es');
                $tallas_en = $this->input->post('txt_upd_prod_tallas_en');
            } else {
                $tallas_es = null;
                $tallas_en = null;
            }
            
            $this->productos_model->setProdTallasEs($tallas_es);
            $this->productos_model->setProdTallasEn($tallas_en);
            $result = $this->productos_model->productosUpd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    function productosDel($nProdID) {
        $result = $this->productos_model->productosDel(array('DEL-PRODUCTOS', $nProdID, '', '', '', '', '', '', '', '', '',''));

        if ($result) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function productosValidacion() {
        $accion = $this->input->post('accion');
        $nProID = $this->input->post('id');

        $criterio = trim(preg_replace("/ +/", " ", $this->input->post('criterio')));
        $lang = trim(preg_replace("/ +/", " ", $this->input->post('lang')));
        $result = $this->loaders->validacionDato($accion, $nProID, $criterio, '', $lang, '');

        if ($result == "true") {
            echo "false";
        } else {
            echo "true";
        }
    }

    /* FOTOS DE LOS PRODUCTOS */

    function load_upload_foto_view($nProdID) {
        $data = $this->productosGet($nProdID);
        $this->load->view('admin/productos/productos/panel_fotos_view', $data);
    }

    function productosUploadFoto() {
        if (!empty($_FILES)) {
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $ruta = "uploads/uploads_productos/";
            $nombreArchivox = md5(mt_rand(21474, 42949)) . "_" . $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];

            $accion = 'UPLOAD-INS-MULTIMEDIA-PRODUCTO';
            $this->productos_model->setProdId($this->input->post('id_prod'));
            $this->productos_model->setMultLinkMiniatura($nombreArchivox);
            $this->productos_model->setMultTituloEs($this->input->post('titulo_foto_es'));
            $this->productos_model->setMultTituloEn($this->input->post('titulo_foto_en'));

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->productos_model->productosUploadFoto($accion);

                if ($result) {
                    echo 1; //EXITO 
                } else {
                    echo "0";
                }
            }
        }
    }

    function productosQryFotos($nProdID) {
        $data["registros"] = $this->productos_model->productosQryFotos(Array('L-MULTIMEDIA-PRODUCTOS-CRITERIO', $this->uri->segment(1), $nProdID));
        $this->load->view('admin/productos/productos/qry_fotos_view', $data);
    }

    function popupEditarDataFoto($nMultID) {
        $data = $this->productosGetInfoFoto($nMultID);
        $this->load->view('admin/productos/productos/upd_foto_view', $data);
    }

    function productosGetInfoFoto($nMultID) {
        $query = $this->productos_model->productosGetInfoFoto(Array('L-MULTIMEDIA-PRODUCTOS-CODIGO', '', $nMultID));

        if ($query) {
            $data['code_mul'] = $this->productos_model->getMultId();
            $data['titulo_foto_es'] = $this->productos_model->getMultTituloEs();
            $data['titulo_foto_en'] = $this->productos_model->getMultTituloEn();
            $data['foto_actual'] = $this->productos_model->getMultLinkMiniatura();
            $data['estado_mul'] = $this->productos_model->getMultEstado();
            return $data;
        } else {
            return false;
        }
    }

    function productosDataFotoUpd($nMultID) {
        $this->form_validation->set_rules('txt_upd_prod_foto_titulo_es', 'título (español)', 'required|trim');
        $this->form_validation->set_rules('txt_upd_prod_foto_titulo_en', 'título (inglés)', 'required|trim');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == TRUE) {
            $accion = "UPLOAD-UPD-MULTIMEDIA-PRODUCTO";
            $this->productos_model->setMultId($nMultID);
            $this->productos_model->setMultTituloEs($this->input->post('txt_upd_prod_foto_titulo_es'));
            $this->productos_model->setMultTituloEn($this->input->post('txt_upd_prod_foto_titulo_en'));
            $result = $this->productos_model->productosDataFotoUpd($accion);
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    function fotoProductoDel($nMultID) {
        $result = $this->productos_model->fotoProductoDel(array('UPLOAD-DEL-MULTIMEDIA-PRODUCTO', $nMultID, '', '', ''));

        if ($result) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function fotoProductoPortada($nMultID) {
        $result = $this->productos_model->fotoProductoPortada(array('UPLOAD-PORTADA-MULTIMEDIA-PRODUCTO', $nMultID, '', '', ''));

        if ($result) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function productoGetFoto() {
        $id_mult = $this->input->post('id_mult');
        $tipo_foto = $this->input->post('tipo_foto');
        $this->productosGetInfoFoto($id_mult);

        if ($this->productos_model->getMultEstado() != 'I') {
            $foto = $this->productos_model->getMultLinkMiniatura();
        } else {
            $foto = 'nofoto.jpg';
        }

        if ($tipo_foto == "small") {
            $clase = "img_foto";
            $sub_content = "";
        } else {
            $clase = "foto_portada_obras";
            $sub_content = "<p>" . lang('idioma.productos-form-upload-label') . "</p>";
        }

        if ($foto == "nofoto.jpg") {
            $enlace.= "<img class='" . $clase . "' src='" . URL_IMG . $foto . "'/>";
            $enlace.= $sub_content;
        } else {
            $enlace.= "<a title='" . lang('idioma.productos-form-upload-label') . "' class='pretty-foto-productos' href='" . URL_UPLOADS . "uploads_productos/$foto'><img class='" . $clase . "' src='" . URL_UPLOADS . "uploads_productos/" . $foto . "'/></a>";
            $enlace.= $sub_content;
        }


        echo $enlace;
    }

    function vista_upload_foto_upd($nMultID) {
        $dato = (explode("--", $nMultID));
        $data = $this->productosGetInfoFoto($dato[0], $dato[1]);
        $data["estado"] = $dato[1];
        $this->load->view('admin/productos/productos/panel_updfoto_view', $data);
    }

    function productosUploadUpdFoto() {
        if (!empty($_FILES)) {
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $ruta = "uploads/uploads_productos/";
            $nombreArchivox = md5(mt_rand(21474, 42949)) . "_" . $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];

            $accion = 'UPLOAD-ACTUALIZAR-MULTIMEDIA-PRODUCTO';
            $this->productos_model->setMultId($this->input->post('id_mult'));
            $this->productos_model->setMultLinkMiniatura($nombreArchivox);

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->productos_model->productosUploadUpdFoto($accion);

                if ($result) {
                    echo 1; //EXITO 
                } else {
                    echo "0";
                }
            }
        }
    }

}

?>
