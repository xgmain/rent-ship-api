<?php 

namespace App\Services\V1;

use App\Services\ApiQuery;

class ShipQuery extends ApiQuery{
    protected $safeParms = [
        'owner_id' => ['eq', 'gt', 'lt']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '=<',
        'gt' => '>',
        'gte' => '>=',
    ];
}
