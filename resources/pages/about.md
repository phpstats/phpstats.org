---
title: About PHPstats
description: PHPstats is a set of open-source PHP packages for data frames, data transformation, statistical models, Bayesian inference, charts, and notebooks.
---

PHPstats is a set of open-source PHP packages for data analysis: data frames,
data transformation, statistical models, Bayesian inference, charts, and
notebooks. Each package can be installed and used on its own. They are
designed to work well together.

PHPstats was created by [Erik Westlund](https://erik-westlund.academic.page).

## Public beta

PHPstats is in public beta. APIs and behavior may change between releases.
Pin package versions and check release notes when upgrading.

Please report installation problems, unexpected results, and documentation
errors in the relevant package's GitHub repository. Each package's site links
to its repository.

## Packages

<x-package-table />

## Design

PHPstats is heavily influenced by the [tidyverse](https://www.tidyverse.org/)
and the tidy approach to statistical computing in R. It also draws on ideas
and software from the Python community, including [Polars](https://pola.rs/)
and [Jupyter](https://jupyter.org/), as well as from the
[Stan](https://mc-stan.org/) ecosystem.

- <x-package-link package="phibble" class="font-semibold" />: data frames modeled on <a href="https://tibble.tidyverse.org" class="font-mono">tibble</a>, file reading modeled on <a href="https://readr.tidyverse.org" class="font-mono">readr</a>, factor functions modeled on <a href="https://forcats.tidyverse.org" class="font-mono">forcats</a>, and date and time functions modeled on <a href="https://lubridate.tidyverse.org" class="font-mono">lubridate</a>.
- <x-package-link package="phplyr" class="font-semibold" />: the data manipulation features of <a href="https://dplyr.tidyverse.org" class="font-mono">dplyr</a>, <a href="https://tidyr.tidyverse.org" class="font-mono">tidyr</a>, and <a href="https://sfirke.github.io/janitor/" class="font-mono">janitor</a>.
- <x-package-link package="phpolars" class="font-semibold" />: the <a href="https://pola.rs">Polars</a> library, wrapped in a PHP extension. Its API follows <a href="https://docs.pola.rs/api/python/stable/reference/">Polars' Python library</a>.
- <x-package-link package="juphyter" class="font-semibold" />: a PHP kernel for <a href="https://jupyter.org">Jupyter</a>, modeled on <a href="https://github.com/IRkernel/IRkernel" class="font-mono">IRkernel</a>, that also runs PHP in <a href="https://quarto.org">Quarto</a> documents.
- <x-package-link package="phit" class="font-semibold" />: its own Rust implementation of regression, mixed models, and distributions, drawing on R's <a href="https://stat.ethz.ch/R-manual/R-devel/library/stats/html/00Index.html" class="font-mono">stats</a>, <a href="https://github.com/lme4/lme4" class="font-mono">lme4</a>, and <a href="https://www.statsmodels.org" class="font-mono">statsmodels</a>. Models are written in R's formula syntax.
- <x-package-link package="phiz" class="font-semibold" />: the grammar of graphics of <a href="https://ggplot2.tidyverse.org" class="font-mono">ggplot2</a>.
- <x-package-link package="cmdstanphp" class="font-semibold" />: a PHP interface to <a href="https://mc-stan.org/users/interfaces/cmdstan">CmdStan</a>, with an API modeled on <a href="https://mc-stan.org/cmdstanr/" class="font-mono">CmdStanR</a>.

## Validation

The packages include comparisons against established R and Python libraries.
Each package documents its checks:

<x-verification-links />

<h2 id="ai-statement">AI statement</h2>

PHPstats was developed with AI assistance. Large language models wrote and
revised much of the code and documentation. Rebuilding the methods of established R, Python, and Stan packages
in PHP by hand would not be practical for one person.

Credit for those methods belongs to the authors of the original packages,
which each package's documentation names and links. Each package's results are
compared against those packages, and the Verification section of each package
publishes the comparisons. If you find an error, please open an issue in the
package's repository in the
[PHPstats organization on GitHub](https://github.com/phpstats).

## Source and license

The source of every package and of this site is in the
[PHPstats organization on GitHub](https://github.com/phpstats). The site and
every package except CmdStanPHP are released under the MIT license.
CmdStanPHP is released under the GNU General Public License, version 3 or
later, because parts of it follow GPL-licensed R packages. The repositories'
third-party notices list the code that follows other projects, with its
licenses. phpolars includes its compiled dependencies' notices in each release
archive as THIRD_PARTY_NOTICES.txt.
