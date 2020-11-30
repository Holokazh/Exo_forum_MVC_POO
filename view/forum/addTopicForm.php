<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="titlePage flex col-sm-12">
                        <h2 class="h2Page">Ajout d'un topic</h2>
                    </div>
                </section>
                <?php if (empty($_SESSION['user'])) { ?>
                    <p>Veuillez vous <a href='?ctrl=security&method=loginPage'>connecter</a> afin de créer un topic.</p>
                <?php } else { ?>


                    <form action="?ctrl=forum&method=addTopic" class="formLogin flex" method="POST">
                        <div>
                            <!-- Catégorie -->
                            <div class="form-group col-md-6">
                                <label for="categorie_id">Catégorie</label>
                                <select id="categorie_id" name="categorie_id" class="form-control" required>
                                    <?php foreach ($data['categories'] as $value) { ?>
                                        <option value="<?= $value->getId() ?>">
                                            <?= $value->getNomCategorie(); ?>
                                        </option>
                                    <?php } ?>
                                    </option>
                                </select>
                            </div>

                            <!-- Titre -->
                            <div class="form-group col-md-12">
                                <label for="titreTopic">Titre du topic</label>
                                <input type="text" class="form-control" placeholder="Titre du topic" id="titreTopic" name="titreTopic" required>
                            </div>

                            <!-- Message du topic -->
                            <div class="form-group col-md-12">
                                <label for="textTopic">Message du topic</label>
                                <textarea type="text" class="form-control" placeholder="Messsage du topic" id="textTopic" name="textTopic" required></textarea>
                            </div>

                            <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">

                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </form>


                <?php } ?>

            </div>
        </div>
    </div>
</div>