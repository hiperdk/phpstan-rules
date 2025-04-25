<?php

namespace Test\Domain\Service;

use Test\Domain\Repositories\RepositoryClassThatAccessDomain;

class ServiceClassThatAccessRepository {
    public function __construct(RepositoryClassThatAccessDomain $_) {

    }
}
