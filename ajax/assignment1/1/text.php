<?php
if (isset($_POST['newtext'])) {
    $newtex = $_POST['newtext'];
    echo $newtex;

} else {
    echo "error: no data received.";
}