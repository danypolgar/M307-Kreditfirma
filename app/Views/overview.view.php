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
    <form action="change-status" method="POST">
        <div class="overview-container">
            <ul class="list-group">
                <?php
                foreach ($creditList as $credit): ?>
                    <li class="list-group-item">
                        <div class="col-md-3 overview-cell ">
                            <?= $credit["nickname"] ?>
                        </div>
                        <div class="col-md-1 overview-cell-status">
                            <?php echo evaluateState($credit["amount_rates"], $credit["rent_date"]) ?>
                        </div>
                        <div class="col-md-3 overview-cell">
                            <?php $days = Calculations::calculateDays($credit["amount_rates"]);
                            $date = new DateTime();
                            $date = $date->format('Y-m-d');
                            echo date('Y-m-d', strtotime($date. ' + ' .$days.' days')); ?>
                        </div>
                        <div class="col-md-3 overview-cell">
                            <?= $credit['name'] ?>
                        </div>
                        <div class="col-md-1 overview-cell">
                            <a href="<?= 'bearbeiten?id=' . $credit[0] ?>">&#128394</a>
                        </div>
                        <div class="col-md-1 overview-cell">
                            <input name="checklist[]" type="checkbox" value="<?= $credit[0] ?>">
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <input type="submit" class="btn btn-primary" value="Abschliessen">
    </form>

    <!--        TODO: Action event handeln-->
    <form action="erfassen">
        <div class="interaction-menu">
            <input type="submit" class="btn btn-primary" value="Erfassen">
        </div>
    </form>

</div>
</body>
</html>
