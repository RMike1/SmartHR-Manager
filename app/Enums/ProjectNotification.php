<?php

namespace App\Enums;
enum ProjectNotification: string
{
    case ALL='all';
    case TEAMLEADERS='email';
    case EMPLOYEES='employees';
    public function value(): string
    {
        return match($this){
            self::ALL=>'all',
            self::TEAMLEADERS=>'email',
            self::EMPLOYEES=>'employees',
        };
    }
}
