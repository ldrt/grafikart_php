<footer>
    <hr>
    <div class="row">
        <div class="col-md4">
        <?php
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
            ajouter_vue();
            $vues = nombre_vues();
        ?>
        Il y a <?= $vues ?> visite<?php if ($vues > 1) : ?>s<?php endif; ?> sur le site
        </div>
        <div class="col-md4">
            <form action="/newsletter.php" method="POST" class="form-inline">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Entrez votre email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
        <div class="col-md4">
        <h5>Navigation</h5>
            <ul class="unstyled text-small">
                <?= nav_menu (); ?>
            </ul>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
</body>
</html>
