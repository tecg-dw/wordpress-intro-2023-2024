<?php /* Template Name: Page "Contact" */ ?>
<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
        
        <main class="contact">
            <header class="contact__header">
                <h1 class="contact__title"><?= get_the_title(); ?></h1>
            </header>
            <section class="contact__intro">
                <p>Ici il y aura un formulaire de contract</p>
            </section>
            <aside class="contact__info">
                <h2>Mes informations</h2>
                <dl>
                    <dt>Mon numéro de téléphone:</dt>
                    <dd><?= get_field('phone') ?></dd>
                    <dt>Mon adresse mail:</dt>
                    <dd><?= get_field('email') ?></dd>
                </dl>
            </aside>
        </main>

    <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
<?php get_footer(); ?>