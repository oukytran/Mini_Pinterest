<?php 

require_once 'connexionBD';
    $id = $_GET['id'];
    if($id == '1') {

        query="SELECT * FROM Photo WHERE catId='1' ";
    }

    else if ($id == '2') {
        query="SELECT * FROM Photo WHERE catId='2' ";
    }
    else {
        query="SELECT * FROM Photo";
    }

    $sql = mysqli_query($conn, $query)
    while($row=mysqli_fetch_array($sql))
    {
        echo $row["<img width=\"200px\" height=\"150px\" src= \"data/" . $photo['nomFich'] . " \"> "]
    }

?>

<?php

/* cette fonction prend en entrée une categorie et renvoie un tableau contenant les informations sur les images correspondants 
à la catégorie passé en paramètre. On appel cette fonction lorsque l'utilisateur n'est pas connecté */
function tabQueryPhotoDisconnected($link, $categorie)
{
    if ($categorie == 'tout')
        $query = "SELECT p.* FROM Photo p JOIN Utilisateur u ON p.pseudo = u.pseudo WHERE u.statut = 'administrateur' AND p.etat = 'show';";
    else
        $query = "SELECT p.* FROM Utilisateur u JOIN Photo p ON u.pseudo = p.pseudo JOIN Categorie c ON p.catId = c.catId WHERE u.statut = 'administrateur' AND c.nomCat = '" . $categorie . "' AND p.etat = 'show';";
    $result =  executeQuery($link, $query);
    $tab = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($tab, $row);
    }
    return $tab;
}
?>