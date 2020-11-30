<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex">
                        <h2 class="h2Page">Messages</h2>
                    </div>
                    <input type="search" class="form-control ds-input searchInput"></input>
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