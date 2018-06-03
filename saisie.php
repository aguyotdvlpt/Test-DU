<?php
require(__DIR__.'/partials/header.php');
?>

<!--  Corps de la page -->

<div class="container pt-5">
    <h2>Evaluation des risques</h2>
</div>

<?php
    $phase = null;
    $danger=null;
    $frequency = null;
    $gravity = null;
    $sac = null;
    //$du = null;

    if(!empty($_POST)) {
        $phase = $_POST['phase'];  
        $danger = $_POST['danger']; 
        $frequency = $_POST['frequency']; 
        $gravity = $_POST['gravity']; 
        $sac = $_POST['sac']; 
    }
?>
    <div class="container">
        <form method="POST" action="">
                <div class="form-group">
                    <label for="phase">Phase de travail réel :</label>
                    <input type="text" name="phase" id="phase" class="form-control" value="<?php $phase; ?>">
                </div>

                <div class="form-group">
                <label for="danger"> Danger :</label>
                <input type='text' id='danger' list="dangers" name='danger'class="form-control" value="<?php echo $danger; ?>">
                <datalist id='dangers'>
                    <select>
                        <option value="Aggression - 1"></option>
                        <option value="Coupure - 2"></option>
                        <option value="TMS - 3"></option>
                        <option value="Vibrations - 4"></option>                        
                    </select>
                </datalist>                        
            </div>

                <div class="form-group">
                    <label for="frequency">Fréquence :</label>
                    <select class="form-control" id="frequency" name="frequency">
                            <option hidden readonly value="">Fréquence d'exposition au danger</option>
                            <option <?php if ($frequency == 1) { echo 'selected'; } ?> value="1">Rarement</option>
                            <option <?php echo ($frequency == 4) ? 'selected': '' ?>value="4">Parfois</option> <!-- condition ternaire -->
                            <option <?php echo ($frequency == 7) ? 'selected': '' ?>value="7">Souvent</option> <!-- condition ternaire -->
                            <option <?php echo ($frequency == 10) ? 'selected': '' ?>value="10">Toujours</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gravity">Gravité :</label>
                    <select class="form-control" id="gravity" name="gravity">
                            <option hidden readonly value="">Gravité de la blessure potentielle</option>
                            <option <?php if ($gravity == 1) { echo 'selected'; } ?> value="1">Blessure légère</option>
                            <option <?php echo ($gravity == 4) ? 'selected': '' ?>value="4">Accident avec AT</option> <!-- condition ternaire -->
                            <option <?php echo ($gravity == 7) ? 'selected': '' ?>value="7">Accident avec IPP <50%</option> <!-- condition ternaire -->
                            <option <?php echo ($gravity == 10) ? 'selected': '' ?>value="10">Accident avec IPP >50% voire Décès</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sac">SAC :</label>
                    <select class="form-control" id="sac" name="sac">
                            <option hidden readonly value="">Impact des mesures de prévention</option>
                            <option <?php if ($sac == 'S') { echo 'selected'; } ?> value="S">Safe</option>
                            <option <?php echo ($sac == 'A') ? 'selected': '' ?>value="A">Alert</option> <!-- condition ternaire -->
                            <option <?php echo ($sac == 'C') ? 'selected': '' ?>value="C">Critical</option> <!-- condition ternaire -->
                    </select>
                </div>

                <input class="btn btn-primary mb-5" type="submit" value="Enregistrer l'analyse du risque">
            </form>
    </div>

    <?php

             
        
        $errors = [];
            
        if (strlen($phase) < 5) {                      
            $errors['phase'] = 'Le nom n\'est pas valide';
        };

        if (!in_array($frequency, [1,4,7,10])) {
            $errors['frenquency'] = 'La fréquence n\'est pas valide';
        };

        if (!in_array($gravity, [1,4,7,10])) {
            $errors['gravity'] = 'La gravité n\'est pas valide';
        }; 
            
        if (!in_array($sac, ['S', 'A','C'])) {
            $errors['sac'] = 'Le SAC n\'est pas valide';
        };

        if (empty($errors)) {

                $query = $db -> prepare('
                    INSERT INTO du (`phase`, danger, frequency, gravity, sac)
                    VALUES (:phase, :danger, :frequency, :gravity, :sac)
                ');
                $query -> bindValue(':phase', $phase, PDO::PARAM_STR);
                $query -> bindValue(':danger', $danger, PDO::PARAM_STR);
                $query -> bindValue(':frequency', $frequency, PDO::PARAM_INT);
                $query -> bindValue(':gravity', $gravity, PDO::PARAM_INT);
                $query -> bindValue(':sac', $sac, PDO::PARAM_STR);
                
                if ($query -> execute()); // On insère la bière dans la BDD
                    echo '<div class="alert alert-success">L\'analyse du risque a bien été prise en compte';
        }

        //var_dump($_POST);
        //var_dump($query);
    ?>              
   