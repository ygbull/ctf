<?php
$correctFlag = trim(shell_exec('cat /etc/flag'));

$userFlag = $_POST['flagInput'] ?? '';

if ($userFlag === $correctFlag) {
    echo "Correct flag!";
} else {
    echo "Incorrect flag, try again.";
}
