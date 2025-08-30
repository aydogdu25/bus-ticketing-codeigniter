<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sefer Görüntüleme Ekranı</h2><br>
                <h5>Aşağıdaki tabloda tüm seferler listelenmektedir.</h5>

            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tüm Seferler
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" id="searchInput" class="form-control" placeholder="Sefer Ara"><br>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kalkış</th>
                                        <th>Varış</th>
                                        <th>Gidiş Tarih</th>
                                        <th>Dönüş Tarih</th>
                                        <th>Sefer Tipi</th>
                                        <th>Koltuk Tipi</th>
                                        <th>Ücret</th>
                                        <th>Düzenle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($seferler as $sefer): ?>
                                        <tr>
                                            <td>
                                                <?php echo $sefer['sefer_id']; ?>
                                            </td>
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
                                            <td>
                                                <?php echo $sefer['ucret']; ?> ₺
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="silSefer(<?php echo $sefer['sefer_id']; ?>)">Sefer Sil</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            function silSefer(sefer_id) {
                if (confirm("Bu seferi silmek istediğinizden emin misiniz?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "<?php echo base_url('SeferDuzenle/silSefer/'); ?>" + sefer_id, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            window.location.reload();
                        }
                    };
                    xhr.send();
                }
            }
            
            function searchTable() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("dataTables-example");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1]; 
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

            document.getElementById("searchInput").addEventListener("input", searchTable);
        </script>