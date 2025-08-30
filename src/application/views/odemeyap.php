<style>
    .card-image {
    max-width: 300px; 
    height: auto;
}

    </style>
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
                    <form action="payment" method="post" >
                    <tbody>
                        <tr>
                            <th scope="row">Kalkış</th>
                            <td><?php echo $_POST['kalkis_yeri']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Varış</th>
                            <td><?php echo $_POST['varis_yeri']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Gidiş Tarihi</th>
                            <td><?php echo $_POST['gidis_tarihi']; ?></td>
                            <input type="hidden" name="gidis_tarihi" value="<?php echo substr($_POST['gidis_tarihi'], 0, 16); ?>">
                        </tr>
                        <tr>
                            <th scope="row">Dönüş Tarihi</th>
                            <td><?php echo ($_POST['donus_tarihi'] === '0000-00-00 00:00:00')? '-' : substr($_POST['donus_tarihi'], 0, 16); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Sefer Tipi</th>
                            <td><?php echo $_POST['sefer_tipi'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Koltuk Tipi</th>
                            <td><?php echo $_POST['koltuk_tipi'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Koltuk Numarası</th>
                            <td><?php echo $_POST['secilen_koltuk'] ?></td>
                            <input type="hidden" name="secilen_koltuk" id="secilen_koltuk" value="<?php echo $_POST['secilen_koltuk'] ?>">
                        </tr>
                        <tr>
                            <th scope="row">Ücret</th>
                            <td><?php echo $_POST['ucret'] ?> ₺</td>
                            <input type="hidden" id="ucret" value="<?php echo $_POST['ucret']; ?>">
                            <input type="hidden" name="sefer_id" value="<?php echo $_POST['sefer_id']; ?>">
                            <input type="hidden" name="uye_id" value="<?php echo $this->session->userdata('uye_id'); ?>">
                            <input type="hidden" name="plaka" value="<?php echo $_POST['plaka']; ?>">
                        </tr>
                        <tr>
                            <th scope="row">Özel Durum</th>
                            <td>
                            <select id="ozelDurum" onchange="hesaplaIndirim()">
                                    <option value="0" selected>Hiçbiri</option>
                                    <option value="0.2">Öğrenci</option>
                                    <option value="0.1">Memur</option>
                                    <option value="0.15">65 Yaş Üstü</option>
                                </select>
                            </td>
                        </tr>   
                        <tr>
                            <th scope="row">Ödenecek Miktar</th>
                            <td id="odenecekMiktar"></td>
                            <td><button type="submit" class="btn btn-primary btn-block">Ödeme Yap</button></td>
                        </tr>
                    </tbody>
</form>
                </table>
            </fieldset>
        
        <!-- <div class="col-md-4">
            <fieldset>
                <legend>Ödeme Bilgileri</legend>
                <div class="form-group">
                    <label for="card-number">Kart Numarası</label>
                    <input type="text" class="form-control" id="card-number" placeholder="Kart Numaranızı Girin"
                        required>
                </div>
                <div>
                    <img class="accepted card-image"
                        src="https://s3.eu-central-1.amazonaws.com/static.obilet.com/images/web/cards-782.png"
                        alt="Visa, MasterCard, American Express, Maestro, Visa Electron">
                </div>

                <div class="form-group">
                <br><label for="expiry-date">Son Kullanma Tarihi</label>
                    <input type="text" class="form-control" id="expiry-date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                <br><label for="cvc">CVC</label>
                    <input type="text" class="form-control" id="cvc" placeholder="Güvenlik Kodu" required>
                </div>
                <div class="form-group">
                <br><label for="amount">Ödenecek Tutar</label>
                    <input type="text" class="form-control" id="amount" placeholder="Ödenecek Tutarı Girin" required>
                </div>
                <br><button type="submit" class="btn btn-primary btn-block">Ödeme Yap</button>
            </fieldset>
        </div> -->
    </div>
</div>
</div>
<script>
    function hesaplaIndirim() {
        var ucret = parseFloat(document.getElementById('ucret').value);
        var indirimOrani = parseFloat(document.getElementById('ozelDurum').value);

        var indirimMiktari = ucret * indirimOrani;
        var odenecekMiktar = ucret - indirimMiktari;

        document.getElementById('odenecekMiktar').innerHTML = odenecekMiktar + " ₺";
    }
</script>   