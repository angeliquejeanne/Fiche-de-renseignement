<?php
 
define('DB_SERVER', 'localhost'); // serveur mysql
define('DB_SERVER_USERNAME', 'root'); // nom d utilisateur
define('DB_SERVER_PASSWORD', ''); // mot de passe
define('DB_DATABASE', 'stage'); // nom de la base
 
// Connexion au serveur mysql
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME,
DB_SERVER_PASSWORD)
or die('Impossible de se connecter : ' . mysql_error());
// sélection de la base de données
mysql_select_db(DB_DATABASE, $connect);
$msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :<br/><br/>";
$msg_ok = "Votre demande a bien été prise en compte.";
$message = $msg_erreur;
if (empty($_POST['civilite']))
$message .= "Votre civilité<br/>";
if (empty($_POST['nom']))
$message .= "Votre nom<br/>";
if (strlen($message) > strlen($msg_erreur)) {
echo $message;
}
else {
foreach($_POST as $index => $valeur) {
$$index = mysql_real_escape_string(trim($valeur));
}
 
$sql = "INSERT INTO formulaire(civilite, nom, prenom, , debutcontrat, societeclient, jourstravailles, joursconges, rtt, dernierentrevue, salaire, status, message)
VALUES ('$civilite','$nom','$prenom','$debutcontrat','$societeclient','$jourstravailles','$joursconges','$rtt','$dernierentrevue','$salaire','$status','$message')";
$res = mysql_query($sql);
if ($res) {
echo $msg_ok;
} else {
echo mysql_error();
}
}
?>