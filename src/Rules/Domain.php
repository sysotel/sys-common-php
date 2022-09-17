<?php

namespace SYSOTEL\APP\Common\Rules;

class Domain extends RegexRule
{
    /**
     * Regex pattern
     *
     * @return string
     */
    public function pattern(): string
    {
        return '/^([a-zA-Z0-9][a-zA-Z0-9-_]*\.)*[a-zA-Z0-9]*[a-zA-Z0-9-_]*[[a-zA-Z0-9]+$/';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Invalid domain';
    }
}
