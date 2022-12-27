/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/assets/js/app.js":
/*!******************************!*\
  !*** ./src/assets/js/app.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("\n\n//# sourceURL=webpack:///./src/assets/js/app.js?");

/***/ }),

/***/ "./src/assets/js/burger.js":
/*!*********************************!*\
  !*** ./src/assets/js/burger.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var burger = document.getElementById('navToggle');\nvar mobileNav = document.querySelector('.nav');\n\nif (burger) {\n  burger.addEventListener(\"click\", function (event) {\n    mobileNav.classList.toggle('show');\n  });\n}\n\n//# sourceURL=webpack:///./src/assets/js/burger.js?");

/***/ }),

/***/ "./src/assets/js/email-validate.js":
/*!*****************************************!*\
  !*** ./src/assets/js/email-validate.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// const btnsSubmit = document.querySelectorAll('[type=\"submit\"]');\n// const inputsEmail = document.querySelectorAll('[name=\"email\"]');\n// document.querySelectorAll('form[name^=fm]').forEach(form => {\n// })\n// btnsSubmit.forEach(btn => {\n//     btn.addEventListener('click', event => {\n//         inputsEmail.forEach(input => {\n//             if (validateEmail(input.value)) {\n//                 input.style.borderColor = '#909090'\n//             } else {\n//                 input.style.borderColor = 'red'\n//             }\n//         });\n//     });\n// });\n// function validateEmail(email) {\n//     const reg = /^([A-Za-z0-9_\\-\\.])+\\@([A-Za-z0-9_\\-\\.])+\\.([A-Za-z]{2,4})$/;\n//     return reg.test(String(email).toLowerCase());\n// }\n\n//# sourceURL=webpack:///./src/assets/js/email-validate.js?");

/***/ }),

/***/ "./src/assets/js/header-sticky.js":
/*!****************************************!*\
  !*** ./src/assets/js/header-sticky.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// const header = document.querySelector(\"#header\");\n// window.addEventListener(\"scroll\", stickyHeader);\n// window.addEventListener(\"DOMContentLoaded\", stickyHeader);\n// function stickyHeader() {\n//     let strcollPos = window.scrollY;\n//     if (strcollPos > 99) {\n//         header.classList.add('sticky-header');\n//     }\n//     else {\n//         header.classList.remove('sticky-header');\n//     }\n// }\n\n//# sourceURL=webpack:///./src/assets/js/header-sticky.js?");

/***/ }),

/***/ "./src/assets/js/header.js":
/*!*********************************!*\
  !*** ./src/assets/js/header.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var buttonUp = document.getElementById(\"buttonUp\");\n\nif (buttonUp) {\n  document.getElementById(\"buttonUp\").onclick = function scrollUpFunction() {\n    document.body.scrollTop = 0;\n    document.documentElement.scrollTop = 0;\n  };\n}\n\nwindow.onscroll = function () {\n  if (buttonUp) {\n    scrollFunction();\n  }\n};\n\nfunction scrollFunction() {\n  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {\n    document.getElementById(\"buttonUp\").style.display = \"block\";\n  } else {\n    document.getElementById(\"buttonUp\").style.display = \"none\";\n  }\n}\n\n//# sourceURL=webpack:///./src/assets/js/header.js?");

/***/ }),

/***/ "./src/assets/js/masked-phone.js":
/*!***************************************!*\
  !*** ./src/assets/js/masked-phone.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function (a) {\n  a.MaskedInput = function (f) {\n    if (!f || !f.elm || !f.format) {\n      return null;\n    }\n\n    if (!(this instanceof a.MaskedInput)) {\n      return new a.MaskedInput(f);\n    }\n\n    var o = this,\n        d = f.elm,\n        s = f.format,\n        i = f.allowed || \"0123456789\",\n        h = f.allowedfx || function () {\n      return true;\n    },\n        p = f.separator || \"/:-\",\n        n = f.typeon || \"_YMDhms\",\n        c = f.onbadkey || function () {},\n        q = f.onfilled || function () {},\n        w = f.badkeywait || 0,\n        A = f.hasOwnProperty(\"preserve\") ? !!f.preserve : true,\n        l = true,\n        y = false,\n        t = s,\n        j = function () {\n      if (window.addEventListener) {\n        return function (E, C, D, B) {\n          E.addEventListener(C, D, B === undefined ? false : B);\n        };\n      }\n\n      if (window.attachEvent) {\n        return function (D, B, C) {\n          D.attachEvent(\"on\" + B, C);\n        };\n      }\n\n      return function (D, B, C) {\n        D[\"on\" + B] = C;\n      };\n    }(),\n        u = function u() {\n      for (var B = d.value.length - 1; B >= 0; B--) {\n        for (var D = 0, C = n.length; D < C; D++) {\n          if (d.value[B] === n[D]) {\n            return false;\n          }\n        }\n      }\n\n      return true;\n    },\n        x = function x(C) {\n      try {\n        C.focus();\n\n        if (C.selectionStart >= 0) {\n          return C.selectionStart;\n        }\n\n        if (document.selection) {\n          var B = document.selection.createRange();\n          return -B.moveStart(\"character\", -C.value.length);\n        }\n\n        return -1;\n      } catch (D) {\n        return -1;\n      }\n    },\n        b = function b(C, E) {\n      try {\n        if (C.selectionStart) {\n          C.focus();\n          C.setSelectionRange(E, E);\n        } else {\n          if (C.createTextRange) {\n            var B = C.createTextRange();\n            B.move(\"character\", E);\n            B.select();\n          }\n        }\n      } catch (D) {\n        return false;\n      }\n\n      return true;\n    },\n        m = function m(D) {\n      D = D || window.event;\n      var C = \"\",\n          E = D.which,\n          B = D.type;\n\n      if (E === undefined || E === null) {\n        E = D.keyCode;\n      }\n\n      if (E === undefined || E === null) {\n        return \"\";\n      }\n\n      switch (E) {\n        case 8:\n          C = \"bksp\";\n          break;\n\n        case 46:\n          C = B === \"keydown\" ? \"del\" : \".\";\n          break;\n\n        case 16:\n          C = \"shift\";\n          break;\n\n        case 0:\n        case 9:\n        case 13:\n          C = \"etc\";\n          break;\n\n        case 37:\n        case 38:\n        case 39:\n        case 40:\n          C = !D.shiftKey && D.charCode !== 39 && D.charCode !== undefined ? \"etc\" : String.fromCharCode(E);\n          break;\n\n        default:\n          C = String.fromCharCode(E);\n          break;\n      }\n\n      return C;\n    },\n        v = function v(B, C) {\n      if (B.preventDefault) {\n        B.preventDefault();\n      }\n\n      B.returnValue = C || false;\n    },\n        k = function k(B) {\n      var D = x(d),\n          F = d.value,\n          E = \"\",\n          C = true;\n\n      switch (C) {\n        case i.indexOf(B) !== -1:\n          D = D + 1;\n\n          if (D > s.length) {\n            return false;\n          }\n\n          while (p.indexOf(F.charAt(D - 1)) !== -1 && D <= s.length) {\n            D = D + 1;\n          }\n\n          if (!h(B, D)) {\n            c(B);\n            return false;\n          }\n\n          E = F.substr(0, D - 1) + B + F.substr(D);\n\n          if (i.indexOf(F.charAt(D)) === -1 && n.indexOf(F.charAt(D)) === -1) {\n            D = D + 1;\n          }\n\n          break;\n\n        case B === \"bksp\":\n          D = D - 1;\n\n          if (D < 0) {\n            return false;\n          }\n\n          while (i.indexOf(F.charAt(D)) === -1 && n.indexOf(F.charAt(D)) === -1 && D > 1) {\n            D = D - 1;\n          }\n\n          E = F.substr(0, D) + s.substr(D, 1) + F.substr(D + 1);\n          break;\n\n        case B === \"del\":\n          if (D >= F.length) {\n            return false;\n          }\n\n          while (p.indexOf(F.charAt(D)) !== -1 && F.charAt(D) !== \"\") {\n            D = D + 1;\n          }\n\n          E = F.substr(0, D) + s.substr(D, 1) + F.substr(D + 1);\n          D = D + 1;\n          break;\n\n        case B === \"etc\":\n          return true;\n\n        default:\n          return false;\n      }\n\n      d.value = \"\";\n      d.value = E;\n      b(d, D);\n      return false;\n    },\n        g = function g(B) {\n      if (i.indexOf(B) === -1 && B !== \"bksp\" && B !== \"del\" && B !== \"etc\") {\n        var C = x(d);\n        y = true;\n        c(B);\n        setTimeout(function () {\n          y = false;\n          b(d, C);\n        }, w);\n        return false;\n      }\n\n      return true;\n    },\n        z = function z(C) {\n      if (!l) {\n        return true;\n      }\n\n      C = C || event;\n\n      if (y) {\n        v(C);\n        return false;\n      }\n\n      var B = m(C);\n\n      if ((C.metaKey || C.ctrlKey) && (B === \"X\" || B === \"V\")) {\n        v(C);\n        return false;\n      }\n\n      if (C.metaKey || C.ctrlKey) {\n        return true;\n      }\n\n      if (d.value === \"\") {\n        d.value = s;\n        b(d, 0);\n      }\n\n      if (B === \"bksp\" || B === \"del\") {\n        k(B);\n        v(C);\n        return false;\n      }\n\n      return true;\n    },\n        e = function e(C) {\n      if (!l) {\n        return true;\n      }\n\n      C = C || event;\n\n      if (y) {\n        v(C);\n        return false;\n      }\n\n      var B = m(C);\n\n      if (B === \"etc\" || C.metaKey || C.ctrlKey || C.altKey) {\n        return true;\n      }\n\n      if (B !== \"bksp\" && B !== \"del\" && B !== \"shift\") {\n        if (!g(B)) {\n          v(C);\n          return false;\n        }\n\n        if (k(B)) {\n          if (u()) {\n            q();\n          }\n\n          v(C, true);\n          return true;\n        }\n\n        if (u()) {\n          q();\n        }\n\n        v(C);\n        return false;\n      }\n\n      return false;\n    },\n        r = function r() {\n      if (!d.tagName || d.tagName.toUpperCase() !== \"INPUT\" && d.tagName.toUpperCase() !== \"TEXTAREA\") {\n        return null;\n      }\n\n      if (!A || d.value === \"\") {\n        d.value = s;\n      }\n\n      j(d, \"keydown\", function (B) {\n        z(B);\n      });\n      j(d, \"keypress\", function (B) {\n        e(B);\n      });\n      j(d, \"focus\", function () {\n        t = d.value;\n      });\n      j(d, \"blur\", function () {\n        if (d.value !== t && d.onchange) {\n          d.onchange();\n        }\n      });\n      return o;\n    };\n\n    o.resetField = function () {\n      d.value = s;\n    };\n\n    o.setAllowed = function (B) {\n      i = B;\n      o.resetField();\n    };\n\n    o.setFormat = function (B) {\n      s = B;\n      o.resetField();\n    };\n\n    o.setSeparator = function (B) {\n      p = B;\n      o.resetField();\n    };\n\n    o.setTypeon = function (B) {\n      n = B;\n      o.resetField();\n    };\n\n    o.setEnabled = function (B) {\n      l = B;\n    };\n\n    return r();\n  };\n})(window);\n\n//# sourceURL=webpack:///./src/assets/js/masked-phone.js?");

/***/ }),

/***/ "./src/assets/js/mobile-dropdown.js":
/*!******************************************!*\
  !*** ./src/assets/js/mobile-dropdown.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var btn = document.querySelector('.has-subnav-mobile');\n\nif (btn) {\n  btn.addEventListener('click', function () {\n    btn.classList.toggle('active');\n  });\n}\n\n//# sourceURL=webpack:///./src/assets/js/mobile-dropdown.js?");

/***/ }),

/***/ "./src/assets/js/modal.js":
/*!********************************!*\
  !*** ./src/assets/js/modal.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var modalBtn = document.querySelectorAll('[data-modal]');\nvar body = document.body;\nvar modalClose = document.querySelectorAll('.modal-custom__close');\nvar modal = document.querySelectorAll('.modal-custom');\n$(document).ready(function () {\n  document.querySelectorAll('[data-modal]').forEach(function (item) {\n    item.addEventListener('click', function (event) {\n      var $this = event.currentTarget;\n      var modalId = $this.getAttribute('data-modal');\n      var modal = document.getElementById(modalId);\n      var modalContent = modal.querySelector('.modal-custom__content');\n      modalContent.addEventListener('click', function (event) {\n        event.stopPropagation();\n      });\n      modal.classList.add('show');\n      body.classList.add('no-scroll');\n      setTimeout(function () {\n        modalContent.style.transform = 'none';\n        modalContent.style.opacity = '1';\n      }, 1);\n    });\n  });\n});\nmodalClose.forEach(function (item) {\n  item.addEventListener('click', function (event) {\n    var currentModal = event.currentTarget.closest('.modal-custom');\n    closeModal(currentModal);\n  });\n});\nmodal.forEach(function (item) {\n  item.addEventListener('click', function (event) {\n    var currentModal = event.currentTarget;\n    closeModal(currentModal);\n  });\n});\n\nwindow.closeModal = function (currentModal) {\n  if (!currentModal) return;\n  var modalContent = currentModal.querySelector('.modal-custom__content');\n  modalContent.removeAttribute('style');\n  setTimeout(function () {\n    currentModal.classList.remove('show');\n    body.classList.remove('no-scroll');\n  }, 200);\n};\n\n//# sourceURL=webpack:///./src/assets/js/modal.js?");

/***/ }),

