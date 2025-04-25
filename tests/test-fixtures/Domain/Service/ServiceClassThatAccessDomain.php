<?php

namespace Test\Domain\Service;

use Test\Domain\Models\DomainClassThatAccessDomain;

class ServiceClassThatAccessDomain {
    public function __construct(DomainClassThatAccessDomain $_) {

    }
}
