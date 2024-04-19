<?php get_header(); ?>
    <main class="page">
        <section class="page__content recipes">
            <h1 class="recipes__title">Toutes mes recettes</h1>

            <div class="recipes__container">
            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress
                dw_component('recipe');
            endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>