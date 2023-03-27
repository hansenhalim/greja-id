<?php

namespace App\Enums;

enum TagType: string
{
    case CHURCH_SERVICE = 'church service';
    case PAYMENT_METHOD = 'payment method';
    case TITHE_TYPE = 'tithe type';
    case INVENTORY_TYPE = 'inventory type';
    case INVENTORY_STATUS = 'inventory status';
    case FORM_TYPE = 'form type';
    case FEED_TYPE = 'feed type';
}
