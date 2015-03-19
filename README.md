# MODXInit

This repository includes the initial project data for a new MODX project.


## Install

Make sure you have installed the latest version of [node.js and npm](https://docs.npmjs.com/getting-started/installing-node) and also of [Gitify](https://github.com/modmore/Gitify).

Start by cloning the repository to your local environment:
```
git clone git@github.com:chsmedien/MODXInit.git
```

Then navigate into the main folder of the repository and install node dependencies:
```
cd MODXinit
npm install
bower install
```

Afterwards you need to install MODX. Run the setup script.

When you finished the setup you should run `Gitify install:package --all` from the command line. This will install all extra packages (NOTE: this does NOT include premium extras by modmore - those need to be manually installed with an api key).


## Development

To start developing you simply need to run
```
npm start
```
This will start live-reload and start watching the dev files.



## NPM Scripts

- `npm start` – starts the development task (`open:local`, `live-reload`, `serve`, `watch`)
- `npm run clean` – clears the dist/ directory
- `npm run lint` – runs jshint on all js files in sources/js/
- `npm run build:js` – uses uglifyjs to process all js files, `npm run lint` is automatically executed before
- `npm run build:css` – uses node-sass to generate all css files, autoprefixer is automatically executed afterwards
- `npm run build:svg` – generates a svg sprite from all svg files in sources/svg
- `npm run build` – runs build:js, build:css and build:svg
- `npm run watch` – starts watching all files in sources/ and executes `npm run build` after each change
- `npm run live-reload` – starts live-reload for the dist/ directory


## Tools & Frameworks

#### CSS

This project uses
- libsass via node-sass
- autoprefixer
- uglifyjs
and more (see [package.json](https://github.com/chsmedien/antenne.de/blob/master/package.json))


#### Frameworks & more

- [Foundation for Sites](http://foundation.zurb.com/) – [Docs](http://foundation.zurb.com/docs/)
- [Slick carousel](http://kenwheeler.github.io/slick/) – [Docs](http://kenwheeler.github.io/slick/#settings)


## Agency

The project has been started by chsmedien. If you need help please contact us via chsmedien.com.