            <div class="title-content text-center">
                <h3 class="title-w3l mb-5">FORM LOGIN </h3>
            </div>

            <div class="row contact-grids d-grid mt-12 pt-lg-12">
                <div class="col-md-12">
                    <form action="cek_login.php" method="post" class="">
                        <div class="input-grids">
                            <input type="text" name="username" id="" placeholder="Masukkan NISN" class="contact-input" required="" />
                            <input type="password" name="password" id="password" placeholder="Massukkan Tanggal Lahir (ddmmYYYY)" class="contact-input" required="" /><br>
                            * dd(Tanggal), mm(Bulan), YYYY(Tahun)<br>* Contoh Tanggal Lahir 1 Januari 2004, Masukkan 01012004<br>
                        </div><br>
                        <button type="button" id="tampil" onclick="showHide()" class="btn btn-sm btn-primary" value="Submit">Tampilkan Password</button>
                        <button type="button" id="hide" onclick="showHide()" class="btn btn-sm btn-primary" value="Submit">Sembunyikan Password</button>
                        <br><br>
                      	<div class="submit-w3l-button text-lg-right">
                            <button type="submit" value="masuk" name="masuk" class="btn btn-style btn-primary">MASUK</button>
                            <a href="daftar-akun"><button type="button" class="btn btn-style btn-warning">DAFTAR AKUN</button></a>
                        </div>
                    </form>
                </div>
                </div>
                