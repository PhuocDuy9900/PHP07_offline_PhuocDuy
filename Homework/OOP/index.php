<!DOCTYPE html>
<html>
<body>
<?php
require_once('abstractClass.php');
$class = new ChildClass;
echo $class->getPrefixName("John Doe");
echo "<br>"; 
echo $class->getPrefixName("Jane Doe");
?>
 
</body>
</html>