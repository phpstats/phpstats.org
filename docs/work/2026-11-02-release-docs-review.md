# Release documentation review

Reviewed the PHPstats site's copy and the documentation, installation
requirements, package metadata, changelogs, site manifests, and CI entry
checks for phit, phit-polyfill, phibble, phplyr, phpolars, phiz, juphyter,
and CmdStanPHP. The link audit covered 184 committed HTML documents,
including relative file targets, fragments, and absolute links between the
packages' documentation sites. No broken targets were found. Every benchmark
and verification file listed by the eight site manifests exists.

This review checked documentation and release integration. It did not rerun
every package's numerical, platform, or performance suite, or check every
external upstream URL. The old numerical implementations were not opened.

## Corrections

- phit's polyfill guide now describes the 0.6.2 target, the supported PHP
  upper bound, and the correct `Phit\Polyfill\Polyfill` helper class.
- phit's optimizer reference names Brent's algorithms and the public-domain
  Netlib routines used in the clean-room rewrite. The publishing guide
  describes the GitHub Pages redirects. The design page describes the current
  fit objects and other result types.
- phit-polyfill's overview, README, and implementation page describe the
  bitwise parity checks and link the documented JIT and architecture limits.
- phplyr's installation, compatibility, model reference, R translation guide,
  and API-reference generator describe fit objects from phit 0.6 onward and
  arrays from earlier versions. The stale phit version range and a muted
  polyfill installation entry were corrected.
- phplyr's saved verification text distinguishes its recorded extension run
  from CI's separate polyfill checks. Recorded values, errors, and environment
  versions were preserved.
- phibble's remaining prose use of "row verbs" now reads "row operations."
- The site's project settings use the canonical documentation URLs and
  general release-note links, with the old 0.3.0 status labels removed. Its
  phit overview describes fit objects. The About page describes the different
  location of phpolars' compiled-dependency notices.

## CI finding

phplyr's latest main run, [41443814168](https://github.com/phpstats/phplyr/actions/runs/41443814168),
failed only in the polyfill job. That job installed `phpstats/phit-polyfill:^0.3`,
whose model API predates phplyr's current calls. Five tests failed because
the required functions were missing. The workflow now selects `^0.6`, which
accepts the published 0.6.0 and upcoming 0.6.2 releases. Both native and
polyfill smoke checks require `fit_ols()` and `fit_generalized_linear()` and
exit unsuccessfully if either is missing. The old native check only printed
whether the obsolete `fit_lm()` existed.

## Validation

- All three affected Quarto projects rendered successfully. The polyfill's
  five standalone documentation pages also rendered successfully.
- Site documentation, prose, package pages, root pages, SEO, pin/lock, and sync
  checks: 112 passed, with 5,609 assertions, after importing the corrections.
- phit's optimizer check: 91 bitwise R comparisons passed, including
  evaluation counts and validation.
- phplyr's model and expression checks against the current local polyfill:
  11 passed, with 348 assertions. The missing-phit case skipped because the
  polyfill was present. This was a focused local run, not a hosted CI run
  with the released Composer dependency.
- Runtime inspection confirmed phit 0.6.2 exposes 235 functions and phplyr's
  `lm()` returns `Phit\LinearFit` with a plain-array `toArray()` result.
- The API-reference generation check, changed generator syntax checks,
  workflow YAML validation, and diff whitespace checks passed.

The sync test that checks pinned commits now supplies pinned provenance in
its own temporary fixture. It previously assumed the real phplyr content
always had a commit, which fails after the supported local sync operation.

## Publication

The user authorized publication after the review. Package changes were
committed and pushed:

- phit: `370d3cc`.
- phibble: `3bfdff1`.
- phplyr: `1f7344c`, including the CI correction.
- phit-polyfill: `6a0323e`, tagged and released as `v0.6.2` after merging
  PR #3's JIT fix. Every blocking Linux and macOS job passed on that fix;
  PHP 8.3's documented function-JIT crash remains informational. Packagist
  lists `v0.6.2` at the release commit.

The website imports for phit, phibble, and phplyr were refreshed from those
pushed commits with `php85 artisan site:sync phit phibble phplyr --update`.
The content pins and `sync.json` files now name those commits. The earlier
local-source markers were replaced.

Production is Forge site 3475296 on apps (flint), serving phpstats.org and
its package hosts. It deploys website main automatically on push, using
`scripts/deploy`. The release imports use pinned Git commits; no local
checkout paths are needed on the server. Deployment verification checks the
active release commit and the corrected public pages.
