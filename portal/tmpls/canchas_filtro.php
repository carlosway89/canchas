<div>
    <div class="blog-post animate-onscroll">
        <div class="post-image">
            <a href="canchas/informacion/cancha_<%- can.nCanID%>" target="_blank">
                <img src="<%- can.cCanFotoPortada %>" alt="solocanchas.com">
            </a>
        </div>

        <h4 class="post-title">
            <a href="canchas/informacion/cancha_<%- can.nCanID%>" target="_blank">
               <%- can.cCanNombre %>
            </a>
        </h4>

        <p>
            <i class="icons icon-location"></i> Dirección: <%- can.direccion%>
        </p>
        <p>
            <i class="icons icon-home"></i> <%- can.provincia %>, <%- can.departamento %>
        </p>
        <p>
            <i class="icons icon-phone"></i> Teléfono:<%- can.telefono%>
        </p>
        <p>
            <i class="icons icon-flag-1"></i> Canchas:  <%- can.nro_canchas%>
        </p>
        <a class="button donate btn_reservar fancybox media-icon" href="#modal-cancha-reservar-<%- can.nCanID%>" ><i class="icons icon-right-hand"></i> Reservar</a>
        
    </div>

    <!-- modal para reservar por Item-->
    <div id="modal-cancha-reservar-<%- can.nCanID%>" style="width: 850px;height:550px;display: none;">

        <% 
        var enlace=can.nCanEnlace;

        if(enlace==''){ %>
        <h3>Lo sentimos!!!</h3>
        <div class="alert alert-warning">
            Esta cancha aún no esta habilitada para reservas.
        </div>
        <%}else{%>
        <iframe src="http://solocanchas.com/WebCanchas/frmReserva.aspx?IdEmpresa=<%- can.nCanEnlace%>" width="100%" height="100%">
        </iframe>
        <%  }  %>
    </div>
    <!-- /modal reservar-->

</div>