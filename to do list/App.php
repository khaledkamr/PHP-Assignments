<?php

require_once "classes/Request.php";
require_once "classes/Session.php";
require_once "classes/validation/Validator.php";
require_once "classes/validation/Required.php";
require_once "classes/validation/Str.php";
require_once "classes/validation/Validation.php";

use classes\Request;
use classes\Session;
use classes\validation\Required;
use classes\validation\Str;
use classes\validation\Validation;

$req = new Request;
$ses = new Session;
$val = new Validation;

