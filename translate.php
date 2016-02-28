<?php

/* Include the GoogleTranslate class */
require_once("GT_class.php");

/* Grab the text and language prefs from POST data */
if (array_key_exists("search", $_POST)) {
    $text   = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
    $source   = filter_input(INPUT_POST, 'source', FILTER_SANITIZE_SPECIAL_CHARS);
    $target   = filter_input(INPUT_POST, 'target', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    echo "Something went wrong";
}

/* Must have API key from Google.  It can go here or, optionally hidden inside the GoogleTranslate Class */
$api_key = 'AIzaSyBR4iPz1XOeD9MmY4dJYxTKYMdRKkfG8Rk';

/* Set the class object and execute the translate request */
$obj = new GoogleTranslate($api_key);
$result = $obj->translate($text, $source, $target);

/* Return the result to the view via Ajax */
print_r($result);

?>