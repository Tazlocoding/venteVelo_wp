<?php get_header() ?>

<main>

  <section id="last-section" class="container">

    <h1>Nos vélos</h1>

    <div id="veloList">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
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
            <a href="annonce.html" class="wp_block_button-link">voir +</a>
          </article>

      <?php
        endwhile;
      endif;
      ?>

    </div>

    <a class="wp_block_button-link" href="">
      < précédent</a> <a class="wp_block_button-link" href="">suivant >
    </a>

  </section>
</main>
<?php get_footer() ?>