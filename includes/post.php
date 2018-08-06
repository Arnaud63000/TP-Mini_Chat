<div id="refresh">
<?php

    
    include 'connect.php';

    $req = $bdd->query('SELECT m.*, u.color FROM minichat m LEFT OUTER JOIN users u on m.pseudo = u.pseudo ORDER BY id DESC LIMIT 0, 10');
  

    while($donnees = $req->fetch()){
        
        echo  $donnees['date'] . ' : ' . '<strong style="color:' .$donnees["color"].'">' . htmlspecialchars($donnees['pseudo']) . '</strong>' . ':' . htmlspecialchars($donnees['message']) . '<br>' . '<hr>'; 
    }

    $req->closeCursor();

    

?>
<div>