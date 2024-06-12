from flask import Flask, render_template
import requests
from bs4 import BeautifulSoup

app = Flask(__name__)

def get_lottery_results():
    url = "https://www.millipiyangoonline.com/sayisal-loto/cekilis-sonuclari.61.2024"
    response = requests.get(url)
    soup = BeautifulSoup(response.text, 'html.parser')
    
    # Adjust the selector to match the actual HTML structure
    winning_numbers = soup.select('.winning-number-class')  
    numbers = [num.text for num in winning_numbers]
    
    return numbers

@app.route('/')
def home():
    numbers = get_lottery_results()
    return render_template('index.html', numbers=numbers)

if __name__ == '__main__':
    app.run(debug=True)
