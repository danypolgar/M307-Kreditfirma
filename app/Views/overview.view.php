<html>
<head>
    <title>Übersicht</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
<div class="col-md-6 offset-3">
    <h1>Kreditliste</h1>
    <div class="overview-container">
        <ul class="list-group">
            <?php
            foreach ($creditList as $credit): ?>
                <li class="list-group-item">
                    <div class="col-md-3 overview-cell ">
                        <?= $credit["nickname"] ?>
                    </div>
                    <div class="col-md-1 overview-cell-status">
                        <?php echo evaluateState($credit["rent_date"], $credit["amount_rates"]) ?>
                    </div>
                    <div class="col-md-3 overview-cell">
                        <?php $dateTime = Calculations::calculateDeadline($credit["rent_date"], $credit["amount_rates"]);
                        echo $dateTime->format('Y-m-d')?>
                    </div>
                    <div class="col-md-4 overview-cell">
                        <?= $credit['name'] ?>
                    </div>
                    <div class="col-md-1 overview-cell">
                        <a href="<?= 'bearbeiten?id=' . $credit[0]?>">&#128394</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!--        TODO: Action event handeln-->
    <form action="erfassen">
        <div class="interaction-menu">
            <input type="submit" class="btn btn-primary" value="Erfassen">
        </div>
    </form>

</div>
</body>
</html>
