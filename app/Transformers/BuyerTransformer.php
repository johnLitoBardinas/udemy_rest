<?php

namespace App\Transformers;

use App\Buyer;
use League\Fractal\TransformerAbstract;

class BuyerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Buyer $buyer)
    {
       return [
            'identifier'    => (int)$buyer->id,
            'name'          => (string)$buyer->name,
            'email'         => (string)$buyer->email,
            'isVerified'    => (int)$buyer->verified,
            'creationDate'  => (string)$buyer->created_at,
            'lastChange'    => (string)$buyer->updated_at,
            'deletedDate'   => isset($buyer->deleted_at) ? (string)$buyer->deleted_at : null,
        ];
    }

    /*
        3:53 PM 01-31-2019
        Mapping the original value from fractal name into the model property name
    */
    public static function originalAttribute($index)
    {
        $attributes = [
            'identifier'    => 'id',
            'name'          => 'name',
            'email'         => 'email',
            'isVerified'    => 'verified',
            'creationDate'  => 'created_at',
            'lastChange'    => 'updated_at',
            'deletedDate'   => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
