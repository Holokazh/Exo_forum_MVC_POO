<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex">
                        <h2 class="h2Page">Topics recherchés</h2>
                    </div>
                    <form action="?ctrl=security&method=searchTopic" class="formSearchTopic" method="GET">
                        <input type="search" name="search" class="form-control ds-input searchInput"></input>
                        <button type="submit" name="searchTopic" class="logoSearch"><img src="<?= IMG_PATH ?>logoSearch.png" alt=""></button>
                    </form>
                </section>

                <div class="underTitle flex">
                    <div>
                        <h4>DISCUSSIONS</h4>
                    </div>
                    <div class="flex">
                        <h4>Réponses</h4>
                        <h4>Activité</h4>
                    </div>
                </div>

                <div class="backgroundDefault">
                    <?php foreach ($data['topics'] as $value) { ?>
                        <div class="contentTopic">
                            <div class="contentTitreTopicWidth">
                                <p><a href="?ctrl=forum&method=detailTopics&id=<?= $value->getId(); ?>"><?= $value->getTitreTopic(); ?></a></p>
                            </div>
                            <p>créé le <?= $value->getDateCreationTopic() ?><br>
                                par <a href='<?= $value->getUtilisateur()->getId() ?>'><?= $value->getUtilisateur()->getPseudonyme() ?></a></p>
                            <a href="?ctrl=forum&method=deleteTopic&id=<?= $value->getId(); ?>"><button class="btn btnDeleteListTopic btn-danger">Supprimer</button></a>
                            <!-- <?= var_dump($value); ?> -->
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>