<?php

namespace Middle\SendEmail\Validation;

use Exception;

class CheckField
{
    /**
     *  email validate
     */
    public function getEmailValidate($emailField)
    {
        if (filter_var($emailField, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            throw new Exception('Invalid email address!');
        }
    }

    /**
     * textarea validation
     */
    public function getTextAreaValidate($textArea)
    {
        if (strlen($textArea) < 501) {
            return true;
        } else {
            throw new Exception('The letter can`t be longer than 500 symbols!');
        }
    }

    /**
     * url image validate
     */
    public function getImageType($urlImage)
    {
        if(getimagesize($urlImage)){
            return true;
        } else {
            throw new Exception('The link is not a picture!');
        }
    }
}
