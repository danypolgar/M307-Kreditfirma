<html>
<head>
    <title>Bearbeiten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
<div class="col-md-6 offset-3">
    <!--    TODO: Action und method handeln-->
    <form action="update" method="POST">
        <h1>Kredite Bearbeiten</h1>
        <fieldset>
            <div class="verticals">
                <div class="form-group">
                    <label id="label-name" for="nickname">Nickname*</label>
                    <input type="text" name="nickname" class="form-control" value="<?= $credit["nickname"] ?>" required>
                </div>
                <div class="form-group">
                    <label id="label-email" for="email">Email*</label>
                    <input type="text" name="email" class="form-control" value="<?= $credit["email"] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label id="label-phonenumber" for="phonenumber">Telefonnummer</label>
                <input type="text" name="phonenumber" class="form-control" value="<?= $credit["phonenumber"] ?>">
            </div>
            <div class="form-group">
                <label id="raten">Raten</label>
                <input type="text" value="<?= $credit["amount_rates"] ?>" class="form-control" disabled>
            </div>
        </fieldset>
        <fieldset>
            <div class="verticals">
                <div class="form-group">
                    <label id="label-credit-package" for="credit-packages">Kredit Packet*: <b><?= $credit["name"] ?></b></label>
                    <select class="form-control" name="credit-packages" required>

                        <?php foreach ($creditPackages as $package): ?>
                            <option value="<?= $package["id"] ?>"><?= $package["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label id="label-status" for="status">Verleih-Status*</label>
                    <select type="number" name="status" class="form-control" required>
                        <option value="0">Offen</option>
                        <option value="1">Abgeschlossen</option>
                    </select>
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="<?= $id ?>">
        </fieldset>
        <input type="submit" id="button-submit" class="btn btn-primary">
        <input type="submit" id="button-cancel" name="cancel" class="btn btn-danger" value="abbrechen">
    </form>

</div>



</body>
</html>