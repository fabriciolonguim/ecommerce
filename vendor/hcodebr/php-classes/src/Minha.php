<?php

 namespace Hdoce;

  class Minha extends PDO{

  	try {
    $PDO = new PDO(); // PDO Driver DSN. Throws A PDOException.
}
catch( PDOException $Exception ) {
    // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
    // String.
    throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
}

  }






?>