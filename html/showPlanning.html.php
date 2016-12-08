<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Smile - Planning de formation.</title>
        <style>
            table
            {
                border:1px solid black;
            }
            table td
            {
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <?php include __DIR__ . '/userName.part.html.php' ?>
        <a href="/src/Accueil.php">Accueil</a>

        <table>

            <tr>
                <th>Date</th>
                <th>Cours</th>
                <th>Formateur</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($outputData as $outputLine) : ?>
                <tr>
                    <td><?php echo $outputLine['date'] ?></td>
                    <td><?php echo $outputLine['label'] ?></td>
                    <td><?php
                        if (empty($outputLine['teacher'])) {
                            echo "Non renseigne";
                        } else {
                            echo $outputLine['teacher'];
                        }
                        ?>
                    </td>

                    <td>
                        <?php
                        // si role Admin afficher cette partie
                        if ($admin) {
                            $lineDate = $outputLine['date'];
                            $label = $outputLine['label'];
                            If (empty($outputLine['teacher'])) {
                                $teacher = "Non renseigne";
                            } else {
                                $teacher = $outputLine['teacher'];
                            }

                            include 'modifDeletePlanningForm.html';
                        }
                        ?>   
                    </td>


                <?php endforeach ?>


        </table>
        <?php
        // si role Admin afficher cette partie
        if ($admin) {
            include 'createPlanningForm.html';
        }
        ?>

    </body>
</html>