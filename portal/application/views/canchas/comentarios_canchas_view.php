

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
                        <img src="<?php echo URL_IMG; ?>testimonials/profile1.jpg" alt="">
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

<!--                <ul>
                    <li>
                        <div class="comment animate-onscroll">
                            <div class="comment-author">
                                <img src="<?php echo URL_IMG; ?>testimonials/profile5.jpg" alt="">
                                <div class="author-meta">
                                    <h6>admin</h6>
                                    <div class="comment-meta">
                                        <span>September 23, 2013 at 11:45 am</span>
                                        <span><a href="#">Reply</a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-content">
                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. </p>
                            </div>
                        </div>
                    </li>
                </ul>-->
            </li>
            <?php } ?>

<!--            <li>
                <div class="comment animate-onscroll">
                    <div class="comment-author">
                        <img src="<?php echo URL_IMG; ?>testimonials/profile1.jpg" alt="">
                        <div class="author-meta">
                            <h6>Gloria Mann</h6>
                            <div class="comment-meta">
                                <span>September 23, 2013 at 11:45 am</span>
                                <span><a href="#">Reply</a></span>
                            </div>
                        </div>
                    </div>

                    <div class="comment-content">
                        <p>Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
                    </div>
                </div>
            </li>-->
        </ul>
    </div>
</div>