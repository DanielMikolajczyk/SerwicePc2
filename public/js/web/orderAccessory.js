/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/web/orderAccessory.js ***!
  \********************************************/
var accessoryGrid = document.getElementById('accessory-grid');
var accessoryBtn = document.getElementById('accessory-create');
var accessoryId = 0;
accessoryBtn.addEventListener('click', function (e) {
  e.preventDefault;
  accessoryId++;
  accessoryGrid.insertAdjacentHTML('beforeend', " \n              <div class=\"col-span-6 grid grid-cols-6 gap-4 mb-2 w-full\">\n                <div class=\"col-span-6\">\n                  <button id=\"accessory-".concat(accessoryId, "\" type=\"button\" class=\"bg-gray-500 w-full text-white font-bold py-2 px-4 rounded-full\n                    hover:bg-blue-700 transition duration-500 ease-in-out\">\n                      <span>Akcesorium ").concat(accessoryId, "</span>\n                      <i class=\"mx-4 fas fa-arrow-down\"></i>\n                  </button>\n                </div>\n\n                <div class=\"col-span-6 grid grid-cols-6 gap-4 mb-4 w-full\">\n                  <div class=\"col-span-2\">\n                    <x-forms.label>Nazwa</x-forms.label>\n                    <x-forms.input name=\"accessory[").concat(accessoryId, "][name]\" :value=\"old('accessory[").concat(accessoryId, "][name]')\" :errors=\"$errors->messages()\" />\n                  </div>\n                  <div class=\"col-span-2\">\n                    <x-forms.label>Producent</x-forms.label>\n                    <x-forms.input name=\"accessory[").concat(accessoryId, "][manufacturer]\" :value=\"old('accessory[").concat(accessoryId, "][manufacturer]')\" :errors=\"$errors->messages()\" />\n                  </div>\n                  <div class=\"col-span-2 place-self-center\">\n                    <x-buttons.info id=\"delete-").concat(accessoryId, "\" bgColor=\"red\" class=\"px-4 py-2\" icon=\"fas fa-backspace\">\n                      Usu\u0144</x-buttons.info>\n                  </div>\n                  <div class=\"col-span-6\">\n                    <x-forms.label>Opis Sprz\u0119tu</x-forms.label>\n                    <x-forms.textarea name=\"accessory[").concat(accessoryId, "][description]\" :errors=\"$errors->messages()\">{{ old('accessory[").concat(accessoryId, "][description]') }}\n                    </x-forms.textarea>\n                  </div>\n                </div>\n              </div>"));
  document.getElementById('accessory-' + accessoryId).addEventListener('click', function (e) {
    e.preventDefault;
    e.currentTarget.lastElementChild.classList.toggle('fa-arrow-down');
    e.currentTarget.lastElementChild.classList.toggle('fa-arrow-right');
    e.currentTarget.parentElement.nextElementSibling.classList.toggle('hidden');
  });
  document.getElementById('delete-' + accessoryId).addEventListener('click', function (e) {
    e.preventDefault;
    e.currentTarget.parentElement.parentElement.parentElement.remove();
  });
});
/******/ })()
;