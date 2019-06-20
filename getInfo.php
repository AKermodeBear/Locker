<?php
include_once("../../../db_connect.php");

$result = $conn->query("SELECT users.tornuserkey FROM users WHERE tornuserkey <> 'testkey'");

if($result === false) {
    user_error("Query failed: ".$conn->error."\n$query");
    return false;}
else {
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
       $apikey = $row['tornuserkey'];
       $jsonurl = "https://api.torn.com/user/?selections=timestamp,networth,bazaar,display,inventory,hof,travel,education,medals,honors,notifications,personalstats,workstats,crimes,icons,cooldowns,money,perks,battlestats,bars,profile,basic,stocks,properties,jobpoints,merits,refills,discord,gym&key=" . $apikey;
       $json = file_get_contents($jsonurl);
       $data = json_decode($json, true);

       //if ($data['error']) {echo 'Error';}
       //else{
            //if ($data['timestamp']) {
                $sql = "insert into current_data VALUES ('" . $data['player_id'] . "','" . $data['name'] . "','" . $data['energy']['current'] . "/" . $data['energy']['maximum'] . "','" . $data['cooldowns']['drug'] . "','" . $data['cooldowns']['booster'] . "','" . $data['refills']['energy_refill_used'] . "','" . $data['refills']['nerve_refill_used'] . "')";
                //$conn->query("INSERT INTO current_data VALUES ('".$data['player_id']."', '".$data['name']."', '".$data['energy']['current']."/".$data['energy']['maximum']."', '".$data['cooldowns']['drug']."', '".$data['cooldowns']['booster']."', '".$data['refills']['energy_refill_used']."', '".$data['refills']['nerve_refill_used']."')");
                $conn->query($sql);
            //}
       //}
      }
    }
 }


header("Location: faction.php");
?>
