<?php
/* Template Name: cartes */
?>

<?php get_header(); ?>

<!-- START section 1 : section-cartepage_cover -->
<?php
    // SI cartepage_cover_hidden EST COCHE
    // => Alors il n'y a pas de section

    if(checked(1, get_option('cartepage_cover_hidden'), false)){
        ?>
        <?php
    } else {
        // SINON
        // => Afficher la section
        ?>
        <section id="menu-section-carte" class="bg-section">

            <?php
            // SI cartepage_cover_affiche_img EST COCHE
            // => Alors on affiche l'image en background

            if(checked(1, get_option('cartepage_cover_affiche_img'), false)){
                ?>
                <div class="img-cover">
                    <img src="<?php echo get_option('cartepage_cover_bg_img'); ?>" alt="">
                </div><!-- .img-carte -->
                <?php
            }
            ?>
            <div class="container">
                <h1><?php echo get_option('cartepage_cover_titre'); ?></h1>
                <p><?php echo get_option('cartepage_cover_texte'); ?></p>
            </div><!-- / .container -->
        </section><!-- / #menu-section-carte .bg-carte-->
        <?php
    }
?>

<!-- START section 2 : section-cartepage_message -->
<?php
    // SI cartepage_cover_hidden EST COCHE
    // => Alors il n'y a pas de section

    if(checked(1, get_option('cartepage_message_hidden'), false)){
        ?>
        <?php
    } else {
        // SINON
        // => Afficher la section
        ?>
        <section id="message-carte" class="container section-message">
            <div class="row">
                <?php
                // SI cartepage_msg_affiche_avatar EST COCHE
                // => Alors on affiche l'avatar

                if(checked(1, get_option('cartepage_msg_affiche_avatar'), false)){
                    ?>
                    <div class="col-md-6 col-12">
                        <img src="<?php echo get_option('cartepage_msg_img_avatar'); ?>" alt="" class="msg-avatar" />
                    </div><!-- .col-md-6 .col-12 -->
                    <?php
                }
                ?>
                <div class="col-md-6 col-12">
                    <h2><?php echo get_option('cartepage_message_titre'); ?></h2>

                    <?php
                        // SI cartepage_mgs_chinois est COCHE
                        // Alors on affiche

                        if(checked(1, get_option('cartepage_mgs_chinois'), false)){
                            ?>
                                <p>Chinoise</p>
                            <?php
                        }
                     ?>


                     <?php
                         // SI cartepage_mgs_france est COCHE
                         // Alors on affiche

                         if(checked(1, get_option('cartepage_mgs_france'), false)){
                             ?>
                                 <p>Française</p>
                             <?php
                         }
                      ?>

                      <?php
                          // SI cartepage_mgs_thai est COCHE
                          // Alors on affiche

                          if(checked(1, get_option('cartepage_mgs_thai'), false)){
                              ?>
                                  <p>Thaïlandaise</p>
                              <?php
                          }
                       ?>

                </div><!-- / .col-md-6 col-12 -->
            </div><!-- / .row -->
        </section><!-- / #menu-section-carte .bg-carte-->
        <?php
    }
?>

<!-- START section 4 : carte-content -->
<section id="carte-content" class="container">
    <!-- START : filter - nav-secondaire -->

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="carte-memu"
                data-toggle="tab" href="#menu" role="tab" aria-controls="menu"
                aria-selected="true">
                    <img src="<?php echo get_template_directory_uri().'/img/icon/menu.png' ?>" alt="" style="width: 21px; height 21px;">
                    <p>Menu</p>
                </a>
            </li>
            <!-- region repete ici -->
            <?php
                wp_reset_postdata();

                $args = array(
                    'post_type'      => 'cartes',
                    'posts_per_page' => 5,
                    'orderby'        => 'id',
                    'order'          => 'DESC'
                );
                $my_query = new WP_query($args);
                if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
             ?>

             <li class="nav-item">
                 <a class="nav-link" id="<?php echo get_post_meta($post->ID, 'slug_carte', true); ?>-tab"
                    data-toggle="tab" href="#<?php echo get_post_meta($post->ID, 'slug_carte', true); ?>"
                    role="tab" aria-controls="<?php echo get_post_meta($post->ID, 'slug_carte', true); ?>"
                    aria-selected="false">
                    <img src="<?php echo get_post_meta($post->ID, 'icon-carte', true); ?>" alt="" style="width: 21px; height 21px;">
                    <p><?php the_title(); ?></p>
                </a>
             </li>

            <?php endwhile; endif;  wp_reset_postdata(); ?>

        </ul><!-- / .nav nav-tabs -->



        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="carte-memu">

                <h1>Menu</h1>

                <div id="table-riz" class="card card-menu">
                    <h1>Table de riz</h1>
                    <div class="box-info">
                        <p class="prix">30$</p>
                        <ul>
                            <li>Prix par personnne</li>
                            <li>Minimum 2 couvert</li>
                        </ul>
                    </div><!-- / .box-info -->

                    <div class="service-1">
                        <h2>Entrée froide</h2>
                        <p class="content-servive-1"></p>
                    </div><!-- / .service-1 -->

                    <div class="service-2">
                        <h2>Entrée chaude aux choix</h2>
                        <div class="content-servive-2">
                            <ul>
                                <li class="item-choix"></li>
                                <li class="item-choix"></li>
                                <li class="item-choix"></li>
                                <li class="item-choix"></li>
                            </ul>
                        </div>
                    </div><!-- / .service-2 -->

                    <div class="service-3">
                        <h2>Plateux des 5 specialité</h2>
                        <div class="content-servive-3">
                            <ul>
                                <li class="item-specialite"></li>
                                <li class="item-specialite"></li>
                                <li class="item-specialite"></li>
                                <li class="item-specialite"></li>
                            </ul>
                        </div>
                    </div><!-- / .service-3 -->

                    <div class="service-4">
                        <h2>Desert</h2>
                        <p class="content-servive-4"></p>
                    </div><!-- / .service-4 -->

                </div><!-- / #table-riz .card-menu -->





            </div>


            <!-- region retete ici -->
            <?php
                wp_reset_postdata();

                $args = array(
                    'post_type'      => 'cartes',
                    'posts_per_page' => 5,
                    'orderby'        => 'id',
                    'order'          => 'DESC'
                );
                $my_query = new WP_query($args);
                if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
             ?>


             <div class="tab-pane fade" id="<?php echo get_post_meta($post->ID, 'slug_carte', true); ?>" role="tabpanel" aria-labelledby="<?php echo get_post_meta($post->ID, 'slug_carte', true); ?>-tab">
                 <div class="bg-img-cuisine">
                     <h1><?php the_title(); ?></h1>
                     <div class="">
                         <img src="<?php echo get_post_meta($post->ID, 'bg-carte', true); ?>" alt="<?php the_title(); ?>" />
                     </div>
                 </div>
             </div>

        <?php endwhile; endif;  wp_reset_postdata(); ?>

</div><!-- / .tab-content -->


</section>


<!-- START section 5 : section-reservation -->
<?php
    // SI cartepage_reservation_hidden EST COCHE
    // => Alors il n'y a pas de section

    if(checked(1, get_option('cartepage_reservation_hidden'), false)){
        ?>
        <section class="reservation text-center">
            <h1>Réserver maintenant</h1>
            <p>
                <?php echo get_option('inforesto_phone'); ?>
            </p>

        </section><!-- /  .bg-carte-->
        <?php
    }
?>

<?php get_footer(); ?>
