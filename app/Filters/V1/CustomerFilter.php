<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;
use App\Filter;

class CustomerFilter extends ApiFilter {
    //what parameters are allowed to be used as query filters
    protected $safeParms = [
        //eq = equals, gt = greater than, ls= lesser than
        //only postalCode allows for anything other than eq
        'name'=> ['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'postalCode'=> ['eq', 'gt','lt']
    ];
    protected $columnMap = [
        'postalCode' => 'postal_code'];

    protected $operatorMap = [
        'eq' => '=',
        'lt'=> '<',
        'lte'=>'<=',
        'gt' => '>',
        'gte'=>'>='

        //gte = greater or equals, lte = lesser than or equals
    ];
}
