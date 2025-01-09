<?php

namespace App\Enums;

enum ProjectPriority: string
{
    case HIGH = 'High';
    case MEDIUM = 'Medium';
    case LOW = 'Low';
    public function value(): string {
        return match($this){
            self::HIGH=>'High',
            self::MEDIUM=>'Medium',
            self::LOW=>'Low'
        };
    }
}