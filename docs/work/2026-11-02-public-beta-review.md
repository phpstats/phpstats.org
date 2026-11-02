# Public beta review

The user requested an honest readiness assessment and authorized putting
PHPstats out as a beta. The website and package repositories were already
public. The site now explicitly says public beta, describes upgrade
expectations, and directs feedback to the relevant package repository.
No new package version or external announcement was created.

## Recommendation

Proceed with a public beta aimed at PHP developers who want statistical
and data workflows in their applications. The installation paths,
documentation, examples, and recorded verification evidence support early
adoption. Broad production maturity and universal R compatibility have not
been established by this review.

## Checks

- Full website suite, serial, with the local phit extension: 145 tests
  passed, with 5,908 assertions. The project has no configured parallel runner.
- After the beta copy changes, the landing, root-page, and prose checks:
  25 passed, with 512 assertions. The production frontend build passed.
- All 41 checked live URLs returned HTTP 200: the six root endpoints and
  overview, docs, examples, benchmarks, and verification for seven packages.
  This was an HTTP check, not a browser interaction or accessibility audit.
- A fresh temporary Composer project installed the published phibble
  0.8.1, phplyr 0.4.9, phiz 0.6.3, juphyter 0.1.1, CmdStanPHP 0.2.0,
  and phit-polyfill 0.6.2 together. No local path repositories were used.
  Composer audit reported no known advisories or abandoned packages.
- With the native extension absent and JIT disabled, published libraries
  correctly filtered and aggregated data, fit a simple formula with a
  LinearFit result, reproduced a reference normal quantile, and compiled
  a chart from a phibble data frame. CmdStanPHP autoloaded alongside them.
- The phit 0.6.2 and phpolars 0.2.2 releases each publish six Linux NTS
  binary archives covering PHP 8.3 through 8.5 on x86_64 and arm64.
- The latest main test workflows for the other seven repositories passed.
  phit's latest Rust and PHP workflow, run 41521819467, has a passing Linux
  job and lint, but its macOS job was canceled before steps ran. The prior
  Rust and PHP workflow passed. The latest installer/FPM workflow passed.
  The latest macOS result therefore remains unverified by that run.

## Limits and follow-up

The polyfill deliberately refuses active OPcache JIT because it has
produced incorrect numerical results. This is documented and tested in its
own project. Native installation has more friction on macOS and musl Linux,
where the documented path builds from source. These are beta caveats.

The review did not rerun every package's numerical suite, perform a fresh
native extension install, compile a Stan model, run a notebook session, or
perform a new visual and accessibility audit. Package CI and published
verification records provide evidence for these areas, with their stated
scope; they do not establish correctness for all inputs.

The landing page is dense and loads the chart runtime up front. A measured
request transferred approximately 88 KB of compressed HTML and 382 KB of
compressed application JavaScript, excluding fonts, CSS, and other assets.
This is a follow-up optimization, not a measured rendering-speed claim.

The next useful evidence is first-time installation feedback and independent
workflows with unfamiliar datasets. Prioritize installation failures,
incorrect results, missing-value behavior, convergence and diagnostics,
and discrepancies between examples and released APIs.
