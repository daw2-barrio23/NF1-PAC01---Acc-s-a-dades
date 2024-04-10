<?php

require("class.pdofactory.php");
print "Running ...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

    // begin the transaction
    $objPDO->beginTransaction();

    $strQuery1 = "INSERT INTO system_user (id, first_name, last_name, email_address) VALUES (73, 'Nico5', 'Barrio5', 'nico5@example.com')";
    print "insert 1 hecho";
    $strQuery2 = "INSERT INTO system_user (id, first_name, last_name, email_address) VALUES (72, 'Nico4', 'Barrio2', 'nico2@example.com')";

    $objPDO->exec($strQuery1);
    $objPDO->exec($strQuery2);

    // commit the transaction
    $objPDO->commit();

} catch (Exception $e) {

    // rollback the transaction
    $objPDO->rollBack();
    echo "Failed: ".$e->getMessage();
}
?>
