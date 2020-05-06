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
    <form action="add" method="POST">
        <h1>Kredite Erfassen</h1>
        <fieldset>
            <div class="verticals">
                <div class="form-group">
                    <label id="label-name" for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label id="label-email" for="email">Email</label>
                    <input type="text" name="email" class="form-control">
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
                    <label id="label-rates" for="rates">Anzahl Raten</label>
                    <input type="number" name="rates" class="form-control">
                </div>
                <div class="form-group">
                    <label id="label-credit-package" for="credit-packages">Kredit-Paket</label>
                    <select class="form-control" name="credit-packages">
                        <option value="0">test0</option>
                        <option value="1">test1</option>
                        <option value="2">test2</option>
                        <option value="3">test3</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <input type="submit" id="button-submit" class="btn btn-primary">
    </form>

</div>



</body>
</html>