<?php if(!empty(get_the_content())): ?>
<div class="section-padding-md">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-inner border-bottom-0">			
                    <?php   
                    $title = str_replace('[post_title]', get_the_title(), $title);
                    control_agency_content($title, '<h3 class="mb-20">', '</h3>');                 
                    the_content();                   
                    ?>
                    <?php
                    control_agency_get_terms([
                        'taxonomy' => 'space_tag',
                        'wrapper_class' => 'wp-block-tag-cloud d-flex pt-30 flex-wrap',
                        'wrapper_tag' => 'div',
                        'link_class' => 'text-decoration-none tag-cloud-link btn-hover-animation-3',
                        'separator' => '',
                    ], true);
                    ?> 
                </div>                
            </div>
        </div>        				
    </div>
</div>
<?php endif; ?>

<?php if(!empty($gallery)): ?>
    <?php control_agency_render_block('space-gallery', $gallery, false); ?>

<?php endif; ?>
