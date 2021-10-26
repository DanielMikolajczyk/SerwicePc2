    let pageCount = 0;
    const mainDiv = document.getElementById('main-div');
    const next = document.getElementById('next');
    const prev = document.getElementById('prev');
    next.addEventListener('click', (e) => {
      e.preventDefault;
      if (pageCount != 2) {
        pageCount++;
        checkState(pageCount);
      }
    });
    prev.addEventListener('click', (e) => {
      if (pageCount != 0) {
        e.preventDefault;
        pageCount--;
        checkState(pageCount);
      }
    });

    function checkState(int) {
      switch (int) {
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