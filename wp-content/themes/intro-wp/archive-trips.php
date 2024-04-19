<?php get_header(); ?>
    <main class="page">
        <section class="page__content trips">
            <h1 class="trips__title">Tous mes récits de voyage</h1>

            <aside class="page__terms">
                <h2 class="sro">Filtrer les résultats</h2>

                <?php $countries = get_terms([
                    'taxonomy' => 'countries',
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'hide_empty' => true,
                ]);

                foreach($countries as $country): ?>
                    <a href="<?= get_term_link($country); ?>" class="page__term"><?= $country->name; ?></a>
                <?php endforeach; ?>
            </aside>

            <div class="trips__container">
            <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress
                dw_component('trip');
            endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>