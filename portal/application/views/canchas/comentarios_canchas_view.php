

<div class="col-lg-12 col-md-12 col-sm-12">
    
    <!-- Commentarios -->
    <div class="post-comments">
        <div class="side-segment">
            <h3><i class="icons icon-chat"></i> Comentarios</h3>
        </div>
        <ul>
            
            <?php 
            $cantidad=count($list_comentarios);
            if ($cantidad<1) {
                echo '<br><div class="alert alert-info">Esta Cancha Aún no tiene comentarios sé el primero en hacerlo</div>';
            }else{
                for ($i=0; $i < $cantidad; $i++) {  ?>
            
            <li>
                <div class="comment animate-onscroll">
                    <div class="comment-author">
                        <img src="<?php echo URL_IMG; ?>testimonials/desconocido.jpg" alt="solocanchas.com">
                        <div class="author-meta">
                            <h6><?php echo $list_comentarios[$i]['cComcaNombrePersona']; ?></h6>
                            <div class="comment-meta">
                                <span>Comentó el 
                                    <?= date("d M Y",strtotime($list_comentarios[$i]['dComcaFechaRegistro']));?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="comment-content">
                        <p>
                            <?php echo $list_comentarios[$i]['cComcaTexto']; ?>
                        </p>
                    </div>
                </div>

            </li>
            <?php 
                } 
            }
            ?>

        </ul>
    </div>

    <!-- Post Comentarios-->
    <div class="comentar-box">
        <h3 class="animate-onscroll">Deja un comentario a esta cancha</h3>                    
        <p class="animate-onscroll">Los campos marcados con * son requeridos.</p>

        <?php   
        $atributosForm = array('id ' => 'comment-form', "class" => 'animate-onscroll');
        
        echo form_open(base_url().'canchas/comentar', $atributosForm); ?>            
            <div class="inline-inputs">
                
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label>Nombre*</label>
                    <input type="text" id="comentario-nombre" name="cComcaNombrePersona" placeholder="Nombre" required>                                
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label>Email*</label>
                    <input type="text" id="comentario-email" name="nComcaEmail" placeholder="Email" required>    
                </div>                
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>Comentario *</label>
                    <textarea rows="10" id="comentario-mensaje" name="cComcaTexto" placeholder="Tu comentario" required></textarea>
                </div>
                <div class="hidden">
                    <input id="comentario-canID" name="nCanID" type="hidden" value="<?=$nCanID?>">
                    <input name="nombre_id" value="<?=$nombre_id?>" type="hidden">
                </div>
                
            </div>
            <br>
            <button type="submit" class="">Dejar Comentario</button>
            
        <?php echo form_close(); ?>
    </div>
</div>