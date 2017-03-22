<?php

function my_autoloader($class) {
  include "class/" . $class . ".class.php";
}

?>
