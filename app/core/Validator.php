<?php
namespace App\Core;
class Validator 
{    
    public static function validate($data, $rules) 
    {
        $errors = [];
        foreach ($rules as $field => $rule) 
        {
            if ($rule === 'required' && empty($data[$field])) 
            {
                $errors[$field] = "$field is required";
            }
        }
        return $errors;
    }
}