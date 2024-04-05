<?php /* Template Name: Page "Contact" */ ?>
<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
        
        <main class="contact">
            <header class="contact__header">
                <h1 class="contact__title"><?= get_the_title(); ?></h1>
            </header>

            <section class="contact__form" style="display:none">
                <h2>Contactez-moi via ce formulaire</h2>
                <?= apply_filters('the_content', '[contact-form-7 id="50d0494" title="Contact form 1"]'); ?>
            </section>

            <section class="contact__form form">
                <h2 class="form__title">... ou via cet autre formulaire qui fonctionne mieux&nbsp;!</h2>
                <form action="#" method="post" class="form__container">
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_firstname" class="field__label">Votre prénom</label>
                        <input type="text" name="firstname" id="custom_firstname" class="field__input">
                        <!-- <p class="field__error">Ceci est une erreur de test</p> -->
                    </div>
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_lastname" class="field__label">Votre nom</label>
                        <input type="text" name="lastname" id="custom_lastname" class="field__input">
                    </div>
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_email" class="field__label">Votre adresse mail</label>
                        <input type="email" name="email" id="custom_email" class="field__input">
                    </div>
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_phone" class="field__label">Votre numéro de téléphone</label>
                        <input type="tel" name="phone" id="custom_phone" class="field__input">
                    </div>
                    <div class="form__field field field--input">
                        <label for="custom_subject" class="field__label">Sujet</label>
                        <input type="text" name="subject" id="custom_subject" class="field__input">
                    </div>
                    <div class="form__field field field--textarea">
                        <label for="custom_message" class="field__label">Message</label>
                        <textarea name="message" id="custom_message" cols="30" rows="10" class="field__textarea"></textarea>
                    </div>
                    <div class="form__end">
                        <button class="form__submit" type="submit">Envoyer</button>
                    </div>
                </form>
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