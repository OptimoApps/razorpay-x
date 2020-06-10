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
declare(strict_types=1);

namespace OptimoApps\RazorPayX\Entity;

/**
 * Class ContactCollection
 * @package OptimoApps\RazorPayX\Entity
 */
class ContactCollection
{
    /**
     * @var string
     */
    public string $entity;

    /**
     * @var int
     */
    public int $count;
    /**
     * @var Contact[]
     */
    public $items;
}
