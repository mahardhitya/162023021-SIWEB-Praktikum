// Script untuk validasi form Bootstrap 
(function () {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    event.preventDefault();
                    alert('Data Konser Berhasil Disimpan!');
                    form.reset();
                    form.classList.remove('was-validated');
                }

                form.classList.add('was-validated')
            }, false)
        })
})()