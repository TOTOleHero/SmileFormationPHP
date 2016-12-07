<?php
require '../lib/checksession.lib.php';
require '../lib/planning-data.lib.php';

if (isConnected() === FALSE)
{
    // redirect to login.php
}
else
{
    // send data to showPlanning.html
    getData();
}