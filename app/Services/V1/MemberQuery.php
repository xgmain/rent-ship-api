<?php 

namespace App\Services\V1;

use App\Services\ApiQuery;

class MemberQuery extends ApiQuery{
    protected $safeParms = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postal_code' => ['eq', 'gt', 'lt']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '=<',
        'gt' => '>',
        'gte' => '>=',
    ];
}
