<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
                <h1><?= get_the_title(); ?></h1>
                <?= get_the_content(); ?>

                <section class="recipes">
                    <h2 class="recipes__title"><?= __('Mes dernières recettes', 'dw') ?></h2>

                    <div class="recipes__container">
                        <?php
                        // Créer une nouvelle requête Wordpress pour récupérer mes 3 dernières recettes en date.
                        $recipes = new WP_Query([
                            'post_type' => 'recipe',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'orderby' => 'date', 
                            'order' => 'DESC', 
                        ]); 

                        // Boucler via "The Loop" sur le résultat de cette requete
                        if($recipes->have_posts()): while($recipes->have_posts()): $recipes->the_post();
                            dw_component('recipe');
                        endwhile; endif; // Fin de "The Loop" des recettes ?>
                    </div>
                </section>

                <section class="trips">
                    <h2 class="trips__title"><?= __('Mes voyages', 'dw') ?></h2>

                    <div class="trips__container">
                        <?php

                        // Faire une requête pour récupérer les 5 derniers articles de voyage.
                        $trips = new WP_Query([
                            'post_type' => 'trips',
                            'post_status' => 'publish',
                            'posts_per_page' => 12,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);

                        // Ouvrir la boucle autour du code HTML qui affiche un seul voyage
                        if($trips->have_posts()): while($trips->have_posts()): $trips->the_post();
                            dw_component('trip', ['modifier' => 'homepage']);
                        endwhile; endif; // Fin de la boucle des voyages ?>
                    </div>
                </section>
            <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
        </div>
    </main>
<?php get_footer(); ?>