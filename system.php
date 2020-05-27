<?php

function actionLog($message) {
    $program = "CENTRALIZER";
    $date = date('Y-m-d h:i:s');

    echo "| " . $program . " | " . $date . " | " . $message . " |" . "\n"; 
}