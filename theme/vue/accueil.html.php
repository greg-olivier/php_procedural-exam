<?php foreach ($all_articles as $all_article) : ?>
            <article>
                <div class="blog-post">
        <h2 class="blog-post-title"><a href="?page=article&id=<?php echo $all_article['id_article'] ?>"><?php echo htmlspecialchars($all_article['titre']); ?></a></h2>
                        <?php if($all_article['image']!= NULL) : ?>
                            <img class="float-left rounded thumbnail" src="<?php echo IMAGE. $all_article['image'] ?>" alt="<?php  htmlspecialchars($all_article['titre']);?>">
                        <?php endif ?>
            </div>

                        <p><?php echo extr($all_article['contenu']); ?></p>
                    <div class="blog-post-meta">
                        Le <?php echo fr_date($all_article['date']); ?>
                    </div>
            </div>
                </div>
                </article>
        <?php endforeach; ?>