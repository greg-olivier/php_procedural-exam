 <?php foreach ($category_allcours as $category_cours) : ?>
                <h2><?php echo $category_cours['nom']; ?></h2>
                <?php if( $category_cours['capacite'] == $category_cours['inscrit']) : ?>
                <div class="alert alert-warning">
                    <p>Ce cours est complet</p>
                </div>
                <?php else: ?>
                <a href="?page=inscription&cours=<?php echo $category_cours['id_cours'] ?>">S'inscrire à ce cours ?</a>
                <?php endif ?>
    <?php endforeach ?>

