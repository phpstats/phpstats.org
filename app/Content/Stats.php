<?php

namespace App\Content;

/** Counts across the family's synced content, for the landing and Markdown pages. */
class Stats
{
    /**
     * A phit fit as its array: phit 0.6 returns fit objects (with toArray()),
     * earlier versions arrays. Any other value is returned unchanged.
     */
    public static function plain(mixed $value): mixed
    {
        return is_object($value) && method_exists($value, 'toArray') && str_starts_with($value::class, 'Phit\\')
            ? $value->toArray()
            : $value;
    }

    /** @return array{packages: int, verified: int, comparisons: int, examples: int, benchmarks: int} */
    public static function family(): array
    {
        $stats = ['packages' => 0, 'verified' => 0, 'comparisons' => 0, 'examples' => 0, 'benchmarks' => 0];
        foreach (Package::all() as $package) {
            $stats['packages']++;
            foreach ($package->verifications() as $verification) {
                $stats['comparisons'] += count($verification['cases'] ?? []);
                $stats['verified'] += count(array_filter($verification['cases'] ?? [], fn (array $case) => $case['passed'] ?? false));
            }
            $stats['benchmarks'] += count($package->benchmarks());
            $stats['examples'] += count($package->examples());
        }

        return $stats;
    }
}
