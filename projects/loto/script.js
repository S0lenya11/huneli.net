async function fetchLotteryResults() {
    const url = 'https://www.millipiyangoonline.com/sayisal-loto/cekilis-sonuclari.61.2024';
    const proxyUrl = 'https://cors-anywhere.herokuapp.com/';

    try {
        const response = await fetch(proxyUrl + url);
        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.statusText}`);
        }
        const text = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(text, 'text/html');

        const winningNumbers = doc.querySelectorAll('.loto-numbers div');
        if (winningNumbers.length === 0) {
            throw new Error('No lottery numbers found. Check the selector.');
        }
        const numbers = Array.from(winningNumbers).map(num => num.textContent.trim());

        const numbersList = document.getElementById('numbers');
        numbersList.innerHTML = numbers.map(num => `<li>${num}</li>`).join('');
    } catch (error) {
        console.error('Error fetching lottery results:', error);
        document.getElementById('numbers').innerHTML = `<li>Error fetching lottery results. See console for details.</li>`;
    }
}

document.addEventListener('DOMContentLoaded', fetchLotteryResults);
