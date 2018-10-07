<?php 
$check = new SessionController();
$check->restricLogin();


$ctrl = new WeekMealsController();

if (isset($_POST['submitCreate'])) {

    $ctrl->createNextWeekMeals(array($_POST['lundi'],
        $_POST['mardi'],
        $_POST['mercredi'],
        $_POST['jeudi'],
        $_POST['vendredi'],
        $_POST['samedi'],
        $_POST['dimanche'],
        $_POST['numSemaine']));

    $_SESSION['flash']['success'] = "Semaine créee avec succèss";
    header('Location:index.php?p=planning');
}
?>


<form action="" method="post" id="createform" class="form-horizontal">
    <h2 style="text-align: center">Creer les plats du jour de la semaine en cours(Semaine <?php if(!empty($_GET['id'])){ echo $_GET['id'];} ?>) :</h2>
    <input type='hidden' name='numSemaine' value="<?php if(!empty($_GET['id'])){ echo $_GET['id'];} ?>"/><br/>

    <div class="form-group ">
        <label class="control-label " for="lundi">
            Lundi
        </label>
        <input class="form-control" id="lundi" type='text' maxlength=255 name='lundi'/>
    </div>

    <div class="form-group ">
        <label class="control-label " for="mardi">
            Mardi
        </label>
        <input class="form-control" id="mardi" type='text' maxlength=255 name='mardi'/>
    </div>

    <div class="form-group ">
        <label class="control-label " for="mercredi">
            Mercredi
        </label>
        <input class="form-control" id="mercredi" type='text' maxlength=255 name='mercredi'/>
    </div>

    <div class="form-group ">
        <label class="control-label " for="jeudi">
            Jeudi
        </label>
        <input class="form-control" id="jeudi" type='text' maxlength=255 name='jeudi'/>
    </div>

    <div class="form-group ">
        <label class="control-label " for="vendredi">
            Vendredi
        </label>
        <input class="form-control" id="vendredi" type='text' maxlength=255 name='vendredi'/>
    </div>

    <div class="form-group ">
        <label class="control-label " for="samedi">
            Samedi
        </label>
        <input class="form-control" id="samedi" type='text' maxlength=255 name='samedi'/>
    </div>

    <div class="form-group ">
        <label class="control-label " for="dimanche">
            Dimanche
        </label>
        <input class="form-control" id="dimanche" type='text' maxlength=255 name='dimanche'/>
    </div>

    <button type="submit" class="btn btn-primary center-block" name="submitCreate" value="Creer Semaine">Creer le Menu de la Semaine</button>

</form>

