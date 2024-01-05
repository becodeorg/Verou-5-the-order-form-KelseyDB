<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

$products = [
    ['name' => 'WoW Gold', 'price' => 0.41],
    ['name' => 'Amirdrassil Heroic', 'price' => 151.98],
    ['name' => 'Keystone Heroic Bundle', 'price' => 218.99],
    ['name' => 'PVP Reroll plus Elite Set', 'price' => 114.99],
    ['name' => 'Epic Conquest Bundle', 'price' => 264.98],
    ['name' => 'Gear Boost', 'price' => 20.69],
    ['name' => 'BiS Gear', 'price' => 193.49],
    ['name' => 'Holiday Spectral Mount Deal', 'price' => 6599.99],
    ['name' => 'Festive TCG Trio Offer', 'price' => 600.00],
];

$totalValue = 0;

function validate()
{
    // TODO: This function will send a list of invalid fields back
    $invalidFields = [];
    if(!isset($_POST["products"])){
      $invalidFields["products"] = "Select a product";
    }
    if(empty($_POST["zipcode"])){
      $invalidFields["zipcode"] = "Zipcode can't be empty"
    } elseif(!is_numeric($_POST["zipcode"])) {
      $invalidFields["zipcode"] = "Zipcode can only contain numbers"
    if(empty($_POST["email"])){
      $invalidFields["email"] = "Email can't be empty";
    }
    elseif(!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL)){
      $invalidFields["email"] = "Please use a valid email";
    }
    if(empty($_POST["street"])){
      $invalidFields["street"] = "street is required";
    }
    if(empty($_POST["streetnumber"])){
      $invalidFields["streetnumber"] = "street number is required"
    }
    return $invalidFields;
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
      echo '<div class="alert alert-danger">';
      echo "<strong>Errors found:</strong><br>" . implode("<br>", $invalidFields);
      echo '</div>';
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check for the form to be submitted
$formSubmitted = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    handleForm();
}

require 'form-view.php';