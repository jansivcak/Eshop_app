

document.querySelectorAll('#filter-form input[type="checkbox"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        document.getElementById('filter-form').submit();
    });
});
