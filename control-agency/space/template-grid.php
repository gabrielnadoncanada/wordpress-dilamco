<section class="section-portfolio portfolio-1 position-relative pt-5 pt-lg-90">
  <div class="container">
    <div class="section-title mb-30 mb-lg-40 mb-xxl-5">
      <?php
      if (!empty($title)) {
        control_agency_content($title, '<h2 class="fw-extra-bold display-3 lh-1 heading-title-style-2">', '</h2>');
      }
      ?>
    </div>
    <?php
    if (!empty($query)) :
      $query_args = control_agency_get_query_args($query, 'controlspace');
      // The Query.
      $the_query = new WP_Query($query_args);
      if ($the_query->have_posts()) :
    ?>
        <div class="row gy-40 gx-4">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <!-- col-4 -->
            <div class="col-12 col-md-6 col-xl-4">
            <?php control_agency_template_part('space/loop/content-3'); ?>
            </div>
          <?php endwhile; ?>
          <!-- col-4 -->
      <?php
      endif;
    // wp_reset_postdata();
    endif;
      ?>
        </div>
  </div>
</section>
