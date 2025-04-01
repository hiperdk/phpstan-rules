<?php

namespace Hiper\PHPStan\Rules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Stmt\ClassConst>
 */
class TypedConstantRule implements Rule {
    #[\Override]
    public function getNodeType(): string {
        return Node\Stmt\ClassConst::class;
    }

    #[\Override]
    public function processNode(Node $node, Scope $scope): array {
        if ($node->type === null) {
            return [
                RuleErrorBuilder::message('Class constants must have an explicit type declaration.')
                    ->identifier('constant.missingType')
                    ->build(),
            ];
        }

        return [];
    }
}
