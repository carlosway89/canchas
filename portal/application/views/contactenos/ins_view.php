<form id="contact-form" action="contactenos/contactoIns" method="POST">

    <div class="inline-inputs">

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Apellidos*</label>
            <input type="text" id="contact_firstname" name="contact_firstname" required="required"> 	
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Nombres*</label>
            <input type="text" id="contact_lastname" name="contact_lastname" required="required"> 	
        </div>


        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Correo electrónico*</label>
            <input type="text" id="contact_email" name="contact_email" required="required">								
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Teléfono</label>
            <input type="text" id="contact_phone" name="contact_phone"> 	
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <label>Tu consulta/comentario</label>
            <textarea rows="5" id="contact_message" name="contact_message" required="required"></textarea>
        </div>

        <input type="submit" value="Enviar" id="btn_ins_contacto"> <span id="sms_ins_contacto"></span>
    </div>


</form>
