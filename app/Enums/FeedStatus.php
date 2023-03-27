<?php

namespace App\Enums;

enum FeedStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
}
