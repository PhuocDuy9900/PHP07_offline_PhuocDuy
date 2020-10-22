<?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
if (!session_destroy()) {
    echo "Failed to log out";
}
else {
    echo "Logged out successfully";
}
