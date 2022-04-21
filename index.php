<?php
session_start();
if (!isset($_SESSION['history'])) { //if not exist create session arraylist to store history
    $_SESSION['history'] = array();
}
require_once 'consts.php';
require_once 'Calculator.php';
require_once 'History.php';
if (isset($_POST['submit'])) {
    $value = str_replace(",",".",$_POST['value']); //get value from forms
    $tempUnitInput = $_POST['tempUnitInput'];
    $tempUnitOutput = $_POST['tempUnitOutput'];
    $date = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];

    if ($tempUnitInput == CELSIUS && $tempUnitOutput == CELSIUS || $tempUnitInput == KELVIN && $tempUnitOutput == KELVIN || $tempUnitInput == FAHRENHEIT && $tempUnitOutput == FAHRENHEIT) { //check that the same units are not given
        $result = "Podałeś te same jednostki temperatury";
    } else {
        $calculator = new Calculator($value, $tempUnitInput, $tempUnitOutput); //create new object Calculator with values
        $result = $calculator->calc();
        if (is_numeric($result)) {
            $h = new History($value, $tempUnitInput, $tempUnitOutput, $result, $date, $ip);
            $h->save(); //save values to database
            array_push($_SESSION["history"], $h->add()); //add new element to array list
        }
    }
}
if (isset($_POST['history-clear'])) {
    unset($_SESSION['history']); //if user click button clear, unset variable history session and create new
    $_SESSION['history'] = array();
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator temperatur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body class="text-center">
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mt-5">
            <div class="card-body">
                <center>
                    <form method="post">
                        <h2 class="font-weight-normal">Przelicznik temperatury</h2>
                        <hr style="width:200px;text-align:left;margin-left:0">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="mt-2" for="inputValue">Podaj watość</label>
                                <input type="text" name="value" class="form-control" id="inputValue">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="mt-3" for="tempUnitInput">Przelicz z</label>
                                <select id="tempUnitInput" name="tempUnitInput" class="form-control">
                                    <option selected>Wybierz jednoskę</option>
                                    <option>Celsjusz</option>
                                    <option>Fahrenheit</option>
                                    <option>Kelwin</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label class="mt-3" for="tempUnitOutput">Przelicz na</label>
                                <select id="tempUnitOutput" name="tempUnitOutput" class="form-control">
                                    <option selected>Wybierz jednoskę</option>
                                    <option>Celsjusz</option>
                                    <option>Fahrenheit</option>
                                    <option>Kelwin</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success mt-3">Przelicz</button>

                            <div class="form-group col-md-6 text-center mb-3">
                                <label class="mt-3" for="outputValue">wynik</label>
                                <input type="text" readonly="readonly" value="<?php echo $result ?>"
                                       class="form-control"
                                       id="outputValue">
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card my-2">
            <div class="card-body">
                <form method="post" class="mt-2">
                    <button type="submit" name="history" class="btn btn-secondary">historia</button>

                <?php
                if (isset($_POST['history'])) { //if user click history button print history from session
                    echo '<button type="submit" name="history-clear" class="btn btn-danger">wyczyść</button>';
                    echo ' <h4 class="my-4"> Twoje ostatnie działania</h4>';
                    for ($i = 0; $i < count($_SESSION['history']); $i++) {
                        echo '<div class="row">
                                <b>' . ($i + 1) . '</b>
                              </div>
                              <p>' . $_SESSION['history'][$i] . '</p>';
                    }
                    echo '<button type="submit" name="history-close" class="btn btn-danger">zamknij</button>';
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>