<?php

namespace App\Services;

class Constant
{
    public const TEMPLATE_PATH_HOUSEHOLD = 'docx/household_temp.docx';

    public static function getPositions()
    {
        return [
            'Brgy-Chairman',
            'Brgy-Secretary',
            'Brgy-Treasurer',
            'Brgy-Kagawad',
            'Sk-Chairperson',
            'Sk-Secretary',
            'Sk-Treasurer',
            'Sk-Kagawad',
        ];
    }

    public static function getOtherPositions()
    {
        return [
            'Appropriation',
            'BAC Chairman',
            'Vice BAC Chairman',
            'BMO',
        ];
    }
}
