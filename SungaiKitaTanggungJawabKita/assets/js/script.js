//Script.js - Untuk pengaduan (opsional, jika Anda ingin menggunakan AJAX dengan Formspree)

document.getElementById('reportForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    }).then(response => {
        if (response.ok) {
            alert('Terima kasih! Laporan Anda telah dikirim.');
            form.reset();
        } else {
            response.json().then(data => {
                if (Object.hasOwn(data, 'errors')) {
                    alert(data.errors.map(error => error.message).join(", "));
                } else {
                    alert('Terjadi kesalahan, coba lagi nanti.');
                }
            });
        }
    }).catch(error => {
        alert('Terjadi kesalahan, coba lagi nanti.');
    });
});

console.log("SungaiKitaTanggungJawabKita website loaded.");
