<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-xxl py-5">
        <div class="row gx-5">
            <div class="col-lg-6" style="margin: 0 auto;">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Bilet Ara</h1>
                    <form action="sefer" method="post">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <select id="nereden" name="nereden" class="form-select border-0" required
                                    style="height: 55px" ; onchange="sehirKontrol()">
                                    <option value="" selected disabled="" onchange="sehirKontrol()">Nereden</option>
                                    <option value="İstanbul"> İSTANBUL </option>
                                    <option value="Ankara">ANKARA</option>
                                    <option value="İzmir">İZMİR</option>
                                    <option value="Antalya">ANTALYA</option>
                                    <option value="Erzurum">ERZURUM</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <select id="nereye" name="nereye" class="form-select border-0" style="height: 55px;"
                                    required>
                                    <option value="" selected disabled>Nereye</option>
                                    <option value="İstanbul"> İSTANBUL </option>
                                    <option value="Ankara">ANKARA</option>
                                    <option value="İzmir">İZMİR</option>
                                    <option value="Antalya">ANTALYA</option>
                                    <option value="Erzurum">ERZURUM</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                            <input type="date" class="form-control border-0" name="tarih" style="height: 55px;" required/>
                            </div>
                            <div class="col-12 col-sm-6" style="color:white;">
                                <input type="radio" id="tek" value="tek" name="asal" required>
                                <label for="tek">Tek Yön</label>&nbsp&nbsp&nbsp&nbsp
                                <input type="radio" id="cift" value="cift" name="asal" required>
                                <label for="cift">Gidiş-Dönüş</label>

                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-50 py-3" type="submit">Bilet Ara</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>