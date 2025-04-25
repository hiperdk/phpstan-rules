<?php

namespace Test\Domain\Repositories;

use Test\Domain\Service\ServiceClassThatAccessDomain;

class RepositoryClassThatAccessService {
    public function __construct(ServiceClassThatAccessDomain $_) {

    }
}
