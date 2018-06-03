<?php
require(__DIR__.'/partials/header.php');


$query = $db->query('SELECT * FROM du');

$dus = $query->fetchAll();


?>

<div class="pt-5 mx-5">
        <h1 class="text-center mb-5">Etat de sortie de l'analyse des risques !</h1>
        <div class="row">
            
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Phase de travail</th>
                        <th scope="col">Danger</th>
                        <th scope="col">Fréquence</th>
                        <th scope="col">Gravité</th>
                        <th scope="col">Risque</th>
                        <th scope="col">Moyens de prévention</th>
                        <th scope="col">SAC</th>
                    </tr>
                </thead>

                <tbody>
            <?php 
            foreach($dus as $du) { ?>    
                    <tr>
                        <th scope="row"> <?php echo $du['id'] ?></th>
                        <td><?php echo $du['phase'] ?></td>
                        <td><?php echo $du['danger'] ?></td>
                        <td><?php echo $du['frequency'] ?></td>
                        <td><?php echo $du['gravity'] ?></td>
                        <td></td>
                        <td>rien pour le moment</td>
                        <td><?php echo $du['sac'] ?></td>
                    </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>


                