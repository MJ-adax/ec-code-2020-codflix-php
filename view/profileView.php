<?php ob_start(); ?>

<div class="landscape">
    <div class="bg-black">
        <div class="row no-gutters">
            <div class="col-md-6 full-height bg-white">
                <div>
                    <h2>Mon Compte</h2>

                    <form method="post" action="index.php?action=changePassword" class="custom-form">

                        <div>
                            <h5>Modifier votre mot de passe</h5>
                            <div class="form-group" style="width: 80%">
                                <label for="password">Ancien Mot de Passe</label>
                                <input type="password" name="old_password" value="" id="password" class="form-control" />
                            </div>

                            <div class="form-group" style="width: 80%">
                                <label for="password">Nouveau Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>

                            <div class="form-group" style="width: 80%">
                                <label for="password_confirm">Confirmation Nouveau Mot de passe</label>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" />
                            </div>

                            <div class="form-group" style="width: 80%">
                                <div class="col-md-6">
                                <input type="submit" name="Modifier" class="btn btn-block bg-blue" />
                            </div>
                        </div>
                    </form>

                    <form method="post" action="index.php?action=changeEmail" class="custom-form">
                        <div>
                            <h5>Modifier votre email</h5>
                            <div class="form-group" style="width: 80%">
                                <input type="email" name="email" value="" id="email" class="form-control" />
                            </div>

                            <div class="form-group" style="width: 80%">
                                <div class="col-md-6">
                                <input type="submit" name="Modifier" class="btn btn-block bg-blue" />
                            </div>
                        </div>
                    </form>

                    <form method="post" action="index.php?action=deleteAccount" class="custom-form">
                        <div>
                            <h5>Supprimer votre compte</h5>
                            <div class="form-group" style="width: 80%">
                                <div class="col-md-6">
                                <input type="submit" name="Supprimer" class="btn btn-block bg-red" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>