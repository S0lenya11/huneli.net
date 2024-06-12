async function fetchLotteryResults() {
    const url = 'fetch_lottery_results.php'; // Update the path to your PHP script
    try {
        const response = await fetch(url);
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
