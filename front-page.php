<?php get_header() ?>
<header>
  <form action="" id="search-home" class="red-rounded container">
    <select name="">
      <option>Type de vélo</option>
      <!-- <option value="Custom">Custom</option>
      <option value="Sportive">Sportive</option>
      <option value="Routiere">Routière</option> -->
    </select>
    <select name="">
      <option>Catégorie</option>
      <!-- <option value="500">500 cm3</option>
      <option value="600">600 cm3</option>
      <option value="750">750 cm3</option> -->
    </select>
    <input type="number" name="" id="" placeholder="Prix maximum (en €)">
    <input class="btn-link reverse" type="submit" value="rechercher">
    <!-- <button type="submit">rechercher</button> -->
  </form>
</header>
<main>
  <section id="pres-section" class="container">
    <?php
    if (have_posts()) {

      the_post();
      if (is_page()) {
        the_content();
      } else {
        while (have_posts()) {
          the_post();
          the_title('<h2>', '</h2>');
          the_excerpt();
          print '<a href="' . the_permalink() . '">voir +</a>';
        }
      }
    }
    ?>
  </section>

  <?php
  $query = new WP_Query([
    'post_type' => 'velo',
    'posts_per_page' => 3
  ]);

  if ($query->have_posts()) : ?>
    <section id="last-section" class="container">
      <h2>Nos derniers vélos</h2>
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
            <span><?php the_field('prix') ?></span>
            <a href="<?php the_permalink() ?>" class="btn-link">voir +</a>
          </article>
        <?php
        endwhile; ?>
      </div>
      <a class="btn-link" href="<?= get_post_type_archive_link('velo') ?>">
      Tous nos vélos
    </a>
    </section>
  <?php
  endif;
  ?>

</main>

<?php get_footer() ?>