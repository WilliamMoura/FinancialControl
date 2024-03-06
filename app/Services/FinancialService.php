<?php
declare(strict_types = 1);

namespace App\Services;

use App\Models\Financial;

class FinancialService extends ServiceBase
{
    public function __construct(Financial $financial)
    {
        parent::__construct($financial);
    }
}
