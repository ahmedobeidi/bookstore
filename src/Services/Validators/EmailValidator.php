<?php

class EmailValidator implements ValidationContract
{
    public function validate($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}