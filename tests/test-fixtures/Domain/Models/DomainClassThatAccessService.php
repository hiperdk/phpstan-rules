<?php

namespace Test\Domain\Models;

use Test\Domain\Service\ServiceClassThatAccessDomain;

class DomainClassThatAccessService {
    public function __construct(ServiceClassThatAccessDomain $_) {

    }
}
