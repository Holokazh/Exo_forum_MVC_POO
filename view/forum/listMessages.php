<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex">
                        <h2 class="h2Page">Messages</h2>
                    </div>

                    <!----- BARRE DE RECHERCHE ----->
                    <form action="?ctrl=security&method=searchTopic" class="formSearchTopic" method="POST">
                        <input type="search" name="search" class="form-control ds-input searchInput" placeholder="Rechercher un topic..."></input>
                        <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">
                        <button type="submit" class="logoSearch"><img src="<?= IMG_PATH ?>logoSearch.png" alt=""></button>
                    </form>
                    
                </section>

                <div>
                    <?php foreach ($data['messages'] as $key => $value) { ?>
                        <p><?= $value->getTextMessage(); ?> || posté le <?= $value->getDateCreationMessage(); ?> - <?= $value->getUtilisateur()->getPseudonyme(); ?></p><br><br>
                        <!-- <?php var_dump($value); ?> -->
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $title = "FORUM-VT | Messages" ?>