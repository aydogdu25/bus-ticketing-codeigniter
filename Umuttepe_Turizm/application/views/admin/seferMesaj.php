<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin Mesaj Görüntüleme Paneli</h2>
                <h5>Sevgili Admin Hoşgeldiniz. Kullanıcılarımızdan Gelen Mesaj Kayıtları Burada Tutulmaktadır.</h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i>
                        Mesajlar
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>İsim</th>
                                        <th>Email</th>
                                        <th>Mesaj Tipi</th>
                                        <th>Mesaj</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mesajlar as $mesaj) : ?>
                                        <tr>
                                            <td><?php echo $mesaj->kullanici_isim; ?></td>
                                            <td><?php echo $mesaj->kullanici_email; ?></td>
                                            <td><?php echo $mesaj->mesaj_tip; ?></td>
                                            <td><?php echo $mesaj->kullanici_mesaj; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
