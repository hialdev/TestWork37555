<?php
get_header(); ?>

<section class="container mx-auto px-5 md:px-12 py-5">
    <div class="relative">
        <div>
            <div class="owl-carousel owl-theme hero-carousel">
                <?php
                $images = get_theme_mod('hero_slider_images_1', '').','.get_theme_mod('hero_slider_images_2', '').','.get_theme_mod('hero_slider_images_3', '');
                if (!empty($images)) {
                    $image_ids = explode(',', $images);
                    foreach ($image_ids as $image_id) {
                        $image_url = wp_get_attachment_url($image_id);
                        if ($image_url) {
                            echo '<div><img src="' . esc_url($image_url) . '" class="block aspect-video rounded-xl object-cover overflow-hidden" alt="Hero Slider Image"></div>';
                        }
                    }
                } else {
                    echo '<p>No images found for slider.</p>';
                }
                ?>
            </div>
        </div>
        <div class="lg:absolute top-0 end-0 start-0 bottom-0 z-10 lg:p-12">
            <div class="flex flex-col items-start justify-end h-full">
                <div class="p-8 flex items-start flex-col rounded-2xl bg-white max-w-xl">
                    <h2 class="text-2xl sm:text-4xl mb-3 font-bold text-shadow">
                        <?php echo esc_html(get_theme_mod('hero_h2_text', 'Discover the Best Campgrounds Worldwide')); ?>
                    </h2>
                    <p class="mb-3 text-shadow">
                        <?php echo esc_html(get_theme_mod('hero_p_text', 'FreshCamp offers a wide selection of campgrounds across the globe, making your next adventure unforgettable.')); ?>
                    </p>
                    <a href="<?php echo esc_url(get_theme_mod('hero_btn_link', '#explore')); ?>" class="btn btn-accent decoration-0">
                        <?php echo esc_html(get_theme_mod('hero_btn_text', 'Start Your Adventure')); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mx-auto px-5 md:px-12 py-5 bg-slate-50">
    <div class="flex flex-col items-center justify-center">
        <div>
            <div class="card">
                <div class="card-body">
                    <div class="flex items-center flex-wrap md:flex-nowrap">
                        <div class="stat">
                            <div class="stat-figure text-teal-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M2 21v-3q0-.325.1-.625t.3-.575l8.35-11.25L9.6 4q-.125-.175-.175-.362T9.4 3.263t.125-.363t.275-.3q.35-.25.75-.2t.65.4l.8 1.075l.8-1.075q.25-.35.65-.4t.75.2t.4.65t-.2.75l-1.15 1.55L21.6 16.8q.2.275.3.575T22 18v3q0 .425-.287.713T21 22H3q-.425 0-.712-.288T2 21m6.225-1h7.55L12 14.725z" />
                                </svg>
                            </div>
                            <div class="stat-title"><?php echo esc_html(get_theme_mod('statistic1_title', 'Total Campgrounds')); ?></div>
                            <div class="stat-value text-teal-500"><?php echo esc_html(get_theme_mod('statistic1_value', wp_count_posts('camplocation')->publish)); ?></div>
                            <div class="stat-desc"><?php echo esc_html(get_theme_mod('statistic1_description', 'spread in '.wp_count_posts('country')->publish.' countries')); ?></div>
                        </div>

                        <div class="stat">
                            <div class="stat-figure text-amber-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="stat-title"><?php echo esc_html(get_theme_mod('statistic2_title', 'Satisfied Campers')); ?></div>
                            <div class="stat-value text-amber-600"><?php echo esc_html(get_theme_mod('statistic2_value', '238k')); ?></div>
                            <div class="stat-desc"><?php echo esc_html(get_theme_mod('statistic2_description', 'most of that have a routine schedule')); ?></div>
                        </div>

                        <div class="stat">
                            <div class="stat-figure text-cyan-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M18.483 16.767A8.5 8.5 0 0 1 8.118 7.081a1 1 0 0 1-.113.097c-.28.213-.63.292-1.33.45l-.635.144c-2.46.557-3.69.835-3.983 1.776c-.292.94.546 1.921 2.223 3.882l.434.507c.476.557.715.836.822 1.18c.107.345.071.717-.001 1.46l-.066.677c-.253 2.617-.38 3.925.386 4.506s1.918.052 4.22-1.009l.597-.274c.654-.302.981-.452 1.328-.452s.674.15 1.329.452l.595.274c2.303 1.06 3.455 1.59 4.22 1.01c.767-.582.64-1.89.387-4.507z" />
                                    <path fill="currentColor" d="m9.153 5.408l-.328.588c-.36.646-.54.969-.82 1.182q.06-.045.113-.097a8.5 8.5 0 0 0 10.366 9.686l-.02-.19c-.071-.743-.107-1.115 0-1.46c.107-.344.345-.623.822-1.18l.434-.507c1.677-1.96 2.515-2.941 2.222-3.882c-.292-.941-1.522-1.22-3.982-1.776l-.636-.144c-.699-.158-1.049-.237-1.33-.45c-.28-.213-.46-.536-.82-1.182l-.327-.588C13.58 3.136 12.947 2 12 2s-1.58 1.136-2.847 3.408" opacity="0.5" />
                                </svg>
                            </div>
                            <div class="stat-value"><?php echo esc_html(get_theme_mod('statistic3_value', '98%')); ?></div>
                            <div class="stat-title"><?php echo esc_html(get_theme_mod('statistic3_title', 'Positive Reviews')); ?></div>
                            <div class="stat-desc text-cyan-600"><?php echo esc_html(get_theme_mod('statistic3_description', 'we always give best')); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mx-auto px-5 md:px-10 py-10 mb-5">
  <div class="flex flex-col items-center justify-center mb-8">
    <h2 class="text-2xl text-center font-semibold" style="max-width: 40em;">Explore Popular Campgrounds</h2>
    <p class="text-slate-500 text-center" style="max-width: 40em;">Browse some of our most sought-after campgrounds from around the world, each offering a distinctive experience. Whether you prefer the serenity of nature or the thrill of adventure, we’ve got you covered.</p>
  </div>
  <div>
    <div>
      <div class="owl-carousel owl-theme popular-carousel">
        <?php
        // Latest 4 Camp Locations
        $args = array(
            'post_type' => 'camplocation',
            'posts_per_page' => 4,
            'post_status' => 'publish',
        );
        $camps = new WP_Query($args);

        if ($camps->have_posts()) :
            while ($camps->have_posts()) : $camps->the_post();
                $latitude = get_post_meta(get_the_ID(), '_latitude', true);
                $longitude = get_post_meta(get_the_ID(), '_longitude', true);

                $weather_data = get_weather_data($latitude, $longitude);
                $weather = $weather_data['weather'];
                $icon_url = $weather_data['icon_url'];
                ?>
                <div> <!-- Camp Location item -->
                    <a href="<?php the_permalink(); ?>" class="card border p-4 rounded-lg shadow-sm">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="block rounded-xl aspect-video object-cover mb-2">
                        <h6 class="font-semibold text-lg"><?php the_title(); ?></h6>
                        <p class="text-sm line-clamp line-clamp-3"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <div class="flex items-center gap-2 p-0">
                            <div>
                                <img src="<?php echo esc_url($icon_url); ?>" alt="Weather Icon" style="height:4em; object-fit:contain;" />
                            </div>
                            <div class="">
                                <p class="temperature text-sm font-bold"><?php echo $weather['temperature']; ?>°C</p>
                                <p class="condition text-xs capitalize"><?php echo $weather['condition']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No camp locations found.</p>';
        endif;
        ?>
      </div>
    </div>
  </div>
</section>

<section class="container mx-auto">
  <div
    class="hero min-h-screen"
    style="background-image: url('<?php echo esc_url(get_theme_mod('cta_background_image', 'http://127.0.0.1/TestWork37555/wp-content/uploads/2024/12/paul-hermann-XJuhZqEE4Go-unsplash-scaled.jpg')); ?>');">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-neutral-content text-center">
      <div class="max-w-xl">
        <h4 class="mb-5 text-5xl font-bold text-white">
          <?php echo esc_html(get_theme_mod('cta_title', 'Ready to explore more?')); ?>
        </h4>
        <h6 class="mb-5 text-2xl font-bold text-white">
          <?php echo esc_html(get_theme_mod('cta_subtitle', 'Find your perfect campground today.')); ?>
        </h6>
        <a href="<?php echo esc_url(get_theme_mod('cta_button_url', '#')); ?>" class="btn btn-accent">
          <?php echo esc_html(get_theme_mod('cta_button_text', 'Browse Campgrounds')); ?>
        </a>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>