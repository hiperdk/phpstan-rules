<?php

namespace Test\Domain\Repositories;

use Test\Application\Service\ApplicationClassThatAccessDomain;

class RepositoryClassThatAccessApplication {
    public function __construct(ApplicationClassThatAccessDomain $_) {

    }
}
