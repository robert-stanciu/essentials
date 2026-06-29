<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\Relation;
use NunoMaduro\Essentials\Configurables\EnforceMorphMap;

beforeEach(function (): void {
    Relation::requireMorphMap(false);
});

it('enforces a morph map for polymorphic relationships', function (): void {
    $enforceMorphMap = new EnforceMorphMap;
    $enforceMorphMap->configure();

    expect(Relation::requiresMorphMap())->toBeTrue();
});

it('is enabled by default', function (): void {
    $enforceMorphMap = new EnforceMorphMap;

    expect($enforceMorphMap->enabled())->toBeTrue();
});

it('can be disabled via configuration', function (): void {
    config()->set('essentials.'.EnforceMorphMap::class, false);

    $enforceMorphMap = new EnforceMorphMap;

    expect($enforceMorphMap->enabled())->toBeFalse();
});
