<?php

namespace Doctrine\Tests\ORM\Query;

use DateTimeImmutable;
use Doctrine\ORM\Query\ParameterTypeInferer;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\Type;
use Doctrine\Tests\OrmTestCase;
use PDO;

class ParameterTypeInfererTest extends OrmTestCase
{

    public function providerParameterTypeInferer()
    {
        $data = [
            [1,                 Type::INTEGER],
            ["bar",             PDO::PARAM_STR],
            ["1",               PDO::PARAM_STR],
            [new \DateTime,     Type::DATETIME],
            [new DateTimeImmutable(), Type::DATETIME_IMMUTABLE],
            [new \DateInterval('P1D'), Type::DATEINTERVAL],
            [[2],          Connection::PARAM_INT_ARRAY],
            [["foo"],      Connection::PARAM_STR_ARRAY],
            [["1","2"],    Connection::PARAM_STR_ARRAY],
            [[],           Connection::PARAM_STR_ARRAY],
            [true,              Type::BOOLEAN],
        ];

        return $data;
    }

    /**
     * @dataProvider providerParameterTypeInferer
     */

    public function testParameterTypeInferer($value, $expected)
    {
        $this->assertEquals($expected, ParameterTypeInferer::inferType($value));
    }
}
