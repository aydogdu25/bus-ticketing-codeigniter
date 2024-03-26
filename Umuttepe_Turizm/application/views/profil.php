<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <h1 style="text-align: center;">Hesabım</h1>
            <?php $isim = $this->session->userdata('ad'); ?>
            <h4>Merhaba, <?php echo $isim ?></h4>
            <h4>Bakiyeniz: <?php echo $bakiye; ?> ₺</h4>
            <h4>Biletlerim: </h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Kalkış Yeri</th>
                            <th>Varış Yeri</th>
                            <th>Gidiş Tarihi</th>
                            <th>Dönüş Tarihi</th>
                            <th>Sefer Tipi</th>
                            <th>Koltuk Tipi</th>
                            <th>Koltuk Numarası</th>
                            <th>Ücret</th>
                            <th>PNR Kod</th>
                            <th>İşlem</th>
                            <th>QR Butonu</th>
                            <th>QR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($biletler as $bilet) : ?>
                            <tr>
                                <?php foreach ($seferler as $sefer) : ?>
                                    <?php if ($sefer['sefer_id'] == $bilet['sefer_id']) : ?>
                                        <td>
                                            <?php echo $sefer['kalkis_yeri']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sefer['varis_yeri']; ?>
                                        </td>
                                        <td>
                                            <?php echo substr($sefer['gidis_tarihi'], 0, 16); ?>
                                        </td>
                                        <td>
                                            <?php echo ($sefer['donus_tarihi'] === '0000-00-00 00:00:00') ? '-' : substr($sefer['donus_tarihi'], 0, 16); ?>
                                        </td>
                                        <td>
                                            <?php echo $sefer['sefer_tipi']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sefer['koltuk_tipi']; ?>
                                        </td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <td>
                                    <?php echo $bilet['koltuk_no'] ?>
                                </td>
                                <td>
                                    <?php echo $sefer['ucret'] ?>
                                </td>
                                <td>
                                    <?php echo $bilet['pnr_kod']; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="acigaAl(<?php echo $bilet['bilet_id']; ?>)">Açığa Al</button>
                                </td>
                                <td>
                                <button type="button" class="btn btn-secondary" onclick="qrKodOlustur(<?php echo $bilet['bilet_id']; ?>)">QR Kod Oluştur</button>

                                </td>
                                <td>
                                <img src="<?php echo base_url('qr_codes/qr_' . $bilet['bilet_id'] . '.png'); ?>" alt="">


                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function acigaAl(bilet_id) {
        if (confirm("Bu bilet açığa alınsın mı?")) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('profil/aciga_al'); ?>',
                data: {
                    bilet_id: bilet_id
                },
                success: function(data) {
                    alert('Bilet başarıyla açığa alındı.');
                    location.reload(); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Bir hata oluştu, lütfen tekrar deneyin.');
                }
            });
        }
    }

    function qrKodOlustur(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('profil/qr_kod_olustur'); ?>/' + id,
            success: function(data) {
                alert('QR Kod oluşturuldu');
                location.reload(); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Bir hata oluştu, lütfen tekrar deneyin.');
            }
        });
    }

</script>