<?php
require("config.php");

switch($language) {
    case "de_DE":
        require("languages/de_DE.php");
    case "en_EN":
        require("languages/en_EN.php");
    default:
        require("languages/de_DE.php");
}
?>