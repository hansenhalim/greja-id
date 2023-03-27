<?php

namespace App\Enums;

enum FeedStatus: string
{
    case PUBLISHED = 'published';
    case DRAFT = 'draft';
}
