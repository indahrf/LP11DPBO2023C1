<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
    function getPasien()
    {
        // Query mysql select data pasien
        $query = "SELECT * FROM pasien";
        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function createPasien($data)
    {
        // Query mysql insert data pasien
        $query = "INSERT INTO pasien  VALUES ('', '$data[nik]', '$data[nama]', '$data[tempat]', '$data[tl]', '$data[gender]', '$data[email]', '$data[telp]')";
        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function updatePasien($data)
    {
        
        // Query mysql update data pasien
        $query = "UPDATE pasien SET nik = '$data[nik]', nama='$data[nama]', tempat='$data[tempat]', tl='$data[tl]', gender='$data[gender]', email='$data[email]', telp='$data[telp]' WHERE id=$data[id]";
        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function deletePasien($id)
    {
        // Query mysql delete data pasien
        $query = "DELETE FROM pasien WHERE id=$id";
        // Mengeksekusi query
        return $this->execute($query);
    }
}
