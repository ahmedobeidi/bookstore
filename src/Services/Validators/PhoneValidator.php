<?php

class PhoneValidator implements ValidationContract
{
    public function validate($value): bool
    {
        // Check if the value is set and is a string
        if (!isset($value) || !is_string($value)) {
            return false;
        }

        // Regular expression for the phone number format
        $pattern = '/^0\d(\s\d\d){4}$/';

        // Check if the value matches the pattern
        return preg_match($pattern, $value);
    }
}
