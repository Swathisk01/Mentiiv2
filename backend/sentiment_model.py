from textblob import TextBlob

def analyze_sentiment(text):
    """Analyzes the sentiment of the given text and returns a score and label."""
    blob = TextBlob(text)
    sentiment_score = blob.sentiment.polarity  # Score between -1 (negative) and 1 (positive)

    # Assign a label based on the score
    if sentiment_score > 0:
        sentiment_label = "Positive"
    elif sentiment_score < 0:
        sentiment_label = "Negative"
    else:
        sentiment_label = "Neutral"

    return sentiment_score, sentiment_label
