<?php get_header(); ?>
    <main class="page">
        <div class="page__content">
            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
                <h1><?= get_the_title(); ?></h1>
                <?= get_the_content(); ?>

                <section class="recipes">
                    <h2 class="recipes__title">Mes dernières recettes</h2>

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
                        ?>

                        <article class="recipe">
                            <h3 class="recipe__title"><?= get_the_title(); ?></h3>
                            <dl class="recipe__info">
                                <dt class="recipe__term">Durée:</dt>
                                <dd class="recipe__data"><?= get_field('duration'); ?> minutes</dd>
                                <dt class="recipe__term">Personnes:</dt>
                                <dd class="recipe__data"><?= get_field('capacity'); ?></dd>
                                <dt class="recipe__term">Prix:</dt>
                                <dd class="recipe__data"><?= get_field('cost'); ?></dd>
                            </dl>
                        </article>

                        <?php endwhile; endif; // Fin de "The Loop" des recettes ?>
                    </div>
                </section>
            <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
        </div>
    </main>
<?php get_footer(); ?>