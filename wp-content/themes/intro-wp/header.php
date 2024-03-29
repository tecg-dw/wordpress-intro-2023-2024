<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= dw_asset('css/site.css'); ?>">
    <script src="<?= dw_asset('js/site.js') ?>"></script>
</head>
<body>
    <h1><?= get_bloginfo('name'); ?></h1>
    <div class="menu">
        <?php 
        // Afficher le menu de pied de page "façon Wordpress"
        wp_nav_menu(['theme_location' => 'main', 'container' => 'nav']); 
        ?>

        <?php 
        // Afficher le menu de pied de page "façon MVC"
        ?>
        <nav class="nav">
            <h2 class="nav_title">Navigation principale</h2>
            <div class="nav__container">
                <?php foreach(dw_get_navigation_links('main') as $link): ?>
                <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
                <?php endforeach; ?>
            </div>
        </nav>

        <div class="search">
            <?php get_search_form(); ?>

            <?php // OU... ?>

            <form action="<?= home_url(); ?>" method="get" class="search__form">
                <div class="search__field">
                    <label for="search">Votre recherche</label>
                    <input type="search" name="s" id="search" placeholder="par exemple tarte..." value="<?= get_search_query(); ?>" />
                    <button type="submit" class="search__btn">Rechercher !</button>
                </div>
            </form>
        </div>
    </div>