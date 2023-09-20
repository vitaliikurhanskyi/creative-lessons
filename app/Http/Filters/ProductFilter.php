<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const PRICE = 'price';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::PRICE => [$this, 'price'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function price(Builder $builder, $value)
    {
        $builder->where('price', 'like', "%{$value}%");
    }
}
