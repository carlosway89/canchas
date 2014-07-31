<?php     

echo form_open(current_url()); ?>
<?php echo $custom_error; ?>
<?php echo form_hidden('nCanID',$result->nCanID) ?>

                                    <p><label for="cCanNombre">CCanNombre<span class="required">*</span></label>                                
                                    <input id="cCanNombre" type="text" name="cCanNombre" value="<?php echo $result->cCanNombre ?>"  />
                                    <?php echo form_error('cCanNombre','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cCanDescripcion">CCanDescripcion<span class="required">*</span></label>                                
                                    <input id="cCanDescripcion" type="text" name="cCanDescripcion" value="<?php echo $result->cCanDescripcion ?>"  />
                                    <?php echo form_error('cCanDescripcion','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cCanLatitud">CCanLatitud<span class="required">*</span></label>                                
                                    <input id="cCanLatitud" type="text" name="cCanLatitud" value="<?php echo $result->cCanLatitud ?>"  />
                                    <?php echo form_error('cCanLatitud','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cCanLongitud">CCanLongitud<span class="required">*</span></label>                                
                                    <input id="cCanLongitud" type="text" name="cCanLongitud" value="<?php echo $result->cCanLongitud ?>"  />
                                    <?php echo form_error('cCanLongitud','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nUbiDepartamento">NUbiDepartamento<span class="required">*</span></label>                                
                                    <input id="nUbiDepartamento" type="text" name="nUbiDepartamento" value="<?php echo $result->nUbiDepartamento ?>"  />
                                    <?php echo form_error('nUbiDepartamento','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nUbiProvincia">NUbiProvincia<span class="required">*</span></label>                                
                                    <input id="nUbiProvincia" type="text" name="nUbiProvincia" value="<?php echo $result->nUbiProvincia ?>"  />
                                    <?php echo form_error('nUbiProvincia','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nUbiDistrito">NUbiDistrito<span class="required">*</span></label>                                
                                    <input id="nUbiDistrito" type="text" name="nUbiDistrito" value="<?php echo $result->nUbiDistrito ?>"  />
                                    <?php echo form_error('nUbiDistrito','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="dCanFechaRegistro">DCanFechaRegistro<span class="required">*</span></label>                                
                                    <input id="dCanFechaRegistro" type="text" name="dCanFechaRegistro" value="<?php echo $result->dCanFechaRegistro ?>"  />
                                    <?php echo form_error('dCanFechaRegistro','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nCanVisitas">NCanVisitas<span class="required">*</span></label>                                
                                    <input id="nCanVisitas" type="text" name="nCanVisitas" value="<?php echo $result->nCanVisitas ?>"  />
                                    <?php echo form_error('nCanVisitas','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cCanEstado">CCanEstado<span class="required">*</span></label>                                
                                    <input id="cCanEstado" type="text" name="cCanEstado" value="<?php echo $result->cCanEstado ?>"  />
                                    <?php echo form_error('cCanEstado','<div>','</div>'); ?>
                                    </p>
                                    
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
