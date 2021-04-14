<?php

namespace App\Controllers;

use Respect\Validation\Validator as v;

class Validation
{
    public function id(string $id): string
    {
        $refactoredId = str_replace('-', '', $id);
        $error = '';
        if($refactoredId === ''){
            $error = 'filled';
        }else if(!v::number()->validate($refactoredId)) {
            $error = 'numerical';
        }else if(!v::max(11)->validate(strlen($refactoredId))){
            $error = '11 numbers long';
        }else if(!v::min(11)->validate(strlen($refactoredId))){
            $error = '11 numbers long';
        }
           if($error !== ''){
               return "must be: " . $error;
           }else{
               return '';
           }
    }

    public function oneWord(string $word): string
    {
        $error = '';
        if($word === ''){
            $error = "filled";
        }
        else if(!v::regex("/^\w+/")->validate($word))
        {
            $error =  "valid characters";
        }
        if($error !== ''){
            return "must be: " . $error;
        }else{
            return '';
        }
    }

    public function age(int $age): string
    {
        $error = '';
        if($age === ''){
            $error = 'filled';
        }else if(!v::intType()->validate($age)) {
            $error = 'numerical';
        }
        if($error !== ''){
            return "must be: " . $error;
        }else{
            return '';
        }
    }


}