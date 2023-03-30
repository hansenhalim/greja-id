<?php

namespace App\Enums;

enum VideoSource: string
{
    case LOCAL = 'local';
    case YOUTUBE = 'youtube';
    case URL = 'url';
}
