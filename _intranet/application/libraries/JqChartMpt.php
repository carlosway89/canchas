<?php

class JqChartMpt {

    private $_Chart;
    private $_ChartOptions;
    private $_Title;
    private $_Axisx;
    private $_Axisy;
    private $_Leyend;
    private $_ToolTip;
    private $_Series;
    private $_SeriesOption;
    private $_Width;
    private $_Height;
    private $_PlotOptions;
    private $_X;
    private $_Y;

    function __construct() {
//        $this->_Chart = new jqChart();
    }

    public function get_X() {
        return $this->_X;
    }

    public function set_X($_X) {
        $this->_X = $_X;
    }

    public function get_Y() {
        return $this->_Y;
    }

    public function set_Y($_Y) {
        $this->_Y = $_Y;
    }

    public function get_PlotOptions() {
        return $this->_PlotOptions;
    }

    public function set_PlotOptions($_PlotOptions) {
        if (isset($_PlotOptions['PlotOptions'])) {
            $this->_PlotOptions = array(
                "area" => array(
                    "pointStart" => 1940,
                    "marker" => array(
                        "enabled" => false,
                        "symbol" => "circle",
                        "radius" => 2,
                        "states" => array("hover" => array("enabled" => true))
                    )
                )
            );
        } else {
            $this->_PlotOptions = array(
                "area" => array(
                    "pointStart" => 1940,
                    "marker" => array(
                        "enabled" => true,
                        "symbol" => "circle",
                        "radius" => 2,
                        "states" => array("hover" => array("enabled" => true))
                    )
                )
            );

        }
    }

    public function get_Width() {
        return $this->_Width;
    }

    public function set_Width($_Width) {

        if (isset($_Width['Dimensiones']['width']))
            $this->_Width = $_Width['Dimensiones']['width'];
        else
//            $this->_Width = 850;
//             $this->_Width = '850';
              $this->_Width = null;
    }

    public function get_Height() {
/*okkk*/
        return $this->_Height;
    }

    public function set_Height($_Height) {
        if (isset($_Height['Dimensiones']['height']))
            $this->_Height = $_Height['Dimensiones']['height'];
        else
//            $this->_Height = 400;
//         $this->_Height = '400';
          $this->_Height = null;
    }

    public function get_SeriesOption() {
        return $this->_SeriesOption;
    }

    public function set_SeriesOption($_SeriesOption) {

        if (isset($_SeriesOption['SeriesOption'])) {
            $this->_SeriesOption = $_SeriesOption['SeriesOption'];
        } else {

            $this->_SeriesOption = array(
                "dataLabels" => array(
                    "enabled" => true,
                    "rotation" => -90,
                    "color" => '#FFFFFF',
                    "align" => 'right',
                    "x" => -3,
                    "y" => 10,
                    "formatter" => "js:function() {return this.y;}",
                    "style" => array(
                        "font" => 'normal 13px Verdana, sans-serif'
                    )
                )
            );
        }
    }

    public function get_Series() {
        return $this->_Series;
    }

    public function set_Series($_Series) {
        $this->_Series = $_Series;
    }

    public function get_ToolTip() {
        return $this->_ToolTip;
    }

    public function set_ToolTip($_ToolTip) {
        if (isset($_ToolTip['ToolTip']))
            $this->_ToolTip = $_ToolTip['ToolTip'];
    }

    public function get_Axisx() {
        return $this->_Axisx;
    }

    public function get_Data($Modelo = null, $Metodo = null, $Parametros = null, $Columns = null) {

        $CI = & get_instance();
        $CI->load->model("Helpdesk/" . $Modelo);
        $aDataList = $CI->$Modelo->$Metodo($Parametros);
        $i = 0;

        if ($aDataList) {
            foreach ($aDataList as $aDataList) {
                $X[$i] = $aDataList[$Columns['X']];
                $Y[$i] = $aDataList[$Columns['Y']];
                $i++;
            }
        } else {
            $X = "Sin Datos";
            $Y = "Sin Datos";
        }
        $this->set_X($X);
        $this->set_Y($Y);
    }

    public function set_Axisx($aData) {
        if (is_array($aData['Modelo']) && is_array($aData['Metodo']) && COUNT(is_array($aData['Parametros'])) > 0 && COUNT(is_array($aData['Columns'])) > 0 && is_array($aData['NameSerie'])) {
            $i = 0;
            foreach ($aData["NameSerie"] as $Name_Serie) {
                $this->get_Data($aData['Modelo'][$i], $aData['Metodo'][$i], $aData['Parametros'][$i], $aData['Columns'][$i]);
                $this->_Chart->addSeries($Name_Serie, $this->_Y);
                $this->set_Y(array());
                $i++;
            }
            if (isset($aData["labels"])) {
                $this->_Axisx = array("categories" => $this->_X, $aData['labels']);
            } else {
                $this->_Axisx = array("labels" => array("formatter" => "js:function(){return this.value;}"));
            }
        } else {

            $this->get_Data($aData['Modelo'], $aData['Metodo'], $aData['Parametros'], $aData['Columns']);
            if ($aData["ChartOptions"]["defaultSeriesType"] == "pie") {
                $Y = $this->get_Y();
                foreach ($Y as $Y) {
                    $X[] = array("Probando", $Y);
                }
                $this->_Chart->addSeries($aData["NameSerie"], $X);
            } else {
                $this->_Chart->addSeries($aData["NameSerie"], $this->_Y);
                $this->_Chart->setSeriesOption($aData["NameSerie"], $this->get_SeriesOption());
            }
            if (isset($aData["labels"])) {
                $this->_Axisx = array("categories" => $this->_X, $aData['labels']);
            } else {
                $this->_Axisx = array("categories" => $this->_X, 'labels' => array(
                        "rotation" => -45,
                        "align" => "right",
                        "style" => array("font" => "normal 13px Verdana, sans-serif")
                        ));
            }
        }
    }

    public function get_Axisy() {
        return $this->_Axisy;
    }

    public function set_Axisy($_Axisy) {
        /* PARA AREA
          array(
          "title"=>array("text"=>'Nuclear weapon states'),
          "labels"=>array("formatter"=>"js:function(){return this.value/1000 +'k';}")
          ) */
        if (isset($_Axisy['Axisy']))
            $this->_Axisy = $_Axisy['Axisy'];
    }
    public function get_Leyend() {
        return $this->_Leyend;
    }

    public function set_Leyend($_Leyend) {
        if (isset($_Leyend['Leyend']))
            $this->_Leyend = $_Leyend['Leyend'];
        else
            $this->_Leyend = array(false);
    }
    public function get_ChartOptions() {
        return $this->_ChartOptions;
    }
    public function set_ChartOptions($_ChartOptions) {
        if (isset($_ChartOptions['ChartOptions'])) {
            if (isset($_ChartOptions['ChartOptions']['defaultSeriesType'])) {
                $this->_ChartOptions = $_ChartOptions['ChartOptions'];
            } else {
                $this->_ChartOptions = array(
                    "defaultSeriesType" => "column",
                    "margin" => array(50, 50, 100, 80));
            }
        } else {
            $this->_ChartOptions = 'alert("No configuro correctamente el Jq Chart. ")';
        }
    }
    public function get_Title() {
        return $this->_Title;
    }
    public function set_Title($_Title) {
        if (isset($_Title['Title'])) {
            $this->_Title = $_Title['Title'];
        } else {
            $this->_Title = "No configuró su Título";
        }
    }
    public function get_Chart($aData) {
        $this->set_Width($aData);
        $this->set_Height($aData);
        $this->set_ChartOptions($aData);
        $this->set_Title($aData);
        $this->set_SeriesOption($aData);
        $this->set_Axisx($aData);
        $this->set_Axisy($aData);
        $this->set_Leyend($aData);
        $this->set_ToolTip($aData);
        $this->_Chart->setChartOptions($this->get_ChartOptions());
        $this->_Chart->setTitle($this->get_Title());
        $this->_Chart->setxAxis($this->get_Axisx());
        $this->_Chart->setyAxis($this->get_Axisy());
        $this->_Chart->setLegend($this->get_Leyend());
        $this->_Chart->setTooltip($this->get_ToolTip());
        return $this->_Chart->renderChart('', true, $this->get_Width(), $this->get_Height());
    }

    public function set_Chart($_Chart) {
        $this->_Chart = $_Chart;
    }


}

?>
