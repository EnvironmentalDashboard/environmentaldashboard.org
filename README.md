# environmentaldashboard.org

This repository contains the environmentaldashboard.org website. However, there are few files here other than the static pages of the website (the landing page, the gauges explained page, etc.) and stylesheets. All of the dynamic components of the website are maintained as seperate repositories to encourage modular applications which can be adopted as standalone websites. For example, if you were to clone this repository, the landing page would work because it only has static content, but navigating to the calendar would generate a 404 error because the calendar is a seperate repository which must be cloned seperately and symlinked into this repository (the name of the symlink will become the URL). The calendar application looks at the URL it is being run at (via `$_SERVER['SCRIPT_FILENAME']` and _not_ `__DIR__` or something like that because symlinks need to be resolved) to determine the correct stylesheets, js, etc. to serve along with the HTML.
Instructions for pulling from server:
  access server with ssh root@"name you set"
  cd /var/www/repos
  cd "repo you want"
  git pull
  control d to exit  

  
