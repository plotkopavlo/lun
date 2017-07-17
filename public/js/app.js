/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */
/***/ (function(module, exports) {


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/*require('./bootstrap');
require('./../../../node_modules/bootstrap-select/js/bootstrap-select');*/
// require('./jquery.simplePagination.js');

$('.selectpicker').selectpicker({
  style: 'btn-info-select'
});

// $(function() {
//
//     initPagination();
// });
//
// function initPagination(page) {
//     $(".pagination").pagination({
//         items: clientsTotal,
//         itemsOnPage: clientsOnPage,
//         currentPage: page,
//         cssStyle: 'light-theme',
//         prevText: "Назад",
//         nextText: "Вперёд",
//         onPageClick: function (pageNumber, event) {
//             updateClientsList(pageNumber);
//         }
//     });
// }


// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

/***/ }),
/* 2 */
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: \n@import \"node_modules/bootstrap-select/sass/bootstrap-select.scss\";\n^\n      File to import not found or unreadable: node_modules/bootstrap-select/sass/bootstrap-select.scss.\nParent style sheet: stdin\n      in /home/kdev/Workspace/lun_task/resources/assets/sass/app.scss (line 13, column 1)\n    at runLoaders (/home/kdev/Workspace/lun_task/node_modules/webpack/lib/NormalModule.js:192:19)\n    at /home/kdev/Workspace/lun_task/node_modules/loader-runner/lib/LoaderRunner.js:364:11\n    at /home/kdev/Workspace/lun_task/node_modules/loader-runner/lib/LoaderRunner.js:230:18\n    at context.callback (/home/kdev/Workspace/lun_task/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at Object.asyncSassJobQueue.push [as callback] (/home/kdev/Workspace/lun_task/node_modules/sass-loader/lib/loader.js:55:13)\n    at Object.<anonymous> (/home/kdev/Workspace/lun_task/node_modules/sass-loader/node_modules/async/dist/async.js:2244:31)\n    at Object.callback (/home/kdev/Workspace/lun_task/node_modules/sass-loader/node_modules/async/dist/async.js:906:16)\n    at options.error (/home/kdev/Workspace/lun_task/node_modules/node-sass/lib/index.js:294:32)");

/***/ }),
/* 3 */,
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ })
/******/ ]);