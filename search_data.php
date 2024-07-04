$(document).ready(function() {
    fetchMonsters(currentPage); // Sayfa yüklendiğinde canavarları getir

    $('#searchForm').submit(function(event) {
        event.preventDefault(); // Formun submit işleminin varsayılan davranışını engelle
        let searchName = $('#searchName').val(); // Arama kutusundaki değeri al

        // AJAX isteği ile arama yap
        $.ajax({
            url: 'search_data.php', // Arama işlemini gerçekleştirecek PHP dosyasının yolu
            type: 'GET',
            data: { searchName: searchName }, // Arama terimini veri olarak gönder
            success: function(response) {
                let data = JSON.parse(response);
                let monsters = data.data;

                // Tabloyu temizle ve yeni verilerle doldur
                $('#monsterTable tbody').empty();
                monsters.forEach(function(monster) {
                    $('#monsterTable tbody').append(
                        `<tr>
                            <td>${monster.sindex}</td>
                            <td>${monster.strName}</td>
                            <td><input type="text" class="form-control" value="${monster.iItem01}" id="iItem01_${monster.sindex}"></td>
                            <td><input type="text" class="form-control" value="${monster.sPersent01}" id="sPersent01_${monster.sindex}"></td>
                            <!-- Diğer sütunlar buraya eklenecek -->
                            <td><button class="btn btn-primary btn-sm" onclick="updateMonster(${monster.sindex})">Güncelle</button></td>
                        </tr>`
                    );
                });

                // Sayfalama işlemleri için gerekli adımları burada da yapabilirsiniz
                // Örneğin, toplam sayfa sayısını yeniden hesaplayabilir ve sayfalama düğmelerini güncelleyebilirsiniz
            }
        });
    });
});
