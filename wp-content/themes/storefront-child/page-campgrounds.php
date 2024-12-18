<?php
/** 
 * Template Name: Campgrounds 
 * Template untuk menampilkan tabel negara, kota, dan lokasi perkemahan.
 * 
 * @package your-theme-name 
 */

get_header();

do_action('before_campgrounds');

?>

<section class="container mx-auto px-5 md:px-12 py-5">
  <div class="relative">
    <div class="">
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
      <div class="flex flex-col items-center justify-end h-full">
        <div class="p-8 flex items-start flex-col rounded-2xl bg-white">
          <h2 class="text-2xl sm:text-4xl mb-3 font-bold text-shadow">
              <?php echo esc_html(get_theme_mod('hero_h2_text', 'Discover the Best Campgrounds Worldwide')); ?>
          </h2>
          <p class="mb-3 text-shadow">
              <?php echo esc_html(get_theme_mod('hero_p_text', 'FreshCamp offers a wide selection of campgrounds across the globe, making your next adventure unforgettable.')); ?>
          </p>
          <form action="https://wa.me/6289671052050" method="GET" class="w-full">
            <div class="flex items-center gap-3">
              <input type="text" name="text" class="input input-bordered w-full" placeholder="Ask to FreshCamp ">
              <button class="btn btn-accent">Chat</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mx-auto px-5 md:px-10 py-10 mb-5">
    <div class="flex flex-col items-center justify-center mb-8">
        <h2 class="text-2xl text-center font-semibold" style="max-width: 40em;">Our Campgrounds in Every Countries</h2>
        <p class="text-slate-500 text-center" style="max-width: 40em;">Browse some of our most sought-after campgrounds from around the world, each offering a distinctive experience.</p>
    </div>
    <div>
        <?php
        // Countries
        $countries = get_posts([
            'post_type' => 'country',
            'posts_per_page' => -1,
        ]);

        foreach ($countries as $country) {
            ?>
            <div class="flex items-center gap-4 mb-5">
                <img src="<?php echo esc_url(get_the_post_thumbnail_url($country->ID, 'thumbnail')) ?>" alt="<?php echo esc_html($country->post_title); ?>" class="block rounded-lg shadow-lg" style="height: 3em;">
                <h2 class="font-semibold text-xl"><?php echo esc_html($country->post_title); ?></h2>
            </div>
            <?php
            // Cities
            $cities = get_posts([
                'post_type' => 'city',
                'meta_query' => [
                    [
                        'key' => '_country_id',
                        'value' => $country->ID,
                        'compare' => '=',
                    ],
                ],
                'posts_per_page' => -1,
            ]);

            foreach ($cities as $city) {
                // City
                $city_location = get_location_meta($city->ID);

                $weather_data = get_weather_data($city_location['latitude'], $city_location['longitude']);
                ?>
                <div class="card mb-5">
                    <div class="card-body bg-slate-50 rounded-2xl">
                        <div class="flex items-center gap-4 mb-5">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url($city->ID, 'thumbnail')) ?>" alt="<?php echo esc_html($city->post_title); ?>" class="block rounded-lg shadow-lg" style="height: 3em;">
                            <h2 class="font-semibold text-xl"><?php echo esc_html($city->post_title); ?></h2>
                            <div class="flex items-center gap-2 p-0">
                                <div>
                                    <img src="<?php echo esc_url($weather_data['icon_url']); ?>" alt="Weather Icon" style="height: 4em; object-fit: contain;">
                                </div>
                                <div>
                                    <p class="temperature text-sm font-bold"><?php echo esc_html($weather_data['weather']['temperature'] . '°C'); ?></p>
                                    <p class="condition text-xs capitalize"><?php echo esc_html($weather_data['weather']['condition']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                            <?php
                            // Camplocations
                            $camp_locations = get_posts([
                                'post_type' => 'camplocation',
                                'meta_query' => [
                                    [
                                        'key' => '_city_id',
                                        'value' => $city->ID,
                                        'compare' => '=',
                                    ],
                                ],
                                'posts_per_page' => -1,
                            ]);

                            foreach ($camp_locations as $camp) {
                                $camp_location = get_location_meta($camp->ID);
                                $weather_data = get_weather_data($camp_location['latitude'], $camp_location['longitude']);
                                ?>
                                <div>
                                    <div class="card border p-4 rounded-lg shadow-sm">
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url($camp->ID, 'thumbnail')) ?>" alt="<?php echo esc_html($camp->post_title); ?>" class="block rounded-xl aspect-video object-cover mb-2">
                                        <h6 class="font-semibold text-lg"><?php echo esc_html($camp->post_title); ?></h6>
                                        <p class="text-sm line-clamp line-clamp-3 text-slate-500">Description for <?php echo esc_html($camp->post_title); ?>.</p>
                                        <div class="flex items-center gap-2 p-0">
                                            <div>
                                                <img src="<?php echo esc_url($weather_data['icon_url']); ?>" alt="Weather Icon" style="height: 4em; object-fit: contain;">
                                            </div>
                                            <div>
                                                <p class="temperature text-sm font-bold"><?php echo esc_html($weather_data['weather']['temperature'] . '°C'); ?></p>
                                                <p class="condition text-xs capitalize"><?php echo esc_html($weather_data['weather']['condition']); ?></p>
                                            </div>
                                        </div>
                                        <a href="https://wa.me/6289671052050?text=Hallo%20Alif,%20i'm%20amaze%20with%20your%20dev" class="btn btn-outline mt-3">Book Now</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                  </div>
                <?php
            }
            ?>
            <?php
        }
        ?>
    </div>
</section>

<?php
do_action('after_campgrounds');
get_footer();
?>
