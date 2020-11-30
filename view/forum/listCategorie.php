<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex">
                        <h2 class="h2Page">Catégories</h2>
                    </div>
                    <input type="search" class="form-control ds-input searchInput"></input>
                </section>

                <div>
                    <?php foreach ($data['categories'] as $value) { ?>
                        <a href="?ctrl=forum&method=detailCategories&id=<?= $value->getId(); ?>"><?= $value->getNomCategorie(); ?></a><br><br>
                        <!-- <?php var_dump($value); ?> -->
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>