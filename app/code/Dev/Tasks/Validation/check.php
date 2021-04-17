<?php

namespace Dev\Tasks\Validation;

use Exception;

class check
{
    public function check_field($field)
    {
        if(preg_match('/^[a-z]{0,3}$/', $field)) {
            throw new Exception('The length title minimum 4 symbol! Please enter correct title.');
        }
    }
}
