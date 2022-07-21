<?php

use Delta4op\MongoODM\DocumentManagers\DocumentManager;
use Delta4op\MongoODM\DocumentManagers\TransactionalDocumentManager;

if (! function_exists('dm')) {
    /**
     * Shortcut to get document manager
     *
     * @return DocumentManager
     */
    function dm(): DocumentManager
    {
        return app('DocumentManager');
    }
}

if (! function_exists('tdm')) {
    /**
     * Shortcut to get document manager
     *
     * @return TransactionalDocumentManager
     */
    function tdm(): TransactionalDocumentManager
    {
        return app('TransactionalDocumentManager');
    }
}
