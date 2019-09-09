<?php get_header(); ?>

<section class="main">
  <div class="cards container-fluid">

    <div class="cardoya row">
      <?php if(have_posts()):
        while(have_posts()):
          the_post(); ?>

      <div class="card">
        <a href="<?php the_permalink();?>" class="carda"></a>
        <div class="cate"><?php the_category(); ?></div>
        <div class="card-img-top">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>
        <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
        <div class="card-body"><?php the_title(); ?> </div>
        <br><br>
        <p><?php the_date(); ?></p>
      </div>

      <?php
      endwhile;
    else:
       ?>
       <p>記事がありません</p>
       <?php
     endif;
        ?>
      </div>
      <div class="navigation">
              <?php if( function_exists("the_pagination") ) the_pagination(); ?>
            </div>
  </div>
  <div class="sidebar">
    <?php get_sidebar(); ?>

  </div>
</section>

<?php get_footer(); ?>
