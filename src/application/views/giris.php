<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-xxl py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mx-auto">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Giriş Yap</h1>
                    <div class="row g-3">
                        <form action="giris" method="post">
                            <div class="col-12 col-sm-6 mx-auto">

                                <input class="form-control border-0" style="height: 55px;" placeholder="Kullanıcı Adı"
                                    type="text" id="nick" name="nick" /><br>
                                <input class="form-control border-0" style="height: 55px;" placeholder="Şifre"
                                    type="password" id="sifre" name="sifre" />
                            </div>
                            <div class="col-12">
                                <br><button class="btn btn-secondary w-50 py-3" type="submit">Giriş</button>
                            </div>
                        </form>
                        <?php if(isset($error_message)) { ?>
                <div style="color: white;"><br><?php echo $error_message; ?></div>
            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>