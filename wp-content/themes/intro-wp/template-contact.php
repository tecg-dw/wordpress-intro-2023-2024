<?php /* Template Name: Page "Contact" */ ?>
<?php get_header(); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
        
        <main class="contact">
            <header class="contact__header">
                <h1 class="contact__title"><?= get_the_title(); ?></h1>
            </header>

            <section class="contact__map map">
                <h2 class="sro"><?= __('Nous retrouver', 'dw'); ?></h2>
                <div class="wrapper">
                    <div class="map__container">
                        <article class="map__location" data-lat="50.63347585755564" data-lng="5.563157525897727">
                            <h3 class="map__title">Le bureau</h3>
                            <div class="map__content">
                                <p class="map__name"><strong>Whitecube</strong></p>
                                <p class="map__address">Rue des Anges, 17<br />4000 Liège</p>
                            </div>
                            <a href="https://www.google.com/maps/dir//Whitecube,+Rue+des+Anges+17,+4000+Li%C3%A8ge/@50.633128,5.5625782,18.28z/data=!4m9!4m8!1m0!1m5!1m1!1s0x47c012c95e458e01:0xdb68baf97a38b6f5!2m2!1d5.5631236!2d50.6335!3e0?entry=ttu" class="map__btn"><?= str_replace(':location', 'Whitecube', __('Itinéraire ver :location', 'dw')); ?></a>
                        </article>
                        <article class="map__location" data-lat="50.610827415236116" data-lng="5.510167042741411">
                            <h3 class="map__title">L'école</h3>
                            <div class="map__content">
                                <p class="map__name"><strong>Haute École de la Province de Liège</strong></p>
                                <p class="map__address">Rue Peetermans 80<br />4100 Seraing</p>
                            </div>
                            <a href="https://www.google.com/maps/dir//HEPL+-+Haute+Ecole+de+la+Province+de+Li%C3%A8ge+-+Campus+Parc+des+Mar%C3%AAts,+Rue+Peetermans+80,+4100+Seraing/@50.6103021,5.5115673,17.92z/data=!4m9!4m8!1m0!1m5!1m1!1s0x47c0f913260c08e5:0x4f2ac72c2556af90!2m2!1d5.5103095!2d50.6108445!3e0?entry=ttu" class="map__btn"><?= str_replace(':location', 'HEPL', __('Itinéraire ver :location', 'dw')); ?></a>
                        </article>
                    </div>
                </div>
                <div class="map__app"></div>
            </section>

            <section class="contact__form" style="display:none">
                <h2>Contactez-moi via ce formulaire</h2>
                <?= apply_filters('the_content', '[contact-form-7 id="50d0494" title="Contact form 1"]'); ?>
            </section>

            <section class="contact__form form">
                <h2 class="form__title">... ou via cet autre formulaire qui fonctionne mieux&nbsp;!</h2>
                <?php 
                $errors = \DW\ContactForm::errors();
                $values = \DW\ContactForm::values();
                $feedback = \DW\ContactForm::feedback();

                if($feedback): ?>
                <div class="form__feedback">
                    <p>Merci&nbsp;! Votre message a bien été envoyé.</p>
                </div>
                <?php else: ?>

                <?php if($errors):?>
                <div class="form__error">
                    <p>Oups&nbsp;! Il semblerait y avoir des erreurs, merci de vérifier.</p>
                </div>
                <?php endif; ?>

                <form action="<?= esc_url(admin_url('admin-post.php')) ?>" method="post" class="form__container">
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_firstname" class="field__label">Votre prénom</label>
                        <input type="text" name="firstname" id="custom_firstname" class="field__input" value="<?= $values['firstname'] ?? '' ?>">
                        <?php if($errors['firstname'] ?? null): ?>
                        <p class="field__error"><?= $errors['firstname'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_lastname" class="field__label">Votre nom</label>
                        <input type="text" name="lastname" id="custom_lastname" class="field__input" value="<?= $values['lastname'] ?? '' ?>">
                        <?php if($errors['lastname'] ?? null): ?>
                        <p class="field__error"><?= $errors['lastname'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_email" class="field__label">Votre adresse mail</label>
                        <input type="email" name="email" id="custom_email" class="field__input" value="<?= $values['email'] ?? '' ?>">
                        <?php if($errors['email'] ?? null): ?>
                        <p class="field__error"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form__field form__field--half field field--input">
                        <label for="custom_phone" class="field__label">Votre numéro de téléphone</label>
                        <input type="tel" name="phone" id="custom_phone" class="field__input" value="<?= $values['phone'] ?? '' ?>">
                        <?php if($errors['phone'] ?? null): ?>
                        <p class="field__error"><?= $errors['phone'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form__field field field--input">
                        <label for="custom_subject" class="field__label">Sujet</label>
                        <input type="text" name="subject" id="custom_subject" class="field__input" value="<?= $values['subject'] ?? '' ?>">
                        <?php if($errors['subject'] ?? null): ?>
                        <p class="field__error"><?= $errors['subject'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form__field field field--textarea">
                        <label for="custom_message" class="field__label">Message</label>
                        <textarea name="message" id="custom_message" cols="30" rows="10" class="field__textarea"><?= $values['message'] ?? '' ?></textarea>
                        <?php if($errors['message'] ?? null): ?>
                        <p class="field__error"><?= $errors['message'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form__end">
                        <input type="hidden" name="action" value="custom_contact_form">
                        <button class="form__submit" type="submit">Envoyer</button>
                    </div>
                </form>
                <?php endif; ?>
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