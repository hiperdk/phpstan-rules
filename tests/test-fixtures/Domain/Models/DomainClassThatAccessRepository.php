<?php

namespace Test\Domain\Models;

use Test\Domain\Repositories\RepositoryClassThatAccessDomain;

class DomainClassThatAccessRepository {
    public function __construct(RepositoryClassThatAccessDomain $_) {

    }
}
