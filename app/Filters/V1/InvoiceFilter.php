<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;
use App\Filter;

class InvoiceFilter extends ApiFilter {
    //what parameters are allowed to be used as query filters
    protected $safeParms = [
        'customerId'=> ['eq'],
        'amount'=>['eq', 'lt', 'lte', 'gt', 'gte'],
        'status'=>['eq', 'ne'],
        'billedDate'=>['eq', 'lt', 'lte', 'gt', 'gte'],
        'payedDate'=>['eq', 'lt', 'lte', 'gt', 'gte']
    ];

    //the rest of the columns are transformed automatically
    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'payedDate' => 'payed_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt'=> '<',
        'lte'=>'<=',
        'gt' => '>',
        'gte'=>'>=',
        'ne'=>'!='
    ];

    //filter example (searches for customers with postalCodes greater than 30000 with types = B:
    //localhost:8000/api/v1/customers?postalCode[gt]=30000&type[eq]=B
}
