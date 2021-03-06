<?php
require('../autoloader.php');

/*
 * This script checks for the availability of domain names
 *
 * You can specify multiple domain names to be checked
 */


if ($argc <= 1)
{
    echo "Usage: changepassword <password>\n";
    echo "Please enter new password you want to use\n\n";
    die();
}

$newpassword = $argv[1];

echo "Changing password\n";
try
{
    $conn = new Metaregistrar\EPP\sidnEppConnection();
    $conn->setNewPassword($newpassword);
    // Connect to the EPP server
    if ($conn->connect())
    {
        if (login($conn))
        {
            echo "Password was changed, you are logged-out automatically\n";
        }
    }
}
catch (Metaregistrar\EPP\eppException $e)
{
    echo "ERROR: ".$e->getMessage()."\n\n";
}
