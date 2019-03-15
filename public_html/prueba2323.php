<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<br> First Name = <br> ";

if(isset($_POST["first_name"]))
{
    echo $_POST["first_name"];
}

echo "<br> last_name = <br> ";

if(isset($_POST["last_name"]))
{
    echo $_POST["last_name"];
}