<style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
	<div class="card mb-5">
				
				<div class="card-header">
	<form id="routeForm">
					<input type="hidden" name="nereden" id="nereden" value="<?php echo $_POST['nereden']; ?>">
					<input type="hidden" name="nereye" id="nereye" value="<?php echo $_POST['nereye']; ?>">
				</form>
				<div id="map"></div><br><br>
	</div>
	</div>
<div class="container">
	<div class="row g-4">
		<div class="col-lg-12">
			<div class="card mb-5">
				
				<div class="card-header">
					<i class="fas fa-list"></i> Sefer Listesi
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<?php foreach ($seferler as $sefer): ?>
							<form id="infoform" action="<?php if ($this->session->userdata('login')) {
								echo 'odemeyap';
							} else {
								echo 'giris';
							} ?>" method="post">
								<table class="table table-bordered table-hover table-striped">
									<thead class="thead-dark">
										<tr>
											<th scope="col">Kalkış Noktası</th>
											<th scope="col">Varış Noktası</th>
											<th scope="col">Gidiş Tarihi</th>
											<th scope="col">Dönüş Tarihi</th>
											<th scope="col">Sefer Tipi</th>
											<th scope="col">Koltuk Tipi</th>
											<th>Ücret</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<?php echo $sefer['kalkis_yeri'] ?>
												<input type="hidden" name="kalkis_yeri"
													value="<?php echo $sefer['kalkis_yeri']; ?>">
											</td>
											<td>
												<?php echo $sefer['varis_yeri'] ?>
												<input type="hidden" name="varis_yeri"
													value="<?php echo $sefer['varis_yeri'] ?>">
											</td>
											<td>
												<?php echo substr($sefer['gidis_tarihi'], 0, 16); ?>
												<input type="hidden" name="gidis_tarihi"
													value="<?php echo substr($sefer['gidis_tarihi'], 0, 16); ?>">
											</td>

											<td>
												<?php echo ($sefer['donus_tarihi'] === '0000-00-00 00:00:00') ? '-' : substr($sefer['donus_tarihi'], 0, 16); ?>
												<input type="hidden" name="donus_tarihi"
													value="<?php echo ($sefer['donus_tarihi'] === '0000-00-00 00:00:00') ? '-' : substr($sefer['donus_tarihi'], 0, 16); ?>">
											</td>
											<td>
												<?php echo $sefer['sefer_tipi'] ?>
												<input type="hidden" name="sefer_tipi"
													value="<?php echo $sefer['sefer_tipi'] ?>">
											</td>
											<td>
												<?php echo $sefer['koltuk_tipi'] ?>
												<input type="hidden" name="koltuk_tipi"
													value="<?php echo $sefer['koltuk_tipi'] ?>">
											</td>
											<td>
												<?php echo $sefer['ucret'] ?> ₺
												<input type="hidden" name="ucret" value="<?php echo $sefer['ucret'] ?>">
												<input type="hidden" name="uye_id"
													value="<?php echo $this->session->userdata('uye_id'); ?>">
												<input type="hidden" name="sefer_id"
													value="<?php echo $sefer['sefer_id']; ?>">
												<input type="hidden" name="plaka" value="<?php echo $sefer['plaka']; ?>">
												<input type="hidden" name="secilen_koltuk" id="secilen_koltuk" value="">
											</td>
										</tr>
									</tbody>
								</table>
								<?php
								$koltuk = $sefer['koltuk_tipi'];
								if ($koltuk == "2+1") {
									include ("2+1.php");
								} else {
									include ("2+2.php");
								}
								?>
								<?php foreach ($sefer['koltuklar'] as $koltuk): ?>

									<label class="mor-koltuk" style="display: none;">
										<input type="checkbox" name="seat" value="<?php echo $koltuk; ?>"
											style="display: none;">
										<?php echo $koltuk; ?>
									</label>
								<?php endforeach; ?>

							<?php endforeach; ?>
					</div>
					<button type="button" class="koltuksecbutonu btn btn-secondary w-20 py-2 seat-button">Koltuğu
						Seç</button>
					<a href="biletAra" class="btn btn-primary py-2">Geri Dön</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<script>
	document.addEventListener("DOMContentLoaded", function () {
		document.querySelectorAll(".koltuksecbutonu").forEach(function (button) {
			button.addEventListener("click", function () {
				var secilenKoltuk = document.querySelector('input[name="seat"]:checked');
				if (secilenKoltuk) {
					var secilenKoltukNumarasi = secilenKoltuk.value;

					var gizliInput = document.createElement("input");
					gizliInput.setAttribute("type", "hidden");
					gizliInput.setAttribute("name", "secilen_koltuk");
					gizliInput.setAttribute("value", secilenKoltukNumarasi);
					document.getElementById("infoform").appendChild(gizliInput);

					document.getElementById("infoform").submit();

					alert("Koltuk seçilmiştir. Seçilen Koltuk Numarası: " + secilenKoltukNumarasi);
				} else {
					alert("Lütfen bir koltuk seçiniz.");
				}
			});
		});
	});
	document.addEventListener("DOMContentLoaded", function () {
		document.querySelectorAll(".mor-koltuk").forEach(function (koltuk) {
			koltuk.style.color = "red";
			var koltukNo = koltuk.textContent.trim();
			var koltukElement = document.querySelector('.seat input[value="' + koltukNo + '"]');
			if (koltukElement) {
				koltukElement.parentElement.style.backgroundColor = "brown";
				koltukElement.parentElement.addEventListener("click", function () {
					if (koltukElement.checked) {
						alert("Bu koltuk daha önce satın alındı!");
						location.reload();
					} else {
						koltukElement.checked = true;
					}
				});
			}

		});
	});
</script>
<script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 39.92077, lng: 32.85411 }, // Türkiye merkez koordinatları
                zoom: 7,
            });

            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
            });

            // Post edilen verileri kullanarak rota çiz
            const origin = document.getElementById("nereden").value;
            const destination = document.getElementById("nereye").value;

            directionsService.route(
                {
                    origin: origin,
                    destination: destination,
                    travelMode: google.maps.TravelMode.DRIVING,
                },
                (response, status) => {
                    if (status === "OK") {
                        directionsRenderer.setDirections(response);
                    } else {
                        window.alert("Rota hesaplanırken bir hata oluştu: " + status);
                    }
                }
            );
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=places" async defer></script>