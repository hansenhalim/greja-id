<?php

namespace App\Enums;

enum FeedStatus: string
{
    case PUBLIC = 'public';
    case PRIVATE = 'private';
}
