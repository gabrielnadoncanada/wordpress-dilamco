        <?php if( architronix_layout_get() != 'full' ): ?>
        </div>
        <!-- .col-lg-8 -->        
        <div class="col-lg-4">    
            <?php get_sidebar(); ?>    
         </div>    
    </div>
    <!-- .row -->
    <?php endif; ?>
    </div>    
</div>
<!-- .container -->
</section>

<?php 
    if( in_array(get_post_type(), ['post']) ){
        get_template_part('template-parts/post/related-post');
    }
?>