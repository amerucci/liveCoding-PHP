<?php ob_start();?>

 
    <table>
            <thead class="thead-dark ">
                <tr>
                    <th scope="col"><?php echo $whattosearch;?></th>
                    <th scope="col">Personnes hospitalisés</th>
                    <th scope="col">Personnes en réanimation</th>
                    <th scope="col">Nouvelles hospitalisations</th>
                    <th scope="col">Nouvelles réanimations</th>
                    <th scope="col">Personnes décédés</th>
                    <th scope="col">Personnes guéries</th>
                </tr>
            </thead>
        </table>
        <table>
        <tbody>
    <?php

    for ($i = 0; $i < count($datas); $i++) {
        echo '
        <td>' . $datas[$i]['nom'] . '</td>
        <td>' . $datas[$i]['hospitalises'] . '</td>
        <td>' . $datas[$i]['reanimation'] . '</td>
        <td>' . $datas[$i]['nouvellesHospitalisations'] . '</td>
        <td>' . $datas[$i]['nouvellesReanimations'] . '</td>
        <td>' . $datas[$i]['deces'] . '</td>
        <td>' . $datas[$i]['gueris'] . '</td>
     </tr>';
    }

    ?>



    </tbody></table>

    <?php 
$html =  ob_get_clean();
?>