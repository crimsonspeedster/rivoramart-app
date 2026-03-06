<?php

namespace App;

enum StockStatus : string
{
    case InStock = 'in_stock';
    case OutOfStock = 'out_of_stock';
}
