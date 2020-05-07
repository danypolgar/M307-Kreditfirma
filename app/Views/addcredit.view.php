<html>
<head>
    <title>Erfassen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
<div class="col-md-6 offset-3">
    <!--    TODO: Action und method handeln-->
    <form action="add" method="POST" novalidate>
        <h1>Kredite Erfassen</h1>
        <fieldset>
            <div class="verticals">
                <div class="form-group">
                    <label id="label-name" for="name">Vorname*</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label id="label-email" for="email">Email*</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label id="label-phonenumber" for="phonenumber">Telefonnummer</label>
                <input type="text" name="phonenumber" class="form-control">
            </div>
        </fieldset>
        <fieldset>
            <div class="verticals">
                <div class="form-group">
                    <label id="label-rates" for="rates">Anzahl Raten*</label>
                    <select type="number" name="rates" class="form-control" required>
                        <?php
                        for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label id="label-credit-package" for="credit-packages">Kredit-Paket*</label>
                    <select class="form-control" name="credit-packages" required>

                        <?php foreach ($creditPackages as $package): ?>
                            <option value="<?= $package["id"] ?>"><?= $package["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <input type="submit" id="button-submit" class="btn btn-primary">
        <input type="submit" id="button-cancel" name="cancel" class="btn btn-danger" value="Abbrechen">
    </form>

</div>



</body>
</html>