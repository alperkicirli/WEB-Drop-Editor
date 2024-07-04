<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knight Online Drop Editör</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
        }
        .table-container {
            max-height: 500px;
            overflow-y: auto;
        }
        #pagination {
            flex-wrap: wrap;
            justify-content: center;
        }
        .pagination li {
            margin: 2px;
            font-size: 14px;
        }
        .pagination a {
            padding: 6px 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Canavar Listesi</h1>
        <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Canavar İsmi ile Ara">
        </div>
        <div class="table-container">
            <table id="monsterTable" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Canavar İsmi</th>
                        <th scope="col">Item 01</th>
                        <th scope="col">Percent 01</th>
                        <th scope="col">Item 02</th>
                        <th scope="col">Percent 02</th>
                        <th scope="col">Item 03</th>
                        <th scope="col">Percent 03</th>
                        <th scope="col">Item 04</th>
                        <th scope="col">Percent 04</th>
                        <th scope="col">Item 05</th>
                        <th scope="col">Percent 05</th>
                        <th scope="col">Item 06</th>
                        <th scope="col">Percent 06</th>
                        <th scope="col">Item 07</th>
                        <th scope="col">Percent 07</th>
                        <th scope="col">Item 08</th>
                        <th scope="col">Percent 08</th>
                        <th scope="col">Item 09</th>
                        <th scope="col">Percent 09</th>
                        <th scope="col">Item 10</th>
                        <th scope="col">Percent 10</th>
                        <th scope="col">Item 11</th>
                        <th scope="col">Percent 11</th>
                        <th scope="col">Item 12</th>
                        <th scope="col">Percent 12</th>
                        <th scope="col">Güncelle</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <nav aria-label="Page navigation">
            <ul id="pagination" class="pagination pagination-sm justify-content-center flex-wrap"></ul>
        </nav>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let currentPage = 1;

        function fetchMonsters(page, searchQuery = '') {
            $.ajax({
                url: 'fetch_data.php',
                type: 'GET',
                data: { page: page, search: searchQuery },
                success: function(response) {
                    let data = JSON.parse(response);
                    let monsters = data.data;
                    let totalRecords = data.total;
                    let recordsPerPage = data.records_per_page;
                    let totalPages = Math.ceil(totalRecords / recordsPerPage);

                    $('#monsterTable tbody').empty();
                    monsters.forEach(function(monster) {
                        $('#monsterTable tbody').append(
                            `<tr>
                                <td>${monster.sindex}</td>
                                <td>${monster.strName}</td>
                                <td><input type="text" class="form-control" value="${monster.iItem01}" id="iItem01_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent01}" id="sPersent01_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem02}" id="iItem02_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent02}" id="sPersent02_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem03}" id="iItem03_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent03}" id="sPersent03_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem04}" id="iItem04_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent04}" id="sPersent04_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem05}" id="iItem05_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent05}" id="sPersent05_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem06}" id="iItem06_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent06}" id="sPersent06_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem07}" id="iItem07_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent07}" id="sPersent07_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem08}" id="iItem08_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent08}" id="sPersent08_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem09}" id="iItem09_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent09}" id="sPersent09_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem10}" id="iItem10_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent10}" id="sPersent10_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem11}" id="iItem11_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent11}" id="sPersent11_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.iItem12}" id="iItem12_${monster.sindex}"></td>
                                <td><input type="text" class="form-control" value="${monster.sPersent12}" id="sPersent12_${monster.sindex}"></td>
                                <td><button class="btn btn-primary btn-sm" onclick="updateMonster(${monster.sindex})">Güncelle</button></td>
                            </tr>`
                        );
                    });

                    let paginationHtml = '';
                    for (let i = 1; i <= totalPages; i++) {
                        paginationHtml += `<li class="page-item"><button class="page-link" onclick="fetchMonsters(${i}, '${searchQuery}')">${i}</button></li>`;
                    }
                    $('#pagination').html(paginationHtml);
                }
            });
        }
		
		$(document).ready(function() {
    $('#searchInput').keyup(function() {
        let searchQuery = $(this).val().toLowerCase().trim(); // Arama sorgusunu küçük harfe dönüştürün ve boşlukları kaldırın
        fetchMonsters(currentPage, searchQuery); // Arama sorgusuyla birlikte fetchMonsters işlevini çağırın
    });

    fetchMonsters(currentPage); // Sayfa yüklendiğinde tüm canavarları getir
});

        function updateMonster(sindex) {
            let data = {
                sindex: sindex,
                iItem01: $(`#iItem01_${sindex}`).val(),
                sPersent01: $(`#sPersent01_${sindex}`).val(),
                iItem02: $(`#iItem02_${sindex}`).val(),
                sPersent02: $(`#sPersent02_${sindex}`).val(),
                iItem03: $(`#iItem03_${sindex}`).val(),
                sPersent03: $(`#sPersent03_${sindex}`).val(),
                iItem04: $(`#iItem04_${sindex}`).val(),
                sPersent04: $(`#sPersent04_${sindex}`).val(),
                iItem05: $(`#iItem05_${sindex}`).val(),
                sPersent05: $(`#sPersent05_${sindex}`).val(),
                iItem06: $(`#iItem06_${sindex}`).val(),
                sPersent06: $(`#sPersent06_${sindex}`).val(),
                iItem07: $(`#iItem07_${sindex}`).val(),
                sPersent07: $(`#sPersent07_${sindex}`).val(),
                iItem08: $(`#iItem08_${sindex}`).val(),
                sPersent08: $(`#sPersent08_${sindex}`).val(),
                iItem09: $(`#iItem09_${sindex}`).val(),
                sPersent09: $(`#sPersent09_${sindex}`).val(),
                iItem10: $(`#iItem10_${sindex}`).val(),
                sPersent10: $(`#sPersent10_${sindex}`).val(),
                iItem11: $(`#iItem11_${sindex}`).val(),
                sPersent11: $(`#sPersent11_${sindex}`).val(),
                iItem12: $(`#iItem12_${sindex}`).val(),
                sPersent12: $(`#sPersent12_${sindex}`).val()
            };

            $.ajax({
                url: 'update_data.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                    fetchMonsters(currentPage);
                }
            });
        }
    </script>
</body>
</html>
