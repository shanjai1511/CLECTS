from flask import Flask, request, render_template
import openai

app = Flask(__name__)
openai.api_key = ""

@app.route('/', methods=['GET', 'POST'])
def chatbot():
    if request.method == 'POST':
        user_input = request.form['user_input']
        response = openai.ChatCompletion.create(
            model="gpt-3.5-turbo-1106",
            messages=[
                {"role": "system", "content": "You are a helpful assistant."},
                {"role": "user", "content": user_input},
            ],
            max_tokens=1024,
            temperature=0.5,
        )
        return render_template('index.html', user_input=user_input, response=response.choices[0].message.content)
    else:
        return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)