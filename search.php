<?php
    include("connessione.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH ATTORI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $num = $_GET["num"];

        if ($num >=1) {
            $sql = "SELECT a.CodAttore, a.Nome from attori as a ORDER BY a.Nome ASC LIMIT $num";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
               
            }
        } else {
            print("errore");
        }

        function showData($n, $res){
            echo "<div class='divShowData'>";
                echo "<h1 class='correct'>$n ATTORI TROVATI</h1>";
                $a = 1;
                while ($row = $res->fetch_assoc()) {
                    $codAttore = $row["CodAttore"];
                    $nome = $row["Nome"];

                    echo "<h3>ATTORE $a</h3>";
                    echo "<p><b>CodAttore: </b>" . $codAttore . "</p>";
                    echo "<p><b>Nome: </b>" . $nome . "</p>";
                        $sql2 = "SELECT COUNT(r.CodFilm) as numFilmFatti FROM recita as r LEFT JOIN attori as a ON r.CodAttore = a.CodAttore WHERE a.CodAttore = $codAttore";
                        $res2 = $conn->query($sql2);
                            if ($res2->num_rows > 0) {  
                                var_dump($res2);
                            } else {
                                echo "<p class='error'>L'attore non ha fatto film</p>"; 
                            }
                    echo " <p>-------------------------------</p>";
                    $a++;
                }
                    
                    
            echo "</div>";
        }
        
       
       
    ?>
</body>
</html>