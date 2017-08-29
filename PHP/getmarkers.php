<?php
include('dbconnect.php');

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendchild($node);

//select everything from portmarkers
$query = "SELECT * FROM port_markers WHERE 1";
$result = $db->query($query);
if(!$result) {

  die('Nothing in result: ');

}

//mime type
header("Content-type: text/xml");

//loop
while ($row = $result->fetch_array()) {
  $node = $dom->createElement("markers");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['type']);
  $newnode->setAttribute("description", $row['description']);

}

$result->close();
$db->close();

echo $dom->saveXML();

die();
