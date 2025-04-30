
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru</title>
    
</head>
<body>
    <h1>Pendaftaran Siswa Baru</h1>
    <form action="process.php" method="POST">
        <label for="name">Nama Siswa:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="school1">Pilih Sekolah 1:</label>
        <select id="school1" name="school1" onchange="updateSchoolOptions()" required></select><br><br>

        <label for="school2">Pilih Sekolah 2:</label>
        <select id="school2" name="school2" onchange="updateSchoolOptions()" required></select><br><br>

        <label for="school3">Pilih Sekolah 3:</label>
        <select id="school3" name="school3" onchange="updateSchoolOptions()" required></select><br><br>

        <input type="submit" value="Daftar">
    </form>
</body>
<script>
        const schools = [];

        function updateSchoolOptions() {
            const selectedSchools = [
                document.getElementById("school1").value,
                document.getElementById("school2").value,
                document.getElementById("school3").value
            ];

            const schoolSelects = [document.getElementById("school1"), document.getElementById("school2"), document.getElementById("school3")];

            schoolSelects.forEach(select => {
                select.innerHTML = "";
                const defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.text = "Pilih Sekolah";
                select.add(defaultOption);

                schools.forEach(school => {
                    if (!selectedSchools.includes(school.nama_sekolah)) {
                        const option = document.createElement("option");
                        option.value = school.nama_sekolah;
                        option.text = school.nama_sekolah;
                        select.add(option);
                    }
                });
            });
        }

        window.onload = function() {
            fetch('tes.php')
                .then(response => response.json())
                .then(data => {
                    schools.push(...data);
                    updateSchoolOptions();
                });
        };
    </script>
</html>