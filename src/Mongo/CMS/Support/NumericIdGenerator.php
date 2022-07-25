<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Support;

use Delta4op\Mongodb\Documents\Document;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Counter\Counter;

class NumericIdGenerator
{
    public static function generateNewId(Document $document)
    {
        $metadata = get_class($document)::getManager()->getClassMetadata(get_class($document));

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
