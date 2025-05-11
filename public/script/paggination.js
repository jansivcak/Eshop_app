let currentPage = 1;
const totalPages = 3;
const links = document.querySelectorAll('.pagination li a');


function updatePagination() {
    links.forEach(link => link.classList.remove('active', 'disabled'));

    links.forEach(link => {
        const page = link.getAttribute('data-page');

        if (page === String(currentPage)) {
            link.classList.add('active');
        }
        if (page === 'prev' && currentPage === 1) {
            link.classList.add('disabled');
        }
        if (page === 'next' && currentPage === totalPages) {
            link.classList.add('disabled');
        }
    });
}

updatePagination();



links.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const page = link.getAttribute('data-page');

        if (page === 'prev') {
            if (currentPage > 1) {
                currentPage--;
            }
        } else if (page === 'next') {
            if (currentPage < totalPages) {
                currentPage++;
            }
        } else {
            currentPage = parseInt(page);
        }

        updatePagination();
        console.log('Aktuálna strana:', currentPage);
    });
});