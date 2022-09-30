<?php

namespace App\Models\Enums;

enum UserRole:int{
    case REGULAR=0;
    case AUTHOR=1;
    case ADMIN=2;
}
