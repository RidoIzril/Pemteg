<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username= '$_SESSION[username_cafe]'");
$records = mysqli_fetch_array($query);
?>
<nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
    <div class="container-lg">
        <a class="navbar-brand" href="."><i class="bi bi-cup-hot-fill"></i>SIP</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $hasil['username']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-4">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalUbahProfil"><i class="bi bi-person-circle"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalUbahPassword"><i class=" bi bi-key-fill"></i> Ubah
                                Password</a></li>
                        <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Ubah Password -->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input required disabled type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="username"
                                    value="<?php echo $_SESSION['username_cafe'] ?>">
                                <label for="floatingInput">Username</label>
                                <div class="invalid-feedback">
                                    Masukan Username.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input required type="password" class="form-control" id="floatingInput"
                                    name="passwordlama">
                                <label for="floatingInput">Password</label>
                                <div class="invalid-feedback">
                                    Masukkan Password Lama.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input required type="password" class="form-control" id="floatingInput"
                                    name="passwordbaru">
                                <label for="floatingInput">Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukan Password Baru.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input required type="password" class="form-control" id="floatingInput"
                                    name="repasswordbaru">
                                <label for="floatingInput">Ulangi Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukkan Ulangi Password Baru.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Ubah Password-->

<!-- Modal Ubah Profil -->
<div class="modal fade" id="ModalUbahProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_profile.php" method="POST">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input required disabled type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="username"
                                    value="<?php echo $_SESSION['username_cafe'] ?>">
                                <label for="floatingInput">Username</label>
                                <div class="invalid-feedback">
                                    Masukan Username.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input required type="text" class="form-control" id="floatingNama" name="nama"
                                    value="<?php echo $records['nama'] ?>">
                                <label for="floatingInput">Nama</label>
                                <div class="invalid-feedback">
                                    Masukkan Nama Anda.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input required type="number" class="form-control" id="floatingInput" name="nohp"
                                    value="<?php echo $records['nohp'] ?>">
                                <label for="floatingInput">Nomor HP</label>
                                <div class="invalid-feedback">
                                    Masukan Nomor HP Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="" style="height:100px"
                                    name="alamat"> value="<?php echo $records['alamat'] ?>"</textarea>
                                <label for="floatingInput">Alamat</label>
                                <div class="invalid-feedback">
                                    Masukkan Alamat Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_profile_validate" value="12345">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Ubah Profil -->