""" 
This is the main file of the web application.
"""

# Importing the libraries
from flask import Flask, render_template, request
from transformers import T5Tokenizer, T5ForConditionalGeneration
from googletrans import Translator

# Creating an instance of the Flask class
app = Flask(__name__)

# Loading the model and tokenizer
model_name = "t5-small"
model = T5ForConditionalGeneration.from_pretrained(model_name)
tokenizer = T5Tokenizer.from_pretrained(model_name)

translator = Translator()

# Function to summarize the text
def summarize_with_t5(text, language='en'):
    if language != 'en':
        text = translator.translate(text, dest='en').text

    input_text = "summarize: " + text
    input_tokenized = tokenizer.encode(input_text, return_tensors="pt", max_length=512, truncation=True)
    summary_ids = model.generate(input_tokenized, max_length=100, min_length=5, length_penalty=2.0, num_beams=4, early_stopping=True)

    summary = tokenizer.decode(summary_ids[0], skip_special_tokens=True)
    if language != 'en':
        summary = translator.translate(summary, dest=language).text

    return summary

# Defining the routes
@app.route('/')
def index():
    return render_template('index.html')

# Defining the routes
@app.route('/summarize', methods=['POST'])
def summarize():
    if request.method == 'POST':
        user_input = request.form['user_input']
        selected_language = request.form['language'] 
        summary = summarize_with_t5(user_input, language=selected_language)
        return render_template('result.html', user_input=user_input, summary=summary, selected_language_name=selected_language)

# Running the app
if __name__ == '__main__':
    app.run(debug=True)
