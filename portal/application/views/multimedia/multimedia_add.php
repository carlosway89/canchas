<?php     

echo form_open(current_url()); ?>
<?php echo $custom_error; ?>

                                    <p><label for="nMultTipoID">NMultTipoID<span class="required">*</span></label>                                
                                    <input id="nMultTipoID" type="text" name="nMultTipoID" value="<?php echo set_value('nMultTipoID'); ?>"  />
                                    <?php echo form_error('nMultTipoID','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nMultCategID">NMultCategID<span class="required">*</span></label>                                
                                    <input id="nMultCategID" type="text" name="nMultCategID" value="<?php echo set_value('nMultCategID'); ?>"  />
                                    <?php echo form_error('nMultCategID','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultLinkMiniatura">CMultLinkMiniatura<span class="required">*</span></label>                                
                                    <input id="cMultLinkMiniatura" type="text" name="cMultLinkMiniatura" value="<?php echo set_value('cMultLinkMiniatura'); ?>"  />
                                    <?php echo form_error('cMultLinkMiniatura','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultLink">CMultLink<span class="required">*</span></label>                                
                                    <input id="cMultLink" type="text" name="cMultLink" value="<?php echo set_value('cMultLink'); ?>"  />
                                    <?php echo form_error('cMultLink','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultTitulo">CMultTitulo<span class="required">*</span></label>                                
                                    <input id="cMultTitulo" type="text" name="cMultTitulo" value="<?php echo set_value('cMultTitulo'); ?>"  />
                                    <?php echo form_error('cMultTitulo','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultDescripcion">CMultDescripcion<span class="required">*</span></label>                                
                                    <input id="cMultDescripcion" type="text" name="cMultDescripcion" value="<?php echo set_value('cMultDescripcion'); ?>"  />
                                    <?php echo form_error('cMultDescripcion','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultFechaRegistro">CMultFechaRegistro<span class="required">*</span></label>                                
                                    <input id="cMultFechaRegistro" type="text" name="cMultFechaRegistro" value="<?php echo set_value('cMultFechaRegistro'); ?>"  />
                                    <?php echo form_error('cMultFechaRegistro','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultFechaInicial">CMultFechaInicial<span class="required">*</span></label>                                
                                    <input id="cMultFechaInicial" type="text" name="cMultFechaInicial" value="<?php echo set_value('cMultFechaInicial'); ?>"  />
                                    <?php echo form_error('cMultFechaInicial','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultFechaFinal">CMultFechaFinal<span class="required">*</span></label>                                
                                    <input id="cMultFechaFinal" type="text" name="cMultFechaFinal" value="<?php echo set_value('cMultFechaFinal'); ?>"  />
                                    <?php echo form_error('cMultFechaFinal','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nParID">NParID<span class="required">*</span></label>                                
                                    <input id="nParID" type="text" name="nParID" value="<?php echo set_value('nParID'); ?>"  />
                                    <?php echo form_error('nParID','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultEstado">CMultEstado<span class="required">*</span></label>                                
                                    <input id="cMultEstado" type="text" name="cMultEstado" value="<?php echo set_value('cMultEstado'); ?>"  />
                                    <?php echo form_error('cMultEstado','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="cMultNumVisitas">CMultNumVisitas<span class="required">*</span></label>                                
                                    <input id="cMultNumVisitas" type="text" name="cMultNumVisitas" value="<?php echo set_value('cMultNumVisitas'); ?>"  />
                                    <?php echo form_error('cMultNumVisitas','<div>','</div>'); ?>
                                    </p>
                                    
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
