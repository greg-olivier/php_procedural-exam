<?php if (isset($erreur)):
    if ($erreur != ""): ?>
        <div class="alert alert-danger">
            <?php echo $erreur ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info">
            <p>Inscription enregistrée</p>
        </div>
    <?php endif; ?>

<?php endif ?>

<form method="post">
    <div class="radio-inline">
        <div class="radio-inline">
            <label>
                <input type="radio" class="form-control" name="civil" value="mr">Mr</label>
            <label>
                <input type="radio" class="form-control" name="civil" value="mme">Mme</label>
        </div>
    </div>

    <div class="form-group">
        <label for="nom">Votre nom</label>
        <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom">
        <label for="email">Votre email</label>
        <input type="email" class="form-control" name="email" placeholder="Entrez votre email">
    </div>
    <div class="form-group">
        <label for="objet">Objet :</label>
        <SELECT name="objet" class="form-control" size="1">
            <OPTION>Sélectionnez...
            <?php foreach ($cours as $item) : ?>
    <OPTION <?php if (isset($_GET['cours'])) :
            if ($_GET['cours'] == $item['id_cours']) : ?> selected
            <?php endif ?>
            <?php endif ?>
            ><?php echo ($item['nom']); ?>
            <?php endforeach ?>
        </SELECT>
    </div>

    <input type="hidden" name="token" value="<?php echo $token ?>">


    <button type="reset" class="btn btn-default">Reset</button>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>