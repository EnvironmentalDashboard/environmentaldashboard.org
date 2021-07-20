Just a quick comment on the update to the file structure here for reference during our sprint.

Directories
resources is for image files we will be using outside the iframes on our controller pages
scripts will be for any js functions we want to use on our pages like the home button actions
styles will contain any and all css code that will then be referenced in the header of the html controllers
templates will be the folder for the html contorllers

Naming Conventions
files will be all lower case with words separated by a hyphen, for example: my-file-name
file types will be .png for images, .js for scripts, .css for styles, .html for conrollers
the initial controller will be named _controller-template and remain unchanged

New Controller Workflow
1. Create new .html file in templates and name it based on the Digital Signage display name following the above convention
2. Copy the code from _controller-template and paste it into your new file
3. Update the title name
4. Add the png image file to the resources folder
5. Update the href for the title image to match the source for your added png file
6. Update the iframe href for the front end generated controller identified for that Digital Signage display
7. Save your changes

Every Day
At the start of each day you should
1. Pull the master branch from the remote repository
2. Merge the master branch into your development branch
3. Read the note your wrote yourself on the last day you worked on this code
4. Start developing
At the end of each day you should
1. Test the functionality of your finished work
2. Make a note for yourself where you stopped specifically on this code
3. Pull the master branch from the remote repository
4. Merge the master branch into your development branch
5. Retest code and check for discrepencies
6. Finally push your branch to GitHub
