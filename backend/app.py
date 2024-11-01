from flask import Flask, request, jsonify
from flask_cors import CORS
from sentiment_model import analyze_sentiment
import mysql.connector
import os

app = Flask(__name__)
CORS(app)  # Allows frontend to connect to backend

# MySQL connection setup
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="mentii"
)

cursor = db.cursor()

# Route to submit assessment
@app.route('/submit', methods=['POST'])
def submit_assessment():
    data = request.json
    user_id = data['user_id']
    day = data['day']
    text_answer = data.get('text_answer', '')
    audio_path = data.get('audio_path', None)

    # Sentiment Analysis
    sentiment_score, sentiment_label = analyze_sentiment(text_answer)

    # Save data to MySQL
    cursor.execute("""
        INSERT INTO assessments (user_id, day, text_answer, audio_path, sentiment_score, sentiment_label)
        VALUES (%s, %s, %s, %s, %s, %s)
    """, (user_id, day, text_answer, audio_path, sentiment_score, sentiment_label))
    db.commit()

    return jsonify({"message": "Assessment submitted successfully"}), 201

# Fetch assessments for a user
@app.route('/assessments/<int:user_id>', methods=['GET'])
def get_assessments(user_id):
    cursor.execute("SELECT * FROM assessments WHERE user_id = %s ORDER BY day", (user_id,))
    results = cursor.fetchall()

    assessments = [
        {
            "day": row[2],
            "text_answer": row[3],
            "audio_path": row[4],
            "sentiment_score": row[5],
            "sentiment_label": row[6],
            "submitted_at": row[7].strftime('%Y-%m-%d %H:%M:%S')
        }
        for row in results
    ]
    return jsonify(assessments)

if __name__ == '__main__':
    app.run(debug=True)
