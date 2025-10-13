<?php
/**
 * Template Part: Color Grid
 *
 * @var array $args['colors'] Array of colors grouped by category
 */

$colors = $args['colors'] ?? array();

if ( empty( $colors ) ) {
    return;
}

$group_names = array_keys( $colors );
?>

<div class="color-filter-tabs-wrapper">
    <ul class="color-filter-tabs nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-filter="all" type="button" role="tab">
                <?php esc_html_e( 'All Colors', 'architronix' ); ?>
            </button>
        </li>
        <?php foreach ( $group_names as $group_name ) : ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-filter="<?php echo esc_attr( $group_name ); ?>" type="button" role="tab">
                    <?php echo esc_html( ucwords( str_replace( array( '-', '_' ), ' ', $group_name ) ) ); ?>
                </button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="color-grid-container">
    <?php foreach ( $colors as $group_name => $group_colors ) : ?>
        <section class="color-grid-column d-flex flex-column flex-nowrap align-items-stretch position-relative justify-content-start" data-group="<?php echo esc_attr( $group_name ); ?>">
            <h3 class="color-group-title" data-group-title="<?php echo esc_attr( $group_name ); ?>">
                <?php echo esc_html( ucwords( str_replace( array( '-', '_' ), ' ', $group_name ) ) ); ?>
            </h3>
            <?php
            $chunks = array_chunk( $group_colors, 7 );
            foreach ( $chunks as $chunk ) :
            ?>
                <section class="color-grid-chunk d-flex flex-column align-items-stretch">
                    <div class="color-grid-row d-flex flex-nowrap align-items-center w-100 position-relative justify-content-start">
                        <?php foreach ( $chunk as $color ) : ?>
                            <?php
                            $text_color = dilamco_get_text_color( $color['rgb'] );
                            $color_id = 'color-' . $color['id'];
                            ?>
                            <div class="color-swatch-wrapper position-relative" data-color-id="<?php echo esc_attr( $color_id ); ?>">
                                <div class="color-swatch-bg position-absolute top-0 start-0 end-0 bottom-0 p-3 <?php echo esc_attr( $text_color ); ?>"
                                    style="background: <?php echo esc_attr( $color['rgb'] ); ?>;">
                                    <?php echo esc_attr( $color['name'] ); ?>
                                    <div class="position-absolute top-0 start-0 end-0 bottom-0 border border-white"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </section>
    <?php endforeach; ?>
</div>

<style>
.color-filter-tabs-wrapper {
    top: 0;
    z-index: 100;
    background: #fff;
    margin: 20px 0;
}

.color-filter-tabs {
    border-bottom: 2px solid #dee2e6;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding-left: 0;
    margin-bottom: 0;
}

.color-filter-tabs .nav-item {
    list-style: none;
}

.color-filter-tabs .nav-link {
    padding: 10px 20px;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    color: #6c757d;
}

.color-filter-tabs .nav-link:hover {
    color: #495057;
    border-color: #e9ecef #e9ecef #dee2e6;
}

.color-filter-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
    border-bottom-color: transparent;
}

.color-grid-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.color-group-title {
    
}

.color-swatch-bg  {
    line-height: 1.2;
}

.color-grid-column {
    min-width: 140px;
    min-height: 450px;
}

.color-grid-chunk {
    padding: 5px;
}

.color-grid-row {
    gap: 0;
}

.color-swatch-wrapper {
    width: 175px;
    height: 175px;
    z-index: 0;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.color-filter-tabs button[data-filter]');
    const colorColumns = document.querySelectorAll('.color-grid-column[data-group]');
    const groupTitles = document.querySelectorAll('.color-group-title');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');

            // Update active state
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter columns and toggle titles
            colorColumns.forEach(column => {
                if (filter === 'all') {
                    column.style.display = '';
                } else {
                    column.style.display = column.getAttribute('data-group') === filter ? '' : 'none';
                }
            });

            // Show/hide group titles
            groupTitles.forEach(title => {
                if (filter === 'all') {
                    title.style.display = '';
                } else {
                    title.style.display = 'none';
                }
            });
        });
    });
});
</script>
