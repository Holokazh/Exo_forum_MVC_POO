<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex">
                        <h2 class="h2Page"><?= $data['categorie']->getNomCategorie(); ?></h2>
                    </div>
                    <input type="search" class="form-control ds-input searchInput"></input>
                </section>
                <div>
                    <?php foreach ($data['topic'] as $value) { ?>
                        <a href="?ctrl=forum&method=detailTopics&id=<?= $value->getId(); ?>"><?= $value->getTitreTopic(); ?></a><br><br>
                        <!-- <?= var_dump($value); ?> -->
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>