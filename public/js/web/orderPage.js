/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/web/orderPage.js ***!
  \***************************************/
var pageCount = 0;
var mainDiv = document.getElementById('main-div');
var next = document.getElementById('next');
var prev = document.getElementById('prev');
next.addEventListener('click', function (e) {
  e.preventDefault;

  if (pageCount != 2) {
    pageCount++;
    checkState(pageCount);
  }
});
prev.addEventListener('click', function (e) {
  if (pageCount != 0) {
    e.preventDefault;
    pageCount--;
    checkState(pageCount);
  }
});

function checkState(_int) {
  switch (_int) {
    case 0:
      mainDiv.classList.add('right-0');
      mainDiv.classList.remove('right-full');
      mainDiv.classList.remove('right-full-2x');
      break;

    case 1:
      mainDiv.classList.remove('right-0');
      mainDiv.classList.add('right-full');
      mainDiv.classList.remove('right-full-2x');
      break;

    case 2:
      mainDiv.classList.remove('right-0');
      mainDiv.classList.remove('right-full');
      mainDiv.classList.add('right-full-2x');
      break;
  }
}
/******/ })()
;