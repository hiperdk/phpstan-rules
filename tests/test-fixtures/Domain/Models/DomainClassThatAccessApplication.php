<?php

namespace Test\Domain\Models;

use Test\Application\Service\ApplicationClassThatAccessDomain;

class DomainClassThatAccessApplication {
    public function __construct(ApplicationClassThatAccessDomain $_) {

    }
}
