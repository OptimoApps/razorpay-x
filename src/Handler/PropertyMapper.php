<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\RazorPayX\Handler;

use JsonMapper\Enums\Visibility;
use JsonMapper\Helpers\TypeHelper;
use JsonMapper\JsonMapperInterface;
use JsonMapper\ValueObjects\PropertyMap;
use JsonMapper\Wrapper\ObjectWrapper;

/**
 * Class PropertyMapper.
 */
class PropertyMapper extends \JsonMapper\Handler\PropertyMapper
{
    /**
     * @throws \Exception
     */
    public function __invoke(
        \stdClass $json,
        ObjectWrapper $object,
        PropertyMap $propertyMap,
        JsonMapperInterface $mapper
    ): void {
        $values = (array) $json;
        foreach ($values as $key => $value) {
            if (! $propertyMap->hasProperty($key)) {
                continue;
            }

            $propertyInfo = $propertyMap->getProperty($key);
            $type = $propertyInfo->getType();

            if ($propertyInfo->isArray()) {
                $value = array_map(function ($value) use ($mapper, $type) {
                    return $this->mapPropertyValue($mapper, $type, $value);
                }, (array) $value);
            } else {
                $value = $this->mapPropertyValue($mapper, $type, $value);
            }

            if ($propertyInfo->getVisibility()->equals(Visibility::PUBLIC())) {
                $object->getObject()->$key = $value;
                continue;
            }

            $setterMethod = 'set'.ucfirst($key);
            if (method_exists($object->getObject(), $setterMethod)) {
                $object->getObject()->$setterMethod($value);
            }
        }
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    private function mapPropertyValue(JsonMapperInterface $mapper, string $type, $value)
    {
        if (TypeHelper::isBuiltinClass($type)) {
            return new $type($value);
        }
        if (TypeHelper::isScalarType($type)) {
            return TypeHelper::cast($value, $type);
        }
        if (TypeHelper::isCustomClass($type)) {
            $instance = new $type();
            $mapper->mapObject($value, $instance);

            return $instance;
        }

        return $value;
    }
}
