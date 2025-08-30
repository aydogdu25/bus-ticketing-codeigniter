<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sefer Ekleme</h2><br>
                <h5>Sevgili Admin, Hoşgeldiniz </h5>

            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sefer Ekleme Paneli
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Sefer Ekleme İşlemi</h3>
                                <form role="form" action="seferEkle/sefer_ekle" method="post">
                                    <div class="form-group">
                                        <label>Kalkış Yeri</label>
                                        <select id="kalkis" name="kalkis" onchange="sehirKontrol()"
                                            class="form-control" required>
                                            <option>Kalkış Yeri Seçiniz</option>
                                            <option value="İstanbul">İstanbul</option>
                                            <option value="Ankara">Ankara</option>
                                            <option value="İzmır">İzmir</option>
                                            <option value="Antalya">Antalya</option>
                                            <option value="Erzurum">Erzurum</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Varış Yeri</label>
                                        <select id="varis" name="varis" class="form-control" required>
                                            <option>Varış Yeri Seçiniz</option>
                                            <option value="İstanbul">İstanbul</option>
                                            <option value="Ankara">Ankara</option>
                                            <option value="İzmır">İzmir</option>
                                            <option value="Antalya">Antalya</option>
                                            <option value="Erzurum">Erzurum</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Gidiş Tarihini Seçiniz: </label>
                                        <input type="datetime-local" name="tarih1" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Dönüş Tarihini Seçiniz: </label>
                                        <input type="datetime-local" name="tarih2" />
                                    </div>
                                    <div class="form-group">
                                        <label>Koltuk Tipi Seçiniz</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="koltukTip" id="koltukTip1" value="2+1"
                                                    checked />2+1
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="koltukTip" id="koltukTip2" value="2+2" />2+2
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ücreti Giriniz: </label>
                                        <input type="number" class="form-control" name="ucret" required/>
                                    </div>
                                    <button type="submit" class="btn btn-default">Sefer Ekle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function sehirKontrol() {
        var kalkis = document.getElementById("kalkis");
        var varis = document.getElementById("varis");
        
        var secilenKalkis = kalkis.options[kalkis.selectedIndex].value;
        
        for (var i = 0; i < varis.options.length; i++) {
            if (varis.options[i].value === secilenKalkis) {
                varis.options[i].style.display = "none";
            } else {
                varis.options[i].style.display = "block"; 
            }
        }
    }
</script>