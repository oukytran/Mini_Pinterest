<?php
if(isset($_POST['submit']) && isset($_FILES['file'])){
    include "connexionBD.php";
    echo "<pre>";
    print_r($_FILES['file']);
    echo "</pre>";


    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $desc = $_POST["desc"];
     $cat = $_POST["cat"];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedExt = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowedExt)) {
        if($fileError === 0) {
            if($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $destination_path = getcwd().DIRECTORY_SEPARATOR."data/";//'data/'.$fileNameNew;
                $target_path = $destination_path . basename($_FILES["file"]["name"]);
                @move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                //move_uploaded_file($_FILES[$fileNameNew][$fileTmpName], $fileDestination.$fileNameNew);
                header("Location: accueil.php?uploadsuccess");

                // Insert into Database
                $sql = "INSERT INTO Photo (nomFich,description,catId) VALUES($_FILES["file"]["name"],$desc,$cat)";
                mysqli_query($conn, $sql);
                echo "reussi";
            } else {
                echo "file too big";
                header("Location: accueil.php?error");
            }
        } else {
            echo "Error";
            header("Location: accueil.php?error");
        }
    } else {
        echo "You cannot upload files of this type";
        header("Location: accueil.php?error");
    }
}
?>