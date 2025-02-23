<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\V1\ApiResponses;

class ApiController extends Controller
{
    use ApiResponses;

    public function include( string $relationships ): bool
    {
        $param = request()->query('include');

        if (is_null($param)) {
            return false;
        }

        $includes = explode(',', strtolower($param));

        return in_array(strtolower($relationships), $includes);
    }
}
