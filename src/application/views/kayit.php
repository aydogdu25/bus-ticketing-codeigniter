<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-xxl py-5">
        <div class="row gx-5">
            <div class="col-lg-5 mx-auto">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Kayıt Ol</h1>
                        <div class="row g-3">
                            <div class="col-12">
                                <form action="redirect" method="post">
                                    <input class="form-control border-0" style="height: 55px;"
                                        placeholder="TC Kimlik No/Pasaport No" type="text" id="tc" name="tc" required />
                            </div>
                            <div class="col-12 col-sm-6">
                                <input class="form-control border-0" style="height: 55px;" placeholder="İsim"
                                    type="text" id="ad" name="ad" required />
                            </div>
                            <div class="col-12 col-sm-6">
                                <input class="form-control border-0" style="height: 55px;" placeholder="Soyisim"
                                    type="text" id="soyad" name="soyad" required />
                            </div>
                            <div class="col-12 col-sm-6">
                                <input class="form-control border-0" style="height: 55px;" placeholder="Kullanıcı Adı"
                                    type="text" id="nick" name="nick" required />
                            </div>
                            <div class="col-12 col-sm-6">
                                <input class="form-control border-0" style="height: 55px;" placeholder="Şifre"
                                    type="password" id="sifre" name="sifre" required />
                            </div>
                            <div class="col-12 col-sm-6">
                                <select id="cinsiyet" name="cinsiyet" class="form-select border-0" style="height: 55px;"
                                    required>
                                    <option value="" selected disabled>Cinsiyet</option>
                                    <option value="erkek" name="erkek" >Erkek</option>
                                    <option value="kadin" name="kadin" >Kadın</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                            <input type="date" class="form-control border-0" name="dogum" style="height: 55px;" required/>
                                
                            </div>
                            <div class="col-12">
                                <input class="form-control border-0" style="height: 55px;" placeholder="E-Posta"
                                    type="email" id="email" name="email" required />
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-50 py-3" type="submit">Kaydol</button>
                            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>