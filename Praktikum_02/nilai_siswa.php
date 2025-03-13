<?php
    // Variabel
    $proses = $_POST['proses'];
    $nama_siswa = $_POST['nama'];
    $mata_kuliah = $_POST['matkul'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_tugas = $_POST['nilai_tugas']; 

    // Masing masing persentase nilai
    $persentase_uts = 0.30;
    $persentase_uas = 0.35;
    $persentase_tugas = 0.35;

    // Menghitung nilai akhir
    $nilai_akhir = ($nilai_uts * $persentase_uts) + ($nilai_uas * $persentase_uas) + ($nilai_tugas * $persentase_tugas);

    // Menentukan status kelulusan
    $status = ($nilai_akhir > 55) ? "LULUS" : "TIDAK LULUS";

    // Menentukan Grade
    if ($nilai_akhir >= 85) {
        $grade = "A";
        $predikat = "Sangat Baik";
    } elseif ($nilai_akhir >= 70) {
        $grade = "B";
        $predikat = "Baik";
    } elseif ($nilai_akhir >= 60) {
        $grade = "C";
        $predikat = "Cukup";
    } elseif ($nilai_akhir >= 50) {
        $grade = "D";
        $predikat = "Kurang";
    } else {
        $grade = "E";
        $predikat = "Sangat Kurang";
    }

    // Menggunakan switch
    switch ($grade) {
        case 'A':
            $predikat = "Sangat Memuaskan";
            break;
        case 'B':
            $predikat = "Memuaskan";
            break;
        case 'C':
            $predikat = "Cukup";
            break;
        case 'D':
            $predikat = "Kurang";
            break;
        case 'E':
            $predikat = "Sangat Kurang";
            break;
        default:
            $predikat = "Tidak Ada";
            break;
    }    
    
    if (!empty($proses)) {
        echo '<br/>Nama : ' . $nama_siswa;
        echo '<br/>Mata Kuliah : ' . $mata_kuliah;
        echo '<br/>Nilai UTS : ' . $nilai_uts;
        echo '<br/>Nilai UAS : ' . $nilai_uas;
        echo '<br/>Nilai Tugas Praktikum : ' . $nilai_tugas;
        echo '<br/>Nilai Akhir : ' . $nilai_akhir;
        echo '<br/>Status : ' . $status;
        echo '<br/>Grade : ' . $grade;
        echo '<br/>Predikat : ' . $predikat;
    }
?>