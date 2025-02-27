<?php

namespace App\Http\Filters\V1;

class OrderFilter extends QueryFilter
{
    public function include( $value )
    {
        return $this->builder->with($value);
    }

    public function status( $value )
    {
        return $this->builder->whereIn('status', explode(',', $value));
    }

    public function date( $value )
    {
        $dates = explode(',', $value);
        return count($dates) > 1 
            ? $this->builder->whereBetween('date', $dates)
            : $this->builder->where('date', $value);
    }

    public function name( $value )
    {
        $like_str = str_replace('*', '%', $value);
        return $this->builder->where('name', 'like', $like_str);
    }

    public function description( $value )
    {
        $like_str = str_replace('*', '%', $value);
        return $this->builder->where('description', 'like', $like_str);
    }

    public function sortByDesc( $value )
    {
        return $this->builder->orderBy($value, 'desc');
    }

    public function sortByAsc( $value )
    {
        return $this->builder->orderBy($value, 'asc');
    }

    public function limit( $value )
    {
        return $this->builder->limit($value);
    }

    public function offset( $value )
    {
        return $this->builder->offset($value);
    }

}