    const accessoryGrid = document.getElementById('accessory-grid');
    const accessoryBtn = document.getElementById('accessory-create');
    let accessoryId = 0;

    accessoryBtn.addEventListener('click', (e) => {
      e.preventDefault;
      accessoryId++;
      accessoryGrid.insertAdjacentHTML('beforeend', ` 
              <div class="col-span-6 grid grid-cols-6 gap-4 mb-2 w-full">
                <div class="col-span-6">
                  <button id="accessory-${accessoryId}" type="button" class="bg-gray-500 w-full text-white font-bold py-2 px-4 rounded-full
                    hover:bg-blue-700 transition duration-500 ease-in-out">
                      <span>Akcesorium ${accessoryId}</span>
                      <i class="mx-4 fas fa-arrow-down"></i>
                  </button>
                </div>

                <div class="col-span-6 grid grid-cols-6 gap-4 mb-4 w-full">
                  <div class="col-span-2">
                    <x-forms.label>Nazwa</x-forms.label>
                    <x-forms.input name="accessory[${accessoryId}][name]" :value="old('accessory[${accessoryId}][name]')" :errors="$errors->messages()" />
                  </div>
                  <div class="col-span-2">
                    <x-forms.label>Producent</x-forms.label>
                    <x-forms.input name="accessory[${accessoryId}][manufacturer]" :value="old('accessory[${accessoryId}][manufacturer]')" :errors="$errors->messages()" />
                  </div>
                  <div class="col-span-2 place-self-center">
                    <x-buttons.info id="delete-${accessoryId}" bgColor="red" class="px-4 py-2" icon="fas fa-backspace">
                      Usuń</x-buttons.info>
                  </div>
                  <div class="col-span-6">
                    <x-forms.label>Opis Sprzętu</x-forms.label>
                    <x-forms.textarea name="accessory[${accessoryId}][description]" :errors="$errors->messages()">{{ old('accessory[${accessoryId}][description]') }}
                    </x-forms.textarea>
                  </div>
                </div>
              </div>`);

      document.getElementById('accessory-' + accessoryId).addEventListener('click', (e) => {
        e.preventDefault;
        e.currentTarget.lastElementChild.classList.toggle('fa-arrow-down');
        e.currentTarget.lastElementChild.classList.toggle('fa-arrow-right');
        e.currentTarget.parentElement.nextElementSibling.classList.toggle('hidden');
      });
      document.getElementById('delete-' + accessoryId).addEventListener('click', (e) => {
        e.preventDefault;
        e.currentTarget.parentElement.parentElement.parentElement.remove();
      });
    });