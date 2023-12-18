async function checkProduction() {
    var brandName = document.getElementById('brandInput').value;
    var resultElement = document.getElementById('result');

    try {
        // Здесь используем Open Product Data API для получения информации
        var response = await fetch(https://api.op-en.se/?query=${brandName});
        var data = await response.json();

        // Пример: проверяем, что получили информацию и выводим результат
        if (data && data.products && data.products.length > 0) {
            var manufacturer = data.products[0].manufacturer;
            resultElement.innerText = Бренд "${brandName}" произведен компанией ${manufacturer}.;
        } else {
            resultElement.innerText = Информация о производителе бренда "${brandName}" не найдена.;
        }
    } catch (error) {
        console.error('Ошибка при запросе API:', error);
        resultElement.innerText = 'Ошибка при запросе информации о производителе.';
    }
}
