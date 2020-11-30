<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex">
                        <h2 class="h2Page">Topics</h2>
                    </div>
                    <input type="search" class="form-control ds-input searchInput"></input>
                </section>

                <div>
                    <?php foreach ($data['utilisateurs'] as $value) { ?>
                        <a href="?ctrl=forum&method=user<?= $value->getId(); ?>"><?= $value->getPseudonyme(); ?></a><?= " membre depuis le " . $value->getDateCreationUser(); ?><br><br>
                        <!-- <?= var_dump($value); ?> -->
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $title = "FORUM-VT | Utilisateurs" ?>