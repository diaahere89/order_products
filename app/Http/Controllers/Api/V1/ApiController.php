<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\V1\ApiResponses;
use Illuminate\Support\Facades\Gate;

class ApiController extends Controller
{
    use ApiResponses;

    protected $policyClass;

    public function include( string $relationships ): bool
    {
        $param = request()->query('include');

        if (is_null($param)) {
            return false;
        }

        $includes = explode(',', strtolower($param));

        return in_array(strtolower($relationships), $includes);
    }

    public function isAble( $ability, $model )
    {
        return Gate::authorize( $ability, [ $model, $this->policyClass, ] );
    }

}
