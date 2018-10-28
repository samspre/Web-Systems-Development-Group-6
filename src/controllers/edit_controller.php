<?php

include_once "db_connector.php";
$conn = dbConnect();
if(isset($_POST['rcsID']) && isset($_POST['password'])){

    //Removing the user previously inserted
    //TODO: Add more checking to make sure all the fields are filled
    $rin = $_POST['rin'];
    $stmt = $conn->prepare('DELETE * FROM Users WHERE rin= :rin');
    $stmt->bindParam(':rin',$rin);
    $stmt->execute();

    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $rin = $_POST['rin'];
    $rcsID = $_POST['rcsID'];
    $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $conn = dbConnect();
    //Checks to see if there are users in the database with the same rcsID
    $stmt = $conn->prepare('SELECT * FROM Users WHERE rcsID = :rcsID');
    $stmt->bindParam(':rcsID',$rcsID);
    $stmt->execute();
    $duplicate_user = $stmt->fetch();
    if($duplicate_user){
      //Redirects the user to the create account page again and displays an error
      echo "<script type='text/javascript'>alert('That rcsID is unavailable!');</script>";
      exit();
    }
    $stmt = $conn->prepare('INSERT INTO Users (FirstName,LastName,Email,RIN,rcsID,Password)
    VALUES (:firstname,:lastname,:email,:RIN,:rcsID,:Password)');
    $stmt->bindParam(':firstname',$first);
    $stmt->bindParam(':lastname',$last);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':RIN',$rin);
    $stmt->bindParam(':rcsID',$rcsID);
    $stmt->bindParam(':Password',$pass);
    $stmt->execute();
    exit();
}else{
  die("ERROR");
}
?>