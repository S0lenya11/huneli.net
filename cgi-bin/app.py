#!/usr/bin/env python3

import numpy as np
import pandas as pd
import yfinance as yf
import matplotlib.pyplot as plt
from datetime import datetime

# List of major stock indices or companies from various global stock markets
tickers = {
    'S&P 500': '^GSPC',     # S&P 500 (US)
    'NASDAQ': '^IXIC',     # NASDAQ Composite (US)
    'Dow Jones': '^DJI',   # Dow Jones Industrial Average (US)
    'FTSE 100': '^FTSE',   # FTSE 100 (UK)
    'DAX': '^GDAXI',       # DAX 30 (Germany)
    'Nikkei 225': '^N225', # Nikkei 225 (Japan)
    'Hang Seng': '^HSI',   # Hang Seng Index (Hong Kong)
    'CSI 300': '000300.SS', # CSI 300 (China)
    'ASX 200': '^AXJO',    # ASX 200 (Australia)
    'BSE Sensex': '^BSESN', # BSE Sensex (India)
    'Borsa Istanbul': '^XU100' # Borsa Istanbul 100 (Turkey)
}

# List of Borsa Istanbul tickers (example tickers, update with actual tickers)
bist_tickers = [
    'GARAN.IS', 'ASELS.IS', 'EREGL.IS', 'ISCTR.IS', 'SISAS.IS', 'PETKM.IS', 'YAPIKRED.IS', 
    'SAHOL.IS', 'THYAO.IS', 'KCHOL.IS', 'FROTO.IS', 'TOASO.IS', 'BIMAS.IS', 'KRDMD.IS'
    # Add more Borsa Istanbul tickers here
]

# Function to fetch historical stock data for a specific date range
def fetch_stock_data(ticker, start_date, end_date):
    stock = yf.Ticker(ticker)
    data = stock.history(start=start_date, end=end_date)
    return data

# Function to calculate Fibonacci retracement levels
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

# Function to find the closest Fibonacci level to the current price
def find_closest_fibonacci_level(current_price, levels):
    closest_level = min(levels.values(), key=lambda x: abs(x - current_price))
    return closest_level

# Function to generate prediction message
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

# Visualization function
def plot_stock_data(data, levels, ticker):
    plt.figure(figsize=(14, 7))
    plt.plot(data['Close'], label='Close Price', color='black')
    
    for level, price in levels.items():
        plt.axhline(price, linestyle='--', label=f'Fibonacci {level}', alpha=0.5)
    
    plt.title(f'Stock Price with Fibonacci Levels for {ticker}')
    plt.legend()
    plt.show()

# Main function to execute the complete analysis
def main(ticker_name, ticker_symbol):
    # Step 1: Fetch data
    start_date = "2023-06-01"
    end_date = "2024-06-01"
    data = fetch_stock_data(ticker_symbol, start_date, end_date)
    
    if data.empty:
        print(f"No data found for {ticker_name} ({ticker_symbol})")
        return

    # Step 2: Calculate Fibonacci levels
    levels = calculate_fibonacci_levels(data)
    
    # Step 3: Find the current price and closest Fibonacci level
    current_price = data['Close'].iloc[-1]
    closest_fib = find_closest_fibonacci_level(current_price, levels)
    
    # Step 4: Generate prediction message
    prediction_message = generate_prediction_message(current_price, closest_fib)
    print(prediction_message)
    
    # Step 5: Visualization
    plot_stock_data(data, levels, ticker_name)

# Run the analysis for all Borsa Istanbul stocks
if __name__ == "__main__":
    for ticker in bist_tickers:
        
        print("Content-type: text/html\n")
        print("<html><body><h1>"f"\nAnalyzing Borsa Istanbul stock: {ticker}..."f"\nAnalyzing Borsa Istanbul stock: {ticker}...""</h1></body></html>")
        print(f"\nAnalyzing Borsa Istanbul stock: {ticker}...")
        main(ticker, ticker)

print("Content-type: text/html\n")
print("<html><body><h1>Hello, World!</h1></body></html>")