<?php

/*************************************
 * presence
 * use trim() so empty spaces don't count
 * use === to avoid false positives
 * empty would consider "0" to be empty
 **********************************************/

function has_presence($value)
{
    return isset($value) && $value !== "";
}

/* Checking the length of a string */

function has_max_length($value, $max)
{
    return strlen($value) <= $max;
}

/* Validate password length */
function validate_max_lengths($fields_with_max_lengths)
{
    global $errors;
    // Expects an assoc. array
    foreach ($fields_with_max_lengths as $field => $max) {
        $value = trim($_POST[$field]);
        if (!has_max_length($value, $max)) {
            $errors[$field] = ucfirst($field) . " too long";
        }
    }
}

function validate_presence($required_fields)
{

    global $errors;
    foreach ($required_fields as $field) {
        $value = trim($_POST[$field]);
        if (!has_presence($value)) {
            $errors[$field] = field_name_as_text($field) . " can't be blank";
        }
    }
}

function field_name_as_text($field_name)
{
    $field_name = str_replace("_", " ", $field_name);
    $field_name = ucfirst($field_name);

    return $field_name;
}

/*  Checking if a value is in an array Inclusion in a set */

function has_inclusion_in($value, $set)
{
    return in_array($value, $set);
}

/* Form errors */
function form_errors($errors = array())
{
    $output = "";
    if (!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors. ";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>{$error}</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }

    return $output;
}