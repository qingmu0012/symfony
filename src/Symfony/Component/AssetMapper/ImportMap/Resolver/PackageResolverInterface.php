<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\AssetMapper\ImportMap\Resolver;

use Symfony\Component\AssetMapper\ImportMap\ImportMapEntry;
use Symfony\Component\AssetMapper\ImportMap\PackageRequireOptions;

interface PackageResolverInterface
{
    /**
     * Grabs the URLs for the given packages and converts them to ImportMapEntry objects.
     *
     * If "download" is specified in PackageRequireOptions, the resolved package
     * contents should be included.
     *
     * @param PackageRequireOptions[] $packagesToRequire
     *
     * @return ResolvedImportMapPackage[] The import map entries that should be added
     */
    public function resolvePackages(array $packagesToRequire): array;

    /**
     * Downloads the contents of the given packages.
     *
     * The returned array should be a map using the same keys as $importMapEntries.
     *
     * @param array<string, ImportMapEntry> $importMapEntries
     *
     * @return array<string, string>
     */
    public function downloadPackages(array $importMapEntries, callable $progressCallback = null): array;
}
