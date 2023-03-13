<?php
if(isset($_POST["country"])){
    // Capture selected country
    $country = $_POST["country"];
     
    // Define country and city array
    $countryArr = array(
                    "usa" => array("New Yourk", "Los Angeles", "California","Texus","Ohio"),
                    "india" => array("Maharashtra", "New Delhi", "Gujarat","Rajasthan","Uttar Pradesh"),
                    "uk" => array("London", "Manchester", "Liverpool","Scotland","Wales"),
                    "pak"=> array("Balochistan","Gilgit-Baltistan","Punjab","Sindh","Khyber Pakhtunkhwa"),
                    "chin"=> array("Anhui", "Fujian", "Gansu", "Guangdong", "Guizhou")
                );
     
    // Display city dropdown based on country name
    if($country !== 'Select'){
        echo "<label>City:</label>";
        echo "<select>";
        foreach($countryArr[$country] as $value){
            echo "<option>". $value . "</option>";
        }
        echo "</select>";
    } 
}
?>