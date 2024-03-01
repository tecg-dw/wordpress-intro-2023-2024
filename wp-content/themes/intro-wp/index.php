<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
                <h1><?= get_the_title(); ?></h1>
                <?= get_the_content(); ?>
            <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
        </div>
    </main>
<?php get_footer(); ?>