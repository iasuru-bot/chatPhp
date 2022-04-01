<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <?php
        function Nbpremier($guess){


            for ($i=2;$i<=sqrt($guess);$i++){
                if($guess%$i==0)
                    return false;

            }
            if ($guess==1){return false;}
            return true;
        }







        $largeur=10;
        $nombre=100;

        for($i=1;$i<=$nombre;$i++){
            echo "<td>";
            echo Nbpremier($i)?"<b style='color:orchid'>$i</b>":$i;
            echo "</td>";
            if ($i%$largeur==0) echo "</tr><tr>";
        }
        ?>
    </tr>
</table>
</body>
</html>
