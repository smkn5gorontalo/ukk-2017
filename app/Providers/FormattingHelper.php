<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormattingHelper extends ServiceProvider
{
    public static function dimas(){
        return 'dimas adalah seorang programmer dengan kegantengan yang warbyazzzaahh!';
    }

    public static function sum(){
        $a  =   [1,2,3];
        return array_sum($a);
    }
}
