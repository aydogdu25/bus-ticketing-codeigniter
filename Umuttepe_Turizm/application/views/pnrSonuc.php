<div class="container mt-5">
    <div class="row">
        <fieldset>
            <div class="image-divider d-flex align-items-center">
                <img src="assets/frontend/img/logo.png" alt="Resim">
                <h3 class="ml-3 mb-0">Umuttepe Turizm</h3>
                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <h4 class="text-muted mb-0">Sefer Bilgileri</h4>
            <hr>
            <table class="table">
                <tbody>
                        <?php foreach ($PnrSonuc as $bilet): ?>
                            <tr>
                                <th scope="row">Kalkış</th>
                                <td><?php echo $bilet['kalkis_yeri']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Varış</th>
                                <td><?php echo $bilet['varis_yeri']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Adı</th>
                                <td><?php echo $bilet['ad']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Soyadı</th>
                                <td><?php echo $bilet['soyad']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Koltuk Numarası</th>
                                <td><?php echo $bilet['koltuk_no']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
            <a href="biletSor" class="btn btn-primary btn-block">Geri Dön</a>
        </fieldset>
    </div>
</div>
