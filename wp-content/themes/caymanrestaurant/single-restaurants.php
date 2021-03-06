<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <section>
        <div class="container-fluid">
            <?php
            $restaurant = get_post_meta(get_the_ID());
            //print_r($restaurant);
            $restaurant_banners = get_post_meta(get_the_ID(), 'restaurant-banner', true);
            ?>
            <div class="row">
                <div class="col-12 px-0">
                    <div id="CarouselBanner" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner carousel-height">
                            <?php
                            //print_r($restaurant_logo); 
                            ?>
                            <div class="test-index position-absolute top-50 start-50 translate-middle">
                                <img src="<?php echo $restaurant['restaurant-logo'][0]; ?>" class="d-block w-100">
                            </div>
                            <?php
                            $d = 0;
                            foreach ($restaurant_banners as $restaurant_banner) {
                                if ($d == 0) {
                                    $active = 'active';
                                } else {
                                    $active = '';
                                }
                                $d++;
                            ?>
                                <div class="carousel-item <?php echo $active; ?>">
                                    <img src="<?php echo $restaurant_banner['url']; ?>" class="d-block w-100 banner-height">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    <div class="bk-profile-excerpt position-relative">
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                            <div class="site-description font-white"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-blue">
        <div class="container">
            <div class="row">
                <div class="col-12 padding-top-lg padding-bottom-lg">
                    <div class="row">
                        <div class="col-12 padding-top-lg padding-bottom-lg">
                            <h1 class="font-orange font_Trebuchet_Bold text-center"><?php the_title(); ?></h1>
                        </div>
                        <div class="col-lg-4 padding-top-md padding-bottom-md border-right position-relative min-height">
                            <h5 class="font-orange font_Trebuchet_Bold "><i class="bi bi-circle font-orange"></i> Location</h5>
                            <div class="restaurant-info font_Trebuchet_Bold"><?php echo $restaurant['restaurant-location'][0]; ?></div>
                        </div>
                        <div class="col-lg-4 padding-top-md padding-bottom-md border-right position-relative min-height">
                            <?php
                            $term_obj_list = get_the_terms($post->ID, 'category-cuisines');
                            $cuisines = join(', ', wp_list_pluck($term_obj_list, 'name'));
                            ?>
                            <h5 class="font-orange font_Trebuchet_Bold "><i class="bi bi-circle font-orange"></i> Cousines</h5>
                            <p class="font-white p-info font_Trebuchet_Bold"><?php echo $cuisines; ?></p>
                        </div>
                        <div class="col-lg-4 padding-top-md padding-bottom-md min-height">
                            <h5 class="font-orange font_Trebuchet_Bold "><i class="bi bi-circle font-orange"></i> Hours</h5>
                            <div class="restaurant-info font_Trebuchet_Bold"><?php echo $restaurant['restaurant-hours'][0]; ?></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border-bottom-info d-none d-xxl-block"></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border-bottom-info d-none d-xxl-block"></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border-bottom-info d-none d-xxl-block"></div>
                        </div>

                        <div class="col-lg-4 padding-top-md padding-bottom-md position-relative start-bottom min-height">
                            <h5 class="font-orange font_Trebuchet_Bold "><i class="bi bi-circle font-orange"></i> Review</h5>
                            <div class="restaurant-info"><?php echo do_shortcode('[rvx-star-count post_id="43"]'); ?></div>
                        </div>
                        <div class="col-lg-4 padding-top-md padding-bottom-md position-relative start-bottom min-height">
                            <h5 class="font-orange font_Trebuchet_Bold "><i class="bi bi-circle font-orange"></i> Meals</h5>
                            <?php
                            $term_obj_list = get_the_terms($post->ID, 'category-meals');
                            $meals = join(', ', wp_list_pluck($term_obj_list, 'name'));
                            ?>
                            <p class="font-white p-info font_Trebuchet_Bold"><?php echo $meals; ?></p>
                        </div>
                        <div class="col-lg-4 padding-top-md padding-bottom-md min-height">
                            <h5 class="font-orange font_Trebuchet_Bold "><i class="bi bi-circle font-orange"></i> Contact</h5>
                            <p class="font-white p-info font_Trebuchet_Bold"><?php echo $restaurant['restaurant-phone'][0]; ?> | <?php echo $restaurant['restaurant-website-url'][0]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 padding-top-md padding-bottom-lg margin-bottom-lg">
                    <div class="text-center">
                        <a href="#" class="btn btn-light btn-lg btn-orange font-white">RESERVATION REQUEST</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 padding-top-lg padding-bottom-lg">
                    <h1 class="title-about text-center font-blue font_Din_Condensed_Bold text-uppercase">About us</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <?php the_content(); ?>
                </div>

            </div>
        </div>
    </section>
    <section class="bk-menus margin-top-lg margin-bottom-lg padding-top-lg padding-bottom-lg">
        <div class="container">
            <div class="row">
                <div class="col-12 padding-bottom-lg">
                    <h1 class="title-menu text-center font-blue font_Tahu">Men??s</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-3 col-12 padding-top-md padding-bottom-md">
                    <?php $restaurant_breakfast = get_post_meta(get_the_ID(), 'restaurant-breakfast', true); ?>
                    <div class="text-center">
                        <a target="_blank" href="<?php echo $restaurant_breakfast['url']; ?>" class="text-uppercase btn btn-light btn-lg btn-dark-blue font-white font-uppercase">Breakfast menu</a>
                    </div>
                </div>
                <div class="col-sm-3 col-12 padding-top-md padding-bottom-md">
                    <?php $restaurant_lunch = get_post_meta(get_the_ID(), 'restaurant-lunch', true); ?>
                    <div class="text-center">
                        <a target="_blank" href="<?php echo $restaurant_lunch['url']; ?>" class="text-uppercase btn btn-light btn-lg btn-dark-blue font-white font-uppercase">Lunch menu</a>
                    </div>
                </div>
                <div class="col-sm-3 col-12 padding-top-md padding-bottom-md">
                    <?php $restaurant_dinner = get_post_meta(get_the_ID(), 'restaurant-dinner', true); ?>
                    <div class="text-center">
                        <a target="_blank" href="<?php echo $restaurant_dinner['url']; ?>" class="text-uppercase btn btn-light btn-lg btn-dark-blue font-white font-uppercase">Dinner menu</a>
                    </div>
                </div>
                <div class="col-sm-3 col-12 padding-top-md padding-bottom-md">
                    <?php $restaurant_brunch = get_post_meta(get_the_ID(), 'restaurant-brunch', true); ?>
                    <div class="text-center">
                        <a target="_blank" href="<?php echo $restaurant_brunch['url']; ?>" class="text-uppercase btn btn-light btn-lg btn-dark-blue font-white font-uppercase">Brunch menu</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="margin-top-lg margin-bottom-lg">
        <div class="container">
            <div class="row">
                <div class="col-12 padding-top-lg padding-bottom-lg">
                    <h1 class="title-features text-center font-blue font_Din_Condensed_Bold text-uppercase">Features</h1>
                </div>
                <div class="col-12">
                    <?php
                    $term_obj_list = get_the_terms($post->ID, 'category-features');
                    //print_r($term_obj_list);
                    //$features = join('<li><i class="bi bi-check"></i> ', wp_list_pluck($term_obj_list, 'name')).'</li>';
                    ?>
                    <ul class="p-info features">
                        <?php
                        foreach ($term_obj_list as $feature) {
                            echo '<li><i class="bi bi-check"></i> ' . $feature->name . '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="today-special-box mt-3 pt-4 pb-4">
        <h1 class="title_section_f_chefs font_Tahu pt-5 pb-5">Today's Special</h1>
        <div class="container">
            <div class="row">
                <!--col-->
                <div class="col-12 col-md-4 col-lg-4 mb-5 box-girate-r">
                    <div class="card">
                        <div class="boxImage">
                            <img src="<?php echo $restaurant['restaurant-image-special-1'][0]; ?>" class="img-fluid" />
                        </div>
                        <div class="card-body mt-4">
                            <span class="nameSpecial font-orange font_Trebuchet text-uppercase d-block"><?php echo $restaurant['restaurant-title-special-1'][0]; ?></span>
                            <span class="nameRestaurant font-white font_Trebuchet text-uppercase d-block"><?php echo $restaurant['restaurant-description-special-1'][0]; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4 mb-5 box-girate-l">
                    <div class="card">
                        <div class="boxImage">
                            <img src="<?php echo $restaurant['restaurant-image-special-2'][0]; ?>" class="img-fluid" />
                        </div>
                        <div class="card-body mt-4">
                            <span class="nameSpecial font-orange font_Trebuchet text-uppercase d-block"><?php echo $restaurant['restaurant-title-special-2'][0]; ?></span>
                            <span class="nameRestaurant font-white font_Trebuchet text-uppercase d-block"><?php echo $restaurant['restaurant-description-special-2'][0]; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4 mb-5">
                    <div class="card">
                        <div class="boxImage">
                            <img src="<?php echo $restaurant['restaurant-image-special-3'][0]; ?>" class="img-fluid" />
                        </div>
                        <div class="card-body mt-4">
                            <span class="nameSpecial font-orange font_Trebuchet text-uppercase d-block"><?php echo $restaurant['restaurant-title-special-3'][0]; ?></span>
                            <span class="nameRestaurant font-white font_Trebuchet text-uppercase d-block"><?php echo $restaurant['restaurant-description-special-3'][0]; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
    <?php comments_template(); ?>
    </section>
<?php endwhile; ?>


<section class="bk-menus margin-top-lg margin-bottom-lg padding-top-lg padding-bottom-lg commentOut">
    <div class="container">
        <div class="row">
            <div class="col-12 padding-bottom-lg">
                <h1 class="title-menu text-center font-blue font_Tahu">Comments</h1>
            </div>
        </div>
        <div class="row justify-content-center">


            <div id="carouselComment" class="carousel" data-bs-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <?php
                    $d = 0;
                    $comments = get_comments(array(
                        'post_type' =>array('restaurants'),
                      ));
                      foreach($comments as $comment):
                        if ($d == 0) {
                            $active = 'active';
                        } else {
                            $active = '';
                        }
                        $d++;
                    ?>
                        <div class="carousel-item <?php echo $active; ?>">
                            <div class="comment d-block ps-5 pe-5 text-center">
                                <p><?php echo get_avatar( $comment->user_email, 64 ); ?></p>
                                <p><?php comment_author(); ?></p>
                                <p><?php comment_date(); ?></p>
                                <p><?php comment_text(); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselComment" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselComment" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div id="formComment" class="">
                <?php 
                $comments_args = array(
                    'label_submit' => __('Send', 'textdomain'), 'title_reply' => __('Write a Reply or Comment', 'textdomain'), 'comment_notes_after' => '',
                    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
                );
                comment_form($comments_args); ?>
            </div>

        </div>
    </div>
</section>






<?php get_footer(); ?>