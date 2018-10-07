<?php 
$check = new SessionController();
$check->restricLogin();

    if (isset($_POST['submitCreate'])) {
        $plats = new WeekMealsController();
        $plats->updateWeekMeals(array(
            $_POST['lundi'],
            $_POST['mardi'],
            $_POST['mercredi'],
            $_POST['jeudi'],
            $_POST['vendredi'],
            $_POST['samedi'],
            $_POST['dimanche'],
            $_POST['semaine']));

        $_SESSION['flash']['success'] = "Successful modification";

    }

    if (isset($_GET['id'])){
        $plats = new WeekMealsController();
        $data = $plats->getWeekMealsById($_GET['id']);
    }

?>
    <form action="" method="post" id="createform" class="form-horizontal">
        <h2 style="text-align: center">Modifier les plats de la semaine  <strong><?php echo $data->NUM_SEMAINE ?></strong> :</h2>
        <input type='hidden' name='semaine' value="<?php echo $data->NUM_SEMAINE ?>" /><br/>

        <div class="form-group ">
            <label class="control-label " for="lundi">
                Lundi
            </label>
            <input class="form-control" id="lundi" type='text' maxlength=255 name='lundi' value="<?php echo $data->LUNDI ?>"/>
        </div>

        <div class="form-group ">
            <label class="control-label " for="mardi">
                Mardi
            </label>
            <input class="form-control" id="mardi" type='text' maxlength=255 name='mardi' value="<?php echo $data->MARDI ?>"/>
        </div>

        <div class="form-group ">
            <label class="control-label " for="mercredi">
                Mercredi
            </label>
            <input class="form-control" id="mercredi" type='text' maxlength=255 name='mercredi' value="<?php echo $data->MERCREDI ?>"/>
        </div>

        <div class="form-group ">
            <label class="control-label " for="jeudi">
                Jeudi
            </label>
            <input class="form-control" id="jeudi" type='text' maxlength=255 name='jeudi' value="<?php echo $data->JEUDI ?>"/>
        </div>

        <div class="form-group ">
            <label class="control-label " for="vendredi">
                Vendredi
            </label>
            <input class="form-control" id="vendredi" type='text' maxlength=255 name='vendredi' value="<?php echo $data->VENDREDI ?>"/>
        </div>

        <div class="form-group ">
            <label class="control-label " for="samedi">
                Samedi
            </label>
            <input class="form-control" id="samedi" type='text' maxlength=255 name='samedi' value="<?php echo $data->SAMEDI ?>"/>
        </div>

        <div class="form-group ">
            <label class="control-label " for="dimanche">
                Dimanche
            </label>
            <input class="form-control" id="dimanche" type='text' maxlength=255 name='dimanche' value="<?php echo $data->DIMANCHE ?>"/>
        </div>

        <button type="submit" class="btn btn-primary center-block" name="submitCreate" value="Modifier Semaine">Modify Week</button>

    </form>

<br/><a href="index.php?p=planning"><button class="btn center-block">Return to Planning</button></a>
