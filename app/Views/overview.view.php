<html>
<head>
    <title>Übersicht</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <div class="col-md-6 offset-3">
        <h1>Kreditliste</h1>
        <div class="overview-container">
            <ul class="list-group">
                <?php
                foreach ($creditList as $credit)?>
                    <li class="list-group-item">
                    <div class="col-md-3 overview-cell ">
                        <?= $credit['name'] ?>
                    </div>
                    <div class="col-md-2 overview-cell-status">
                        <?= $credit['status'] ?>
                    </div>
                    <div class="col-md-3 overview-cell">
                        <?= $credit['paymentDeadline'] ?>
                    </div>
                    <div class="col-md-3 overview-cell">
                        <?= $credit['creditPackage'] ?>
                    </div>
                    <div class="col-md-1 overview-cell">
                        Bearbeiten
                    </div>
                </li>
            </ul>
        </div>

<!--        TODO: Action event handeln-->
        <form action="">
            <div class="interaction-menu">
                <input type="submit" class="btn btn-primary" value="Erfassen">
            </div>
        </form>

    </div>
</body>
</html>
