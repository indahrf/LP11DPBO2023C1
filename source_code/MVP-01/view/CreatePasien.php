<?php

class CreatePasien
{
    private $prosespasien;
    private $tpl;

    function __construct()
    {
        $this->prosespasien = new ProsesPasien();
    }

    function tampilForm()
    {
        $this->prosespasien->prosesDataPasien();
        $data = null;

        if (isset($_GET['id'])) {
            $id = $_GET['id'] - 2;
            

                $this->prosespasien->prosesDataPasien();
                $idp = $this->prosespasien->getId($id);
                $nik = $this->prosespasien->getNik($id);
                $nama = $this->prosespasien->getNama($id);
                $tempat = $this->prosespasien->getTempat($id);
                $tl = $this->prosespasien->getTl($id);
                $gender = $this->prosespasien->getGender($id);
                $email = $this->prosespasien->getEmail($id);
                $telp = $this->prosespasien->getTelp($id);

                $form = "
                    <form action='create.php?update=$idp' method='POST' class='form-input'>
                        <input type='hidden' name='id' value='$idp'>
                        <label>NIK:</label>
                        <input type='text' name='nik' value='$nik'><br>
                        <label>Nama:</label>
                        <input type='text' name='nama' value='$nama'><br>
                        <label>Tempat Lahir:</label>
                        <input type='text' name='tempat' value='$tempat'><br>
                        <label>Tanggal Lahir:</label>
                        <input type='text' name='tl' value='$tl'><br>
                        <label>Gender:</label>
                        <input type='text' name='gender' value='$gender'><br>
                        <label>E-mail:</label>
                        <input type='text' name='email' value='$email'><br>
                        <label>No Telepon:</label>
                        <input type='text' name='telp' value='$telp'><br>
                        <button type='submit' class='btn btn-primary' name='update'>Update</button>
                    </form>
                ";

                $data .= "<tr>
                    <td colspan='9'>$form</td>
                </tr>";
        } else {
            $form = "
                <form action='create.php?add' method='POST' class='form-input'>
                    <label>NIK:</label>
                    <input type='text' name='nik'><br>
                    <label>Nama:</label>
                    <input type='text' name='nama'><br>
                    <label>Tempat Lahir:</label>
                    <input type='text' name='tempat'><br>
                    <label>Tanggal Lahir:</label>
                    <input type='text' name='tl'><br>
                    <label>Gender:</label>
                    <input type='text' name='gender'><br>
                    <label>E-mail:</label>
                    <input type='text' name='email'><br>
                    <label>Telepon:</label>
                    <input type='text' name='telp'><br>
                    <button type='submit' class='btn btn-primary' name='create'>Create</button>
                </form>
            ";

            $data .= "<tr>
                <td colspan='9'>$form</td>
            </tr>";
        }

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin2.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan ke layar
        $this->tpl->write();
    }
    

    function create()
    {
        $datapasien = array(
            'nik' => $_POST['nik'],
            'nama' => $_POST['nama'],
            'tempat' => $_POST['tempat'],
            'tl' => $_POST['tl'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'telp' => $_POST['telp']
        );

        $this->prosespasien->createPasien($datapasien);
    }

    function update($id)
    {
        $datapasien = array(
            'id' => $_POST['id'],
            'nik' => $_POST['nik'],
            'nama' => $_POST['nama'],
            'tempat' => $_POST['tempat'],
            'tl' => $_POST['tl'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'telp' => $_POST['telp']
        );

        $this->prosespasien->updatePasien($datapasien, $id);
    }
}
