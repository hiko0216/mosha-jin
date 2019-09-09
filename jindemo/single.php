<?php get_header(); ?>

<section class="mainsin">
  <div class="cardssin container-fluid">

    <div class="cardoyasin row">
      <?php if(have_posts()):
        while(have_posts()):
          the_post(); ?>

      <div class="cardsin">
        <div class="cate"><?php the_category(); ?></div>
        <div class="card-bodysin"><?php the_title(); ?> </div>
        <p class="sindate"><?php the_date(); ?></p>
        <div class="card-img-topsin">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>
        <?php the_content(); ?>
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
                <div class="prev"><?php previous_posts_link();?></div>
                 <div class="next"><?php next_posts_link();?></div>
            </div>
  </div>
  <div class="sidebar">
    <?php get_sidebar(); ?>

  </div>
</section>

<?php get_footer(); ?>
