<?php if($this->session->flashdata('BiletBulunamadi')): ?>
    <div class="alert alert-danger mt-3" role="alert">
        Belirtilen PNR koduna ait bilet bulunamadı.
    </div>
<?php endif; ?>

<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-xxl py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mx-auto">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Bilet Sorgula</h1>
                    <div class="row g-3">
                        <div class="col-12 ">
                            <form action="BiletSor/pnr_sor" method="post">
                                <input class="form-control border-0" style="height: 55px;"
                                    placeholder="PNR Kodunu Giriniz" type="text" id="pnr" name="pnr" />
                        </div>
                        <div class="col-12">
                            <button class="btn btn-secondary w-50 py-3" type="submit">Bilet Sorgula</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
