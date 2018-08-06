<?php

namespace App\Transformer;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;


trait TransformerBase
{
    /**
     * @return string
     */
    public static function trasformerClass()
    {
        return "\\" . get_class();
    }

    public static function getItem($itemCollection)
    {
        $class = self::trasformerClass();
    	$resource = new Item($itemCollection, new $class);
    	$fractal = new Manager();

    	return $fractal->createData($resource);
    }

    public static function getCollection($arrayCollection)
    {
        $resource = new Collection($arrayCollection, new AppUserAuthTransformer);
        $fractal = new Manager();

        return $fractal->createData($resource);
    }
}
