async function fetchLotteryResults() {
    const url = 'https://www.millipiyangoonline.com/sayisal-loto/cekilis-sonuclari.61.2024';
    const proxyUrl = 'https://cors-anywhere.herokuapp.com/';

    try {
        const response = await fetch(proxyUrl + url);
        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.statusText}`);
        }
        const text = await response.text();
        console.log(text); // Log the fetched HTML to check its structure
        const parser = new DOMParser();
        const doc = parser.parseFromString(text, 'text/html');

        const winningNumbers = doc.querySelectorAll('.loto-numbers div');
        console.log(winningNumbers); // Log the selected elements to check if they are correct
        if (winningNumbers.length === 0) {
            throw new Error('No lottery numbers found. Check the selector.');
        }
        const numbers = Array.from(winningNumbers).map(num => num.textContent.trim());
        console.log(numbers); // Log the extracted numbers to check if they are correct

        const numbersContainer = document.querySelector('.numbers-container');
        numbersContainer.innerHTML = `
            <h2>Kazanan Numaralar</h2>
            <div class="loto-numbers red-loto">${numbers.map(num => `<div>${num}</div>`).join('')}</div>`;
    } catch (error) {
        console.error('Error fetching lottery results:', error);
        const numbersContainer = document.querySelector('.numbers-container');
        numbersContainer.innerHTML = `<h2>Error fetching lottery results. See console for details.</h2>`;
    }
}

document.addEventListener('DOMContentLoaded', fetchLotteryResults);
