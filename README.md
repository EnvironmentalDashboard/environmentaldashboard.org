# environmentaldashboard.org

Below contains the original README.
But, a note:
In November, 2019, this was Dockerized to allow for easier local development
on just this repository independently.
To use this method of development, run:
`./build.sh`, then `./run.sh`.

If you are looking for more technical documentation, check out the paragraph
below.

This repository contains the environmentaldashboard.org website. However, there are few files here other than the static pages of the website (the landing page, the gauges explained page, etc.) and stylesheets. All of the dynamic components of the website are maintained as seperate repositories to encourage modular applications which can be adopted as standalone websites. For example, if you were to clone this repository, the landing page would work because it only has static content, but navigating to the calendar would generate a 404 error because the calendar is a seperate repository which must be cloned seperately and symlinked into this repository (the name of the symlink will become the URL). The calendar application looks at the URL it is being run at (via `$_SERVER['SCRIPT_FILENAME']` and _not_ `__DIR__` or something like that because symlinks need to be resolved) to determine the correct stylesheets, js, etc. to serve along with the HTML.

