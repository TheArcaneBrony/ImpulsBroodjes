<!doctype html5>
<html>
<body>

<?php
$servername = 'thearcanebrony.net';
$username = 'username';
$password = 'password';
$dbname = 'impulsbroodjes';

//create conection
$conn = new mysqli ($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

//data uit de databank kiezen
$sql = "SELECT users.user_firstname, users.user_lastname, broodjes.broodje_name, broodjes.broodje_prijs, orders.aantal
 FROM impulsbroodjes.users 
 inner join impulsbroodjes.orders ON users.user_id = orders.user_id
 inner join impulsbroodjes.broodjes ON orders.broodje_id = broodjes.broodje_id";

$result = $conn -> $query($sql);

//toon resultaat
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        echo "<table>
        <tr> <td> Voornaam </td><td> Achternaam </td> <td> Broodje </td> <td> Prijs </td> <td> Aantal </td> </tr>
        <tr> <td> " . $row["user_firstname"] . " </td> <td> " . $row["user_lastname"] . " </td> <td> " . $row["broodje_name"] . "</td>
        <td> " . $row["broodje_prijs"] . "</td> <td>" . $row["aantal"] . "</td> </tr>
        </table>";
    }
}
else {
    echo "0 results";
  }
  $conn->close();
  ?>

</body>
</html>