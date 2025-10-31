// Import Bootstrap styles and JavaScript
import '../css/app.css';

// Import jQuery
import jQuery from 'jquery';
window.$ = jQuery;

// Import Bootstrap
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Import Three.js
import * as THREE from 'three';
window.THREE = THREE;

// Import Three.js background
import { ThreeBackground } from './three-background.js';
window.ThreeBackground = ThreeBackground;

console.log('App initialized with Bootstrap, Three.js, jQuery, and Lexical');
