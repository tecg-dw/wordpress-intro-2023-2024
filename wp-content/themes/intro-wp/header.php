<!DOCTYPE html>
<html lang="<?= pll_current_language('locale'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= dw_asset('css/site.css'); ?>">
    <script src="<?= dw_asset('js/site.js') ?>"></script>
    <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
            key: "AIzaSyDyyJXNs7g2XFaMoAemOMrz9Si7OiyLfU4",
            v: "weekly",
        });
    </script>
</head>
<body>
    <h1><?= get_bloginfo('name'); ?></h1>
    <div class="menu">
        <?php 
        // Afficher le menu de pied de page "façon Wordpress"
        // wp_nav_menu(['theme_location' => 'main', 'container' => 'nav']); 
        ?>

        <?php 
        // Afficher le menu de pied de page "façon MVC"
        ?>
        <nav class="nav">
            <div class="wrapper">
                <h2 class="sro"><?= __('Navigation principale', 'dw') ?></h2>
                <div class="nav__container">
                    <?php foreach(dw_get_navigation_links('main') as $link): ?>
                    <a href="<?= $link->url ?>" class="nav__link"><?= $link->label ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="nav__languages">
                    <?php foreach(dw_get_languages() as $lang): ?>
                    <a href="<?= $lang->url; ?>" class="nav__lang<?php if($lang->current):?> nav__lang--current<?php endif;?>" hreflang="<?= $lang->locale; ?>" title="<?= $lang->label; ?>"><?= $lang->code; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </nav>

        <div class="search">
            <?php get_search_form(); ?>

            <?php // OU... ?>

            <form action="<?= home_url(); ?>" method="get" class="search__form">
                <div class="search__field">
                    <label for="search"><?= __('Votre recherche', 'dw') ?></label>
                    <input type="search" name="s" id="search" placeholder="<?= __('Recherchez par exemple tarte..', 'dw') ?>" value="<?= get_search_query(); ?>" />
                    <button type="submit" class="search__btn"><?= __('Rechercher', 'dw') ?></button>
                </div>
            </form>
        </div>

        <?php // Version "BEM" avec JS pour faire un "quick search" ?>

        <div class="quicksearch">
            <form action="<?= home_url(); ?>" method="get" class="quicksearch__form">
                <div class="quicksearch__field">
                    <label for="search" class="quicksearch__label sro"><?= __('Votre recherche', 'dw') ?></label>
                    <input type="search" name="s" id="search" placeholder="<?= __('Recherchez par exemple tarte..', 'dw') ?>" value="<?= get_search_query(); ?>" class="quicksearch__input" />
                    <button type="submit" class="quicksearch__btn">
                        <span class="sro"><?= __('Rechercher', 'dw') ?></span>
                    </button>
                </div>
            </form>
        </div>
    </div>