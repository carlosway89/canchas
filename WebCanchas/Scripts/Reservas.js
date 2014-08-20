

function ShowReserva(idEmp,idInst, nombre, fecha, precio) {
    var myArguments = new Object();
    var url = "";
      url = "/WebCanchas/frmMakeReserva.aspx?IdI=" + idInst + "&n=" + nombre + "&f=" + fecha + "&p=" + precio + "&IdE=" + idEmp;
    //url = "/frmMakeReserva.aspx?IdI=" + idInst + "&n=" + nombre + "&f=" + fecha + "&p=" + precio + "&IdE=" + idEmp;
    window.location = url;
    return false;

}


    function onKeyDown() {
        if (window.event.keyCode == 13) {
            event.keyCode = 9;
            event.returnValue = true;
            event.cancel = false;
        }
    }
