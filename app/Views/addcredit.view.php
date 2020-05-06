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
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="form-group">
                    <label id="label-credit-package" for="credit-packages">Kredit-Paket*</label>
                    <select class="form-control" name="credit-packages" required>
                        <option value="1">Kredit Basic: 1k</option>
                        <option value="2">Kredit Basic: 2k</option>
                        <option value="3">Kredit Basic: 3k</option>
                        <option value="4">Kredit Basic: 4k</option>
                        <option value="5">Kredit Basic: 5k</option>
                        <option value="6">Kredit Basic: 6k</option>
                        <option value="7">Kredit Basic: 7k</option>
                        <option value="8">Kredit Basic: 8k</option>
                        <option value="9">Kredit Basic: 9k</option>
                        <option value="10">Kredit Basic: 10k</option>
                        <option value="11">Kredit Best: 1k</option>
                        <option value="12">Kredit Best: 2k</option>
                        <option value="13">Kredit Best: 3k</option>
                        <option value="14">Kredit Best: 4k</option>
                        <option value="15">Kredit Best: 5k</option>
                        <option value="16">Kredit Best: 6k</option>
                        <option value="17">Kredit Best: 7k</option>
                        <option value="18">Kredit Best: 8k</option>
                        <option value="19">Kredit Best: 9k</option>
                        <option value="20">Kredit Best: 10k</option>
                        <option value="21">Kredit Plus: 1k</option>
                        <option value="22">Kredit Plus: 2k</option>
                        <option value="23">Kredit Plus: 3k</option>
                        <option value="24">Kredit Plus: 4k</option>
                        <option value="25">Kredit Plus: 5k</option>
                        <option value="26">Kredit Plus: 6k</option>
                        <option value="27">Kredit Plus: 7k</option>
                        <option value="28">Kredit Plus: 8k</option>
                        <option value="29">Kredit Plus: 9k</option>
                        <option value="30">Kredit Plus: 10k</option>
                        <option value="31">Kredit Karma: 1k</option>
                        <option value="32">Kredit Karma: 2k</option>
                        <option value="33">Kredit Karma: 3k</option>
                        <option value="34">Kredit Karma: 4k</option>
                        <option value="35">Kredit Karma: 5k</option>
                        <option value="36">Kredit Karma: 6k</option>
                        <option value="37">Kredit Karma: 7k</option>
                        <option value="38">Kredit Karma: 8k</option>
                        <option value="39">Kredit Karma: 9k</option>
                        <option value="40">Kredit Karma: 10k</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <input type="submit" id="button-submit" class="btn btn-primary">
    </form>

</div>



</body>
</html>