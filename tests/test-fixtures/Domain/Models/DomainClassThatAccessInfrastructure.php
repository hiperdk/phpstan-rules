<?php

namespace Test\Domain\Models;

use Test\Infrastructure\Infrastructure;

class DomainClassThatAccessInfrastructure {
    public function __construct(Infrastructure $_) {

    }
}
