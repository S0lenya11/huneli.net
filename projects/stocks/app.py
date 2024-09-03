from flask import Flask, request, jsonify, render_template
import numpy as np
import pandas as pd
import yfinance as yf
import matplotlib.pyplot as plt
from datetime import datetime
import io
import base64

app = Flask(__name__)

# List of Borsa Istanbul tickers
bist_tickers = [
    'GARAN.IS', 'ASELS.IS', 'EREGL.IS', 'ISCTR.IS', 'SISAS.IS', 'PETKM.IS', 'YAPIKRED.IS', 
    'SAHOL.IS', 'THYAO.IS', 'KCHOL.IS', 'FROTO.IS', 'TOASO.IS', 'BIMAS.IS', 'KRDMD.IS'
]

def fetch_stock_data(ticker, start_date, end_date):
    stock = yf.Ticker(ticker)
    data = stock.history(start=start_date, end=end_date)
    return data

def calculate_fibonacci_levels(data):
    high = data['High'].max()
    low = data['Low'].min()
    diff = high - low
    levels = {
        '0%': low,
        '23.6%': high - 0.236 * diff,
        '38.2%': high - 0.382 * diff,
        '50%': high - 0.5 * diff,
        '61.8%': high - 0.618 * diff,
        '78.6%': high - 0.786 * diff,
        '100%': high
    }
    return levels

def find_closest_fibonacci_level(current_price, levels):
    closest_level = min(levels.values(), key=lambda x: abs(x - current_price))
    return closest_level

def generate_prediction_message(current_price, closest_fib):
    if current_price < closest_fib:
        if (closest_fib - current_price) / current_price > 0.3:
            message = (f"Currently, the stock is trading at ${current_price:.2f}. "
                       f"The nearest Fibonacci level is at ${closest_fib:.2f}. If the stock reaches ${closest_fib:.2f}, "
                       f"it will break through the Fibonacci level, potentially leading to an incredible increase. "
                       f"This could signal a strong bullish trend and offer significant upside potential.")
        else:
            message = (f"Currently, the stock is trading at ${current_price:.2f}. "
                       f"The nearest Fibonacci level is at ${closest_fib:.2f}. If the stock reaches ${closest_fib:.2f}, "
                       f"it will break through the Fibonacci level, potentially leading to a slight increase. "
                       f"This could indicate a potential upward movement.")
    else:
        if (current_price - closest_fib) / current_price > 0.3:
            message = (f"Currently, the stock is trading at ${current_price:.2f}. "
                       f"The nearest Fibonacci level is at ${closest_fib:.2f}. If the stock falls below ${closest_fib:.2f}, "
                       f"it might lead to an incredible decrease. This could signal a strong bearish trend and a significant decline.")
        else:
            message = (f"Currently, the stock is trading at ${current_price:.2f}. "
                       f"The nearest Fibonacci level is at ${closest_fib:.2f}. If the stock falls below ${closest_fib:.2f}, "
                       f"it might lead to a slight decrease. This could indicate a potential downward movement.")
    return message

def plot_stock_data(data, levels, ticker):
    plt.figure(figsize=(14, 7))
    plt.plot(data['Close'], label='Close Price', color='black')
    for level, price in levels.items():
        plt.axhline(price, linestyle='--', label=f'Fibonacci {level}', alpha=0.5)
    plt.title(f'Stock Price with Fibonacci Levels for {ticker}')
    plt.legend()
    plt.xlabel('Date')
    plt.ylabel('Price')
    plt.grid(True)
    # Save the plot to a BytesIO object
    img = io.BytesIO()
    plt.savefig(img, format='png')
    img.seek(0)
    # Encode the image in base64
    img_base64 = base64.b64encode(img.getvalue()).decode('utf-8')
    plt.close()
    return img_base64

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/analyze', methods=['POST'])
def analyze():
    ticker = request.form.get('ticker')
    if ticker not in bist_tickers:
        return jsonify({'error': 'Ticker not found in Borsa Istanbul list.'})
    
    start_date = "2023-06-01"
    end_date = "2024-06-01"
    data = fetch_stock_data(ticker, start_date, end_date)
    
    if data.empty:
        return jsonify({'error': 'No data found for the ticker.'})

    levels = calculate_fibonacci_levels(data)
    current_price = data['Close'].iloc[-1]
    closest_fib = find_closest_fibonacci_level(current_price, levels)
    prediction_message = generate_prediction_message(current_price, closest_fib)
    plot_image = plot_stock_data(data, levels, ticker)
    
    return jsonify({
        'message': prediction_message,
        'plot': plot_image
    })

if __name__ == "__main__":
    app.run(debug=True)
