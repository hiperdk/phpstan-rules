<?php

namespace Test\Domain\Repositories;

use Test\Infrastructure\Infrastructure;

class RepositoryClassThatAccessInfrastructure {
    public function __construct(Infrastructure $_) {

    }
}
