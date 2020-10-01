// import external dependencies
import 'jquery';
import 'masonry-layout/dist/masonry.pkgd';
import 'imagesloaded/imagesloaded.pkgd';
import 'feather-icons/dist/feather';
import 'jquery-typeahead/dist/jquery.typeahead.min';
import 'jquery-highlight/jquery.highlight';
import 'isotope-layout/dist/isotope.pkgd';
import 'lightgallery/dist/js/lightgallery-all.js';

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
import category from './routes/category';
import architectureAndAtmosphere from './routes/architecture-and-atmosphere';
import conceptualFramework from './routes/conceptual-framework';

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
  category,
  architectureAndAtmosphere,
  conceptualFramework,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
