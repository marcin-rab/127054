<?php  
$connect = mysqli_connect("localhost", "id5881270_ai127054", "admin", "id5881270_pokemony");

$input = filter_input_array(INPUT_POST);

$Nazwa = mysqli_real_escape_string($connect, $input["Nazwa"]);
$Typ_podstawowy = mysqli_real_escape_string($connect, $input["Typ_podstawowy"]);
$Typ_dodatkowy = mysqli_real_escape_string($connect, $input["Typ_dodatkowy"]);
$Zycie = mysqli_real_escape_string($connect, $input["Zycie"]);
if($input["action"] === 'edit')
{
 $query = "
 UPDATE Pokemony 
 SET Nazwa = '".$Nazwa."', 
 Typ_podstawowy = '".$Typ_podstawowy."',
 Typ_dodatkowy = '".$Typ_dodatkowy."',
  Zycie = '".$Zycie."' 
 WHERE ID = '".$input["ID"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM Pokemony 
 WHERE ID = '".$input["ID"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>
