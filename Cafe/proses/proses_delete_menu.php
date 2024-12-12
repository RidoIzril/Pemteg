<?php
session_start();
include "connect.php";
$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";
$foto = isset($_POST['foto']) ? htmlentities($_POST['foto']) : "";

if (!empty($_POST['input_user_validate'])) {
    mysqli_begin_transaction($conn);

    try {
        // Hapus entri terkait di tb_list_order
        $deleteRelated = mysqli_query($conn, "DELETE FROM tb_list_order WHERE menu = '$id'");
        
        if ($deleteRelated) {
            // Hapus dari tb_daftar_menu
            $deleteMenu = mysqli_query($conn, "DELETE FROM tb_daftar_menu WHERE id = '$id'");

            if ($deleteMenu) {
                // Hapus file foto jika penghapusan dari database berhasil
                if (unlink("../assets/img/daftar_menu/$foto")) {
                    // Commit transaksi jika semua operasi berhasil
                    mysqli_commit($conn);
                    $message = '<script>alert("Menu berhasil dihapus");
                                window.location="../menu"</script>';
                } else {
                    // Rollback transaksi jika penghapusan file gagal
                    mysqli_rollback($conn);
                    $message = '<script>alert("Menu gagal dihapus karena file tidak bisa dihapus");
                                window.location="../menu"</script>';
                }
            } else {
                // Rollback transaksi jika penghapusan dari tb_daftar_menu gagal
                mysqli_rollback($conn);
                $message = '<script>alert("Menu gagal dihapus dari database");
                            window.location="../menu"</script>';
            }
        } else {
            // Rollback transaksi jika penghapusan entri terkait gagal
            mysqli_rollback($conn);
            $message = '<script>alert("Gagal menghapus entri terkait dari tb_list_order");
                        window.location="../menu"</script>';
        }
    } catch (Exception $e) {
        // Rollback transaksi jika ada kesalahan
        mysqli_rollback($conn);
        $message = '<script>alert("Terjadi kesalahan: ' . $e->getMessage() . '");
                    window.location="../menu"</script>';
    }
} else {
    $message = '<script>alert("Input tidak valid");
                window.location="../menu"</script>';
}

echo $message;
?>
