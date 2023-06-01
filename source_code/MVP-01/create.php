<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");
include("view/CreatePasien.php");


$tp = new CreatePasien();

if (isset($_GET['add'])) {
    $tp->create($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tp->tampilForm(); 
} else if (isset($_GET['update'])) {
    $tp->update($_POST);
}else {
    $data = $tp->tampilForm();
}