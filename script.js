document.addEventListener('DOMContentLoaded', function() {
    const pilihanSekolahDiv = document.getElementById('pilihanSekolah');
    const jenjangSelect = document.getElementById('jenjang');
    let sekolahTerpilih = []; // Array untuk menyimpan sekolah yang sudah dipilih

    // Fungsi untuk membuat elemen pilihan sekolah
    function buatPilihanSekolah(jenjang) {
        pilihanSekolahDiv.innerHTML = ''; // Bersihkan pilihan sekolah sebelumnya
        sekolahTerpilih = []; // Reset sekolah terpilih

        for (let i = 1; i <= 3; i++) {
            const sekolahSelect = document.createElement('select');
            sekolahSelect.name = `pilihan_sekolah_${i}`;

            // Tambahkan opsi default "Pilih Sekolah"
            const defaultOptionSekolah = document.createElement('option');
            defaultOptionSekolah.value = '';
            defaultOptionSekolah.text = 'Pilih Sekolah';
            sekolahSelect.appendChild(defaultOptionSekolah);

            // Mengambil data sekolah dari server menggunakan AJAX berdasarkan jenjang
            fetch(`get_sekolah.php?jenjang=${jenjang}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(sekolah => {
                        if (!sekolahTerpilih.includes(sekolah.id_sekolah)) { // Hanya tambahkan sekolah yang belum dipilih
                            const option = document.createElement('option');
                            option.value = sekolah.id_sekolah;
                            option.text = sekolah.nama_sekolah;
                            sekolahSelect.appendChild(option);
                        }
                    });
                });

            pilihanSekolahDiv.appendChild(document.createTextNode(`Pilihan Sekolah ${i}: `));
            pilihanSekolahDiv.appendChild(sekolahSelect);
            pilihanSekolahDiv.appendChild(document.createElement('br'));
            pilihanSekolahDiv.appendChild(document.createElement('br'));

            if (jenjang === 'SMK') {
                const jurusanSelect1 = document.createElement('select');
                jurusanSelect1.name = `pilihan_jurusan_${i}_1`;
                const jurusanSelect2 = document.createElement('select');
                jurusanSelect2.name = `pilihan_jurusan_${i}_2`;
                const jurusanSelect3 = document.createElement('select');
                jurusanSelect3.name = `pilihan_jurusan_${i}_3`;
                let jurusanTerpilih = []; // Array untuk menyimpan jurusan yang sudah dipilih

                // Tambahkan opsi default "Pilih Jurusan"
                const defaultOptionJurusan1 = document.createElement('option');
                defaultOptionJurusan1.value = '';
                defaultOptionJurusan1.text = 'Pilih Jurusan';
                jurusanSelect1.appendChild(defaultOptionJurusan1);

                const defaultOptionJurusan2 = document.createElement('option');
                defaultOptionJurusan2.value = '';
                defaultOptionJurusan2.text = 'Pilih Jurusan';
                jurusanSelect2.appendChild(defaultOptionJurusan2);

                const defaultOptionJurusan3 = document.createElement('option');
                defaultOptionJurusan3.value = '';
                defaultOptionJurusan3.text = 'Pilih Jurusan';
                jurusanSelect3.appendChild(defaultOptionJurusan3);

                // Event listener untuk mengubah pilihan jurusan berdasarkan sekolah yang dipilih
                sekolahSelect.addEventListener('change', function() {
                    const idSekolah = this.value;

                    // Mengambil data jurusan dari server menggunakan AJAX
                    fetch(`get_jurusan.php?id_sekolah=${idSekolah}`)
                        .then(response => response.json())
                        .then(data => {
                            // Membersihkan pilihan jurusan sebelumnya
                            jurusanSelect1.innerHTML = '';
                            jurusanSelect2.innerHTML = '';
                            jurusanSelect3.innerHTML = '';
                            jurusanTerpilih = []; // Reset jurusan terpilih

                            // Tambahkan opsi default "Pilih Jurusan"
                            jurusanSelect1.appendChild(defaultOptionJurusan1.cloneNode(true));
                            jurusanSelect2.appendChild(defaultOptionJurusan2.cloneNode(true));
                            jurusanSelect3.appendChild(defaultOptionJurusan3.cloneNode(true));

                            data.forEach(jurusan => {
                                const option1 = document.createElement('option');
                                option1.value = jurusan.id_jurusan;
                                option1.text = jurusan.nama_jurusan;
                                jurusanSelect1.appendChild(option1);

                                const option2 = document.createElement('option');
                                option2.value = jurusan.id_jurusan;
                                option2.text = jurusan.nama_jurusan;
                                jurusanSelect2.appendChild(option2);

                                const option3 = document.createElement('option');
                                option3.value = jurusan.id_jurusan;
                                option3.text = jurusan.nama_jurusan;
                                jurusanSelect3.appendChild(option3);
                            });
                        });
                });

                // Event listener untuk menyimpan jurusan yang dipilih dan memastikan tidak ada duplikat
                jurusanSelect1.addEventListener('change', function() {
                    jurusanTerpilih[0] = this.value;
                    updateJurusanOptions(jurusanSelect2, jurusanTerpilih);
                    updateJurusanOptions(jurusanSelect3, jurusanTerpilih);
                });
                jurusanSelect2.addEventListener('change', function() {
                    jurusanTerpilih[1] = this.value;
                    updateJurusanOptions(jurusanSelect1, jurusanTerpilih);
                    updateJurusanOptions(jurusanSelect3, jurusanTerpilih);
                });
                jurusanSelect3.addEventListener('change', function() {
                    jurusanTerpilih[2] = this.value;
                    updateJurusanOptions(jurusanSelect1, jurusanTerpilih);
                    updateJurusanOptions(jurusanSelect2, jurusanTerpilih);
                });

                pilihanSekolahDiv.appendChild(document.createTextNode(' Jurusan 1: '));
                pilihanSekolahDiv.appendChild(jurusanSelect1);
                pilihanSekolahDiv.appendChild(document.createTextNode(' Jurusan 2: '));
                pilihanSekolahDiv.appendChild(jurusanSelect2);
                pilihanSekolahDiv.appendChild(document.createTextNode(' Jurusan 3: '));
                pilihanSekolahDiv.appendChild(jurusanSelect3);
                pilihanSekolahDiv.appendChild(document.createElement('br'));
                pilihanSekolahDiv.appendChild(document.createElement('br'));
            }
        }
    }

    // Fungsi untuk memperbarui pilihan jurusan berdasarkan jurusan yang sudah dipilih
    function updateJurusanOptions(selectElement, selectedJurusan) {
        const options = selectElement.options;
        for (let i = 0; i < options.length; i++) {
            if (selectedJurusan.includes(options[i].value) && options[i].value !== selectElement.value) {
                options[i].disabled = true;
            } else {
                options[i].disabled = false;
            }
        }
    }

    // Event listener untuk mengubah pilihan sekolah berdasarkan jenjang yang dipilih
    jenjangSelect.addEventListener('change', function() {
        buatPilihanSekolah(this.value);
    });

    // Panggil event change jenjangSelect saat halaman dimuat untuk pertama kali
    buatPilihanSekolah(jenjangSelect.value);
});