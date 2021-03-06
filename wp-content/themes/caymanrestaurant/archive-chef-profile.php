<?php get_header();

//type content banner
$post_banner = query_posts('post_type=banners&order=ASC');

//While Food in the news
while (have_posts()) : the_post();

//banner
$section_banner = get_post_meta($post->ID, 'banner-chef-profile', true);
//description
$section_description = get_post_meta($post->ID, 'description-chef-profile', true);

//Get Image Banner Field
$urlBanner = "";
if(isset($section_banner["url"])){
    $urlBanner = $section_banner["url"];
}

endwhile;

?>

<div class="container-fluid px-0">

    <!--banner chefs-->
    <div class="banner_featured" style="background:url('<?php echo $urlBanner ?>')">
        <div class="name_chef_inner">
            <div class="inner_name_chef font-white">
                <h1 class="font_Tahu">Profile</h1>
            </div>
        </div>
    </div>
    <!--banner chefs-->

    <div class="description_chef_inner w-100 font_Trebuchet">
        <div class="inner_description d-flex justify-content-center  align-items-center flex-column flex-wrap h-100 text-center">
        <?php echo $section_description; ?>
        </div><!-- /.inner_description -->
    </div><!-- /description_banner -->

</div><!--end container-fluid-->

<div class="">
        <!--listing chef profile-->
        <div class="container pt-5  inner_box_columns full-listing-chefs ">
            <div class="row mx-n5">
                <?php


                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



                $args = array(
                    'post_type' => 'chef-profile', // Your post type name
                    'posts_per_page' => 6,
                    'paged' => $paged,
                );

                //Query Post - Chef 
                $loop = new WP_Query($args);

                //While Chef
                while ($loop->have_posts()) : $loop->the_post();
                    
                    //Description Chef
                    $content = get_post_meta(get_the_ID(), 'chef-description', true);;
                    $content = strip_tags($content);

                    //Get Name Restaurant Chef
                    $name_restaurant_chef = get_post_meta(get_the_ID(), 'chef-name-restaurant', true);

                ?>

                    <div class="col-md-12 col-lg-6 col-xl-6 col-xxl-6  px-md-4 px-lg-4 mb-5  ">
                        <div class="bg-light">
                            <div class="row shadow rounded">
                                <div class="col-6 px-0 boxImages">
                                    <?php the_post_thumbnail('full', array('class' => 'img-fluid')) ?>
                                </div>
                                <div class="col-6 bg-gray informationChef d-flex flex-wrap justify-content-center align-items-center font_Trebuchet text-center pt-5 pb-5">
                                    <h2 class="name_chef text-center text-uppercase font-blue mb-1"><?php echo the_title(); ?></h2>
                                    <div class="description_chef mb-1"><?php echo substr($content, 0, 112); ?></div>
                                    <span class="name_restaurant_chef text-uppercase text-center font-light-blue font_Trebuchet mb-1"><?php echo $name_restaurant_chef; ?></span>
                                    <a href="<?php the_permalink(); ?>" class="view_more_chef  btn btn-light btn-lg btn-blue font-white text-uppercase text-center font_Din_Condensed_Bold">Find out more</a>
                                </div>
                            </div></div>
                    </div>
                    


                <?php 
                    endwhile;
                    wp_reset_query();
                ?>


                <div class="pagination-box">
                    <?php
                    //count max num 
                    $total_pages = $loop->max_num_pages;
                    //print paginatior
                    if ($total_pages > 1) {
                        echo paginator_kr($total_pages);
                    }

                    ?>
                </div>

            </div>
            <!--/listing chef profile-->
        </div>
    <?php get_footer(); ?>