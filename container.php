<?php
/**
 * Template Name: Container Products
 *
 * This custom template displays WooCommerce products with specific container details.
 */
get_header(); 
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <div class="content">
      <ul class="list-group">

        <?php
        // Define our custom query to get WooCommerce products
        $args = array(
          'post_type'      => 'product',
          'posts_per_page' => -1, // Retrieve all products
        );

        $loop = new WP_Query($args);

        if ($loop->have_posts()) :
          while ($loop->have_posts()) : $loop->the_post();
            global $product; // Get the global product object
        ?>
            <li class="mx-5 list-group-item">
              <h4 class="px-5 pt-5 font-weight-bold"><?php the_title(); ?></h4>
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <!-- Get custom field value for portability -->
                    <?php if (get_field('portability')) : ?>
                      <span><?php the_field('portability'); ?></span>
                    <?php endif; ?>

                    <!-- Display product thumbnail -->
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('shop_catalog', array('class' => 'w-100 pt-5')); ?>
                    <?php endif; ?>
                  </div>

                  <div class="col-sm">
                    <h5>External Dimensions</h5>
                    <!-- Get and display custom field values -->
                    <?php if (get_field('ex_length')) : ?>
                      <h5>Length : <span><?php the_field('ex_length'); ?></span></h5>
                    <?php endif; ?>
                    <?php if (get_field('ex_width')) : ?>
                      <h5>Width : <span><?php the_field('ex_width'); ?></span></h5>
                    <?php endif; ?>
                    <?php if (get_field('external_dimensions_height')) : ?>
                      <h5>Height : <span><?php the_field('external_dimensions_height'); ?></span></h5>
                    <?php endif; ?>

                    <h5>Internal Dimensions</h5>
                    <?php if (get_field('internal_dimensions_length')) : ?>
                      <h5>Length : <span><?php the_field('internal_dimensions_length'); ?></span></h5>
                    <?php endif; ?>
                    <?php if (get_field('internal_dimensions_width')) : ?>
                      <h5>Width : <span><?php the_field('internal_dimensions_width'); ?></span></h5>
                    <?php endif; ?>
                    <?php if (get_field('internal_dimensions_height')) : ?>
                      <h5>Height : <span><?php the_field('internal_dimensions_height'); ?></span></h5>
                    <?php endif; ?>
                    
                    <h5>Max Growth Width</h5>
                    <?php if (get_field('max_growth_width')) : ?>
                      <h5><span><?php the_field('max_growth_width'); ?></span></h5>
                    <?php endif; ?>
                    <h5>Payload Capacity : <span><?php the_field('payload_capacity'); ?></span></h5>
                    <h5>Volume : <span><?php the_field('volume'); ?></span></h5>
                    <h5>Condition : <span><?php the_field('condition'); ?></span></h5>
                    <h5>Material : <span><?php the_field('material'); ?></span></h5>
                  </div>

                  <div class="col-sm">
                    <!-- Display product price -->
                    <h3><?php the_field('price'); ?></h3>
                    <?php if (get_field('stock_status')) : ?>
                      <h5><?php the_field('stock_status'); ?></h5>
                    <?php endif; ?>
                    <!-- Display add to cart button -->
                    <a href="<?php echo $product->add_to_cart_url(); ?>" class="btn-rounded">Add to Cart</a>
                  </div>
                </div>
              </div>
            </li>
          <?php endwhile;
          wp_reset_postdata();
        else : ?>
          <p><?php esc_html_e('No products found.'); ?></p>
        <?php endif; ?>

      </ul>
    </div>

  </main>
</div>


<?php get_footer(); ?>