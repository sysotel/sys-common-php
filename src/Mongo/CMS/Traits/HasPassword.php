<?php

namespace SYSOTEL\APP\Common\Mongo\CMS\Traits;

trait HasPassword
{
    /**
     * @var ?Password
     * @ODM\EmbedOne (targetDocument=SYSOTEL\APP\Common\Mongo\CMS\Documents\common\Password::class)
     */
    public $password;

    /**
     * Sets hashed password
     *
     * @param string $password
     * @return string
     * @author Ravish
     */
    public function setPassword(string $password): string
    {
        return $this->password = (new Password())->setPassword($password);
    }

    /**
     * Sets hashed password
     *
     * @param string $password
     * @return bool
     * @author Ravish
     */
    public function validatePassword(string $password): bool
    {
        return $this->password->validate($password);
    }
}
