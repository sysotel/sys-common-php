<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\StorageStrategies;

use Doctrine\ODM\MongoDB\DocumentManager as BaseDocumentManager;
use Doctrine\ODM\MongoDB\Id\IdGenerator;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Counter\Counter;

class AutoIncrementID implements IdGenerator
{
    public function generate(BaseDocumentManager $dm, object $document)
    {
        $documentClass = get_class($document);
        $metadata = get_class($documentClass)::getManager()->getClassMetadata($documentClass);

        if(!isset($metadata, $metadata->collection)) {
            abort(500,'Failed to find collection name');
        }

        $counter = Counter::queryBuilder()->findAndUpdate()->returnNew()
            ->field('_id')->equals($metadata->collection)
            ->field('value')->inc(1)
            ->getQuery()->execute();

        if (! $counter){
            abort(500, 'Counter not found for ' . $metadata->collection);
        }

        return $counter->value;
    }
}
