<?php get_header() ?>

<main id="annonce">
    <!-- <nav class="container">
      <a href="index.html">Accueil</a> > <a href="nos-motos.html">Nos vélos</a> > <span>LOOK</span><br>
      <a href="nos-motos.html" class="btn-link">&larr; toutes nos annonces</a>
    </nav> -->

    <?php 
    /********************************** DEBUT CONTENU VELO */
    if (have_posts()) :
      the_post();
      ?>

    <section id="ficheVelo" class="container">
      <article>
        <figure>
          <?php the_post_thumbnail('medium_large'); ?>
          <figcaption class="wp_block_button-link"><?php the_field('tarif') ?> €</figcaption>
        </figure>
        <div id="details">
          <h1><?php the_title() ?></h1>
          <?php the_content() ?>
        </div>
      </article>
      <form action="" class="red-rounded">
        <h2>Vous souhaitez des renseignements ?</h2>
        <input type="text" name="" id="" placeholder="votre nom & prénom">
        <input type="email" name="" id="" placeholder="votre adresse mail">
        <textarea name="" id="" placeholder="votre message"></textarea>
        <input type="submit" class="wp_block_button-link reverse" value="Envoyer ma demande">
      </form>
      <table>
        <tr>
          <td colspan="2"><h2>Détails techniques</h2></td>
        </tr>
        <tr>
          <td class="text-right">Marque</td>
          <td class="text-left"><?php the_field('marque') ?></td>
        </tr>
        <tr>
          <td class="text-right">Catégorie</td>
          <td class="text-left"><?php the_field('categorie') ?></td>
        </tr>
        <tr>
          <td class="text-right">Taille</td>
          <td class="text-left"><?php the_field('taille') ?></td>
        </tr>
        <tr>
          <td class="text-right">Nombre de plateau</td>
          <td class="text-left"><?php the_field('nombre_de_plateau') ?></td>
        </tr>
        <tr>
          <td class="text-right">Electrique</td>
          <td class="text-left"><?php the_field('electrique') ?></td>
        </tr>
        <tr>
          <td colspan="2">
            <p>partagez cette annonce :</p>
            <a class="social" href="#"><img src="<?php echo get_template_directory_uri() ?>/img/001-facebook.png" alt=""></a>
            <a class="social" href="#"><img src="<?php echo get_template_directory_uri() ?>/img/002-twitter.png" alt=""></a>
            <a class="social" href="#"><img src="<?php echo get_template_directory_uri() ?>/img/003-twitch.png" alt=""></a>
            <a class="social" href="#"><img src="<?php echo get_template_directory_uri() ?>/img/004-gmail.png" alt=""></a>
          </td>
        </tr>
      </table>
    </section>

    <?php 
      endif;
/************************************** FIN CONTENU MOTO */
      ?>
    <div class="container" id="navigation">
      <a class="wp_block_button-link" href="<?= get_post_type_archive_link('velo') ?>">< LOOK</a>
      <a class="wp_block_button-link" href="<?= get_post_type_archive_link('velo') ?>">CANNONDALE ></a>
    </div>
  </main>
  
  <?php
  $query = new WP_Query([
    'post_type' => 'velo',
    'posts_per_page' => 3,
    'post__not_in' => [get_the_ID()],
    'meta_query'	=> array(
      'relation'		=> 'OR',
      array(
        'key'	 	=> 'categorie',
        'value'	  	=> array(get_field('categorie')),
        /* 'compare' 	=> 'IN', */
      ),
    ),
  ]);

  if ($query->have_posts()) : ?>
    <section id="last-section" class="container">
    <h2>Ces vélos peuvent vous intéresser</h2>
      <div id="veloList">
        <?php while ($query->have_posts()) :
          $query->the_post();
        ?>
          <article class="red-rounded velo">
            <?php the_post_thumbnail('medium') ?>
            <h3><?php the_title() ?></h3>
            <table>
            <tr>
          <td class="text-right">Marque</td>
          <td class="text-left"><?php the_field('marque') ?></td>
        </tr>
        <tr>
          <td class="text-right">Catégorie</td>
          <td class="text-left"><?php the_field('categorie') ?></td>
        </tr>
        <tr>
          <td class="text-right">Taille</td>
          <td class="text-left"><?php the_field('taille') ?></td>
        </tr>
            </table>
            <span><?php the_field('tarif') ?></span>
            <a href="<?php the_permalink() ?>" class="wp_block_button-link">voir +</a>
          </article>
        <?php
        endwhile; ?>
      </div>
      <a class="wp_block_button-link" href="<?= get_post_type_archive_link('velo') ?>">
      Tous nos vélos
    </a>
    </section>
  <?php
  endif;
  ?>


  <a id="topPage" href="#">&uarr;</a>  


<?php get_footer() ?>