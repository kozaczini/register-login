from flask import Flask, render_template, request, session, redirect, jsonify
from flask_cors import CORS
import mysql.connector

app = Flask(__name__)
CORS(app)
app.secret_key = "tajny_klucz"

db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="users"
)

@app.route("/")
def home():
    user = request.args.get("user", "Gość")  
    return render_template('index.html')

@app.route("/books")
def books():
    cursor = db.cursor(dictionary=True)  
    cursor.execute("SELECT id, title, author, available FROM books")  
    books_list = cursor.fetchall()  
    cursor.close()  
    return jsonify(books_list)  




if __name__ == "__main__":
    app.run(debug=True)