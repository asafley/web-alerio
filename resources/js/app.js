// Import Bootstrap styles and JavaScript
import '../css/app.css';
import 'bootstrap';

// Import jQuery
import jQuery from 'jquery';
window.$ = jQuery;

// Import Three.js
import * as THREE from 'three';
window.THREE = THREE;

// Import Lexical
import { createEditor } from 'lexical';
window.createEditor = createEditor;

// Import Three.js background
import { ThreeBackground } from './three-background.js';
window.ThreeBackground = ThreeBackground;

console.log('App initialized with Bootstrap, Three.js, jQuery, and Lexical');
