// import external dependencies
import 'jquery';
import 'masonry-layout/dist/masonry.pkgd';
import 'imagesloaded/imagesloaded.pkgd';
import 'feather-icons/dist/feather'

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import notationsReflections from './routes/notations-reflections';
import things from './routes/things';
import researchCells from './routes/research-cells';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  notationsReflections,
  things,
  researchCells,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
