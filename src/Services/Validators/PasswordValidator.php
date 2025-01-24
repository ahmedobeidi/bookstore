<?php

class PasswordValidator implements ValidationContract
{
    public function validate($value): bool
    {
        // Check if the value is set and is a string
        if (!isset($value) || !is_string($value)) {
            return false;
        }

        // Check if the password meets the criteria
        $hasMinLength = strlen($value) >= 8;
        $hasUppercase = preg_match('/[A-Z]/', $value);
        $hasLowercase = preg_match('/[a-z]/', $value);
        $hasDigit = preg_match('/\d/', $value);

        return $hasMinLength && $hasUppercase && $hasLowercase && $hasDigit;
    }
}