/***/ "./src/assets/js/tabs-promo.js":
/*!*************************************!*\
  !*** ./src/assets/js/tabs-promo.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("document.addEventListener(\"DOMContentLoaded\", function () {\n  var tabsBtn = document.querySelectorAll(\".tabs-promo__nav-btn\");\n  var tabsItems = document.querySelectorAll(\".tabs-promo__item\");\n  tabsBtn.forEach(onTabClick);\n\n  function onTabClick(item) {\n    item.addEventListener(\"click\", function () {\n      var currentBtn = item;\n      var tabId = currentBtn.getAttribute(\"data-tab-item\");\n      var currentTab = document.querySelector(tabId);\n\n      if (!currentBtn.classList.contains('active')) {\n        tabsBtn.forEach(function (item) {\n          item.classList.remove('active');\n        });\n        tabsItems.forEach(function (item) {\n          item.classList.remove('active');\n        });\n        currentBtn.classList.add('active');\n        currentTab.classList.add('active');\n        $('.promo-slider.slick-initialized').slick(\"setPosition\");\n      }\n    });\n  }\n\n  if (document.querySelector(\".tabs-promo__nav-btn:nth-child(1)\")) {\n    document.querySelector(\".tabs-promo__nav-btn:nth-child(1)\").click();\n  }\n});\n\n//# sourceURL=webpack:///./src/assets/js/tabs-promo.js?");

/***/ }),

/***/ "./src/assets/js/tabs.js":
/*!*******************************!*\
  !*** ./src/assets/js/tabs.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("document.addEventListener(\"DOMContentLoaded\", function () {\n  var btns = document.querySelectorAll('[data-tab-link]');\n  var tabs = document.querySelectorAll('[data-tab]');\n\n  if (btns) {\n    btns.forEach(function (item) {\n      item.addEventListener('click', function (event) {\n        btns.forEach(function (elem) {\n          elem.classList.remove(\"links-list__item--active\");\n        });\n        item.classList.add(\"links-list__item--active\");\n        var tab_id = event.currentTarget.getAttribute('data-tab-link');\n        var tab = document.querySelector('div[data-tab=\"' + tab_id + '\"]');\n\n        if (tab && tabs) {\n          tabs.forEach(function (elem) {\n            elem.style.opacity = \"0\";\n            elem.style.visibility = \"hidden\";\n          });\n          tab.style.opacity = \"1\";\n          tab.style.visibility = \"visible\";\n        }\n      });\n    });\n  }\n\n  if (tabs) {\n    tabs.forEach(function (elem, i) {\n      if (i) {\n        elem.style.opacity = \"0\"; // elem.style.visibility = \"hidden\"\n      }\n    });\n  }\n});\n\n//# sourceURL=webpack:///./src/assets/js/tabs.js?");

/***/ }),

/***/ "./src/assets/js/test.js":
/*!*******************************!*\
  !*** ./src/assets/js/test.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// var buffer = [] \n// for(let bound=0; bound<64; bound++) {\n//   buffer.push(bound)\n// }\n// console.log(\"Result buffer: \" + bound);\n\n//# sourceURL=webpack:///./src/assets/js/test.js?");

/***/ }),

/***/ 0:
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./src/assets/js/app.js ./src/assets/js/burger.js ./src/assets/js/email-validate.js ./src/assets/js/header-sticky.js ./src/assets/js/header.js ./src/assets/js/masked-phone.js ./src/assets/js/mobile-dropdown.js ./src/assets/js/modal.js ./src/assets/js/tabs-promo.js ./src/assets/js/tabs.js ./src/assets/js/test.js ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\app.js */\"./src/assets/js/app.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\burger.js */\"./src/assets/js/burger.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\email-validate.js */\"./src/assets/js/email-validate.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\header-sticky.js */\"./src/assets/js/header-sticky.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\header.js */\"./src/assets/js/header.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\masked-phone.js */\"./src/assets/js/masked-phone.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\mobile-dropdown.js */\"./src/assets/js/mobile-dropdown.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\modal.js */\"./src/assets/js/modal.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\tabs-promo.js */\"./src/assets/js/tabs-promo.js\");\n__webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\tabs.js */\"./src/assets/js/tabs.js\");\nmodule.exports = __webpack_require__(/*! D:\\Programming\\Projects\\UI\\mantera-ui\\src\\assets\\js\\test.js */\"./src/assets/js/test.js\");\n\n\n//# sourceURL=webpack:///multi_./src/assets/js/app.js_./src/assets/js/burger.js_./src/assets/js/email-validate.js_./src/assets/js/header-sticky.js_./src/assets/js/header.js_./src/assets/js/masked-phone.js_./src/assets/js/mobile-dropdown.js_./src/assets/js/modal.js_./src/assets/js/tabs-promo.js_./src/assets/js/tabs.js_./src/assets/js/test.js?");

/***/ })

/******/ });