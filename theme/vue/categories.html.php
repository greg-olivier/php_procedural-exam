
<?php foreach ($all_categories as $all_category) :
    if ($all_category['nb']=== 0) : continue; else : ?>
        <a href="?page=cours&action=cours&cat=<?php echo $all_category['id_cat'] ?>">
            <h3>
                <?php echo $all_category['nom']; ?> (<?php echo $all_category['nb']; ?>)
            </h3>

        </a>
    <?php endif; ?>
    <br/>
<?php endforeach ?>