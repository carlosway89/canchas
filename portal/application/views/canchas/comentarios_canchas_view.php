

<div class="col-lg-12 col-md-12 col-sm-12">
    <!-- Post Comments -->
    <div class="post-comments">
        <div class="side-segment">
            <h3><i class="icons icon-chat"></i> Comentarios</h3>
        </div>
        <ul>
            
            <?php foreach($list_comentarios as $list_comentarios){ ?>
            
            <li>
                <div class="comment animate-onscroll">
                    <div class="comment-author">
                        <img src="<?php echo URL_IMG; ?>testimonials/profile1.jpg" alt="solocanchas.com">
                        <div class="author-meta">
                            <h6><?php echo $list_comentarios->cComcaNombrePersona; ?></h6>
                            <div class="comment-meta">
                                <span>September 23, 2013 at 11:45 am</span>
                                <span><a href="#">Reply</a></span>
                            </div>
                        </div>
                    </div>

                    <div class="comment-content">
                        <p>
                            <?php echo $list_comentarios->cComcaTexto; ?>
                        </p>
                    </div>
                </div>

            </li>
            <?php } ?>

        </ul>
    </div>
</div>