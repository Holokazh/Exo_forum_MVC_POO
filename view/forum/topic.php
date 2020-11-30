<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex">
                        <h2 class="h2Page"><?= $data['topic']->getTitreTopic(); ?></h2>
                        <small>Par <?= $data['topic']->getUtilisateur()->getPseudonyme(); ?></small>
                        <small>Créé le <?= $data['topic']->getDateCreationTopic(); ?></small>
                    </div>
                    <!----- BARRE DE RECHERCHE ----->
                    <form action="?ctrl=security&method=searchTopic" class="formSearchTopic" method="POST">
                        <input type="search" name="search" class="form-control ds-input searchInput"></input>
                        <button type="submit" class="logoSearch"><img src="<?= IMG_PATH ?>logoSearch.png" alt=""></button>
                    </form>
                </section>
                <div class="textTopic">
                    <p><?= $data['topic']->getTextTopic(); ?></p>
                </div>
                <div>
                    <?php foreach ($data['message'] as $value) { ?>
                        <div class="contentMessage">

                            <h5><?= $value->getUtilisateur()->getPseudonyme(); ?></h5>
                            <p>
                                le <?= $value->getDateCreationMessage(); ?>
                            </p>
                            <span class="lineSeparator"></span>
                            <p class="pMessage"><?= $value->getTextMessage(); ?></p>
                            <!-- <?= var_dump($value); ?> -->
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>