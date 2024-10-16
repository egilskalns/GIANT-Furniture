<?php

namespace App\Traits;

trait Filterable
{
    public function scopeFilter($builder, $filters = [])
    {
        if(!$filters) {
            return $builder;
        }
        $tableName = $this->getTable();
        $defaultFillableFields = $this->fillable;

        foreach ($filters as $field => $value) {
            if(!in_array($field, $defaultFillableFields) || !$value) {
                continue;
            }
            if(in_array($field, $this->betweenFilterFields)) {
                $value = explode(',', $value);

                $builder->where($field, '>=', (int) $value[0]);
                $builder->where($field, '<=', (int) $value[1]);
            }
            if(in_array($field, $this->likeFilterFields)) {
                $builder->where($tableName.'.'.$field, 'LIKE', "%$value%");
            }
        }
        return $builder;
    }
}
