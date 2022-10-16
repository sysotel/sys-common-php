<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Support;

use Delta4op\Mongodb\Documents\Document;
use SYSOTEL\APP\Common\Mongo\CMS\Documents\Counter\Counter;

class NumericIdGenerator
{
    public static function get(Document $document)
    {
        $metadata = get_class($document)::manager()->getClassMetadata(get_class($document));

        /** @var null|Counter $counter */
        $counter = Counter::queryBuilder()->findAndUpdate()->returnNew()
            ->field('_id')->equals($metadata->collection)
            ->field('value')->inc(1)
            ->getQuery()->execute();

        if (! $counter){
            abort(500, 'Counter not found for ' . $metadata->collection);
        }

        return $counter->getValue();
    }
}
