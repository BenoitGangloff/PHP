<?php
$firstname=null;
if (!empty ($_POST)) {
    $firstname=$_POST['firstname'];
}
include 'index.phtml';