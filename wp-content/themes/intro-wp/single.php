<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="<?= dw_asset('theme.css'); ?>">
    <script src="<?= dw_asset('script.js') ?>"></script>
</head>
<body>
    <?php if(have_posts()): while(have_posts()): the_post(); // Ouverture de "The Loop" de Wordpress ?>
        
        <main class="post">
            <header class="post__header">
                <h1 class="post__title"><?= get_the_title(); ?></h1>
            </header>
            <section class="post__intro">
                <h2 class="sro">Introduction</h2>
                <?= get_the_content(); ?>
            </section>
        </main>

    <?php endwhile; endif; // Fermeture de "The Loop" de Wordpress ?>
</body>
</html>