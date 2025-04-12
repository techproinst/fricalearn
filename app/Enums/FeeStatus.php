<?php

namespace App\Enums;

enum FeeStatus: int
{
    case PAID = 1;
    case UNPAID = 0;
}
