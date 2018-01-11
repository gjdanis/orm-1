<?php

declare(strict_types=1);

namespace Doctrine\ORM\Tools\Event;

use Doctrine\Common\EventArgs;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Event Args used for the Events::postGenerateSchema event.
 */
class GenerateSchemaEventArgs extends EventArgs
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;

    /**
     * @var \Doctrine\DBAL\Schema\Schema
     */
    private $schema;

    public function __construct(EntityManagerInterface $em, Schema $schema)
    {
        $this->em     = $em;
        $this->schema = $schema;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * @return Schema
     */
    public function getSchema()
    {
        return $this->schema;
    }
}
