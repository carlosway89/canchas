<form id="contact-form" action="" method="POST">

    <div class="inline-inputs">

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Apellidos*</label>
            <input type="text" id="contact-firstname" name="contact-firstname" required="required"> 	
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Nombres*</label>
            <input type="text" id="contact-lastname" name="contact-lastname" required="required"> 	
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Correo electrónico*</label>
            <input type="text" id="contact-email" name="contact-email" required="required">								
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Teléfono</label>
            <input type="text" id="contact-phone" name="contact-phone"> 	
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <label>Tu consulta/comentario</label>
            <textarea rows="5" id="contact-message" name="contact-message" required="required"></textarea>
        </div>

    </div>

    <input type="submit" value="Enviar">

</form>
