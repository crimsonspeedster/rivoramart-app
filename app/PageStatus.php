<?php

namespace App;

enum PageStatus : string
{
    case Draft = 'draft';
    case Published = 'published';
}
