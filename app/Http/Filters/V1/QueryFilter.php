<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $builder;

    public function __construct( 
        protected Request $request 
    ) {}

    protected function filter( array $filters )
    {
        foreach ($filters as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func([$this, $name], $value);
            }
        }

        return $this->builder;
    }
    
    public function apply( Builder $builder )
    {
        $this->builder = $builder;
        
        foreach ($this->request->all() as $name => $value) {
            if (method_exists($this, $name)) {
                //$this->$name($value);
                call_user_func([$this, $name], $value);
            }
        }
        
        return $this->builder;
    }
}