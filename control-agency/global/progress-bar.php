<div class="expertise-items fw-semibold">
    <p><?php echo wp_kses_post($progress_name); ?></p>
    <div class="progress progress-1">
        <div class="progress-bar" style="width: <?php echo esc_attr($progress) ?>; animation: progressAnimation-1 <?php echo esc_attr($count); ?> ;">										
        </div>
        <div class="expertise-pricing fw-semibold">
            <span><?php echo wp_kses_post($progress); ?></span>
        </div>
    </div>
</div>