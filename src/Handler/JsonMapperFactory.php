<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

namespace OptimoApps\RazorPayX\Handler;


use JsonMapper\Cache\ArrayCache;
use JsonMapper\JsonMapper;
use JsonMapper\JsonMapperInterface;
use JsonMapper\Middleware\DocBlockAnnotations;
use JsonMapper\Middleware\NamespaceResolver;
use JsonMapper\Middleware\TypedProperties;

/**
 * Class JsonMapperFactory
 * @package OptimoApps\RazorPayX\Handler
 */
class JsonMapperFactory extends \JsonMapper\JsonMapperFactory
{

    /**
     * @return JsonMapperInterface
     */
    public function bestFit(): JsonMapperInterface
    {
        $mapper = new JsonMapper(new PropertyMapper());

        $mapper->push(new DocBlockAnnotations(new ArrayCache()));

        if (PHP_VERSION_ID >= 70400) {
            $mapper->push(new TypedProperties(new ArrayCache()));
        }

        $mapper->push(new NamespaceResolver());

        return $mapper;
    }
}
