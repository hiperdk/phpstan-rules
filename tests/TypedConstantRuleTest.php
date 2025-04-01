<?php declare(strict_types=1);

use Hiper\PHPStan\Rules\TypedConstantRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @phpstan-type FixturePaths string[]
 * @phpstan-type ExpectedError array{0: string, 1: int, 2?: string|null}
 * @phpstan-type ExpectedErrors list<ExpectedError>
 * @phpstan-type Fixture array{0: FixturePaths, 1: ExpectedErrors}
 * @phpstan-type Fixtures Fixture[]
 *
 * @extends RuleTestCase<TypedConstantRule>
 */
class TypedConstantRuleTest extends RuleTestCase {
    protected function getRule(): Rule {
        return new TypedConstantRule();
    }

    /** @return Fixtures */
    public static function fixtureProvider(): array {
        return [
            [[__DIR__ . '/test-fixtures/ClassConstantWithoutType.php'], [['Class constants must have an explicit type declaration.', 4]]],
            [[__DIR__ . '/test-fixtures/ClassConstantWithType.php'], []],
        ];
    }

    /**
     * @param FixturePaths $paths_to_fixture
     * @param ExpectedErrors $expected_errors
     */
    #[DataProvider('fixtureProvider')]
    public function testClassConstantWithoutTypeDeclaration2(array $paths_to_fixture, array $expected_errors): void {
        $this->analyse($paths_to_fixture, $expected_errors);
    }
}
