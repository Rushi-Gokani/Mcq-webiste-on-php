import csv
import random

# Sample pool of questions and answers (with options and correct answers)
questions = [
    {"question": "What is the capital of France?", "options": ["Berlin", "Madrid", "Paris", "Rome"], "answer": 3},
    {"question": "What is 5 + 7?", "options": ["10", "12", "11", "13"], "answer": 2},
    {"question": "Which planet is known as the Red Planet?", "options": ["Earth", "Mars", "Jupiter", "Venus"], "answer": 2},
    {"question": "What is the largest ocean on Earth?", "options": ["Atlantic", "Indian", "Pacific", "Arctic"], "answer": 3},
    {"question": "Who wrote 'To Kill a Mockingbird'?", "options": ["Harper Lee", "J.K. Rowling", "Ernest Hemingway", "Mark Twain"], "answer": 1},
    {"question": "What is the capital of Japan?", "options": ["Beijing", "Seoul", "Tokyo", "Bangkok"], "answer": 3},
    {"question": "Which element has the atomic number 1?", "options": ["Helium", "Hydrogen", "Oxygen", "Carbon"], "answer": 2},
    {"question": "Who wrote 'Pride and Prejudice'?", "options": ["Charles Dickens", "Jane Austen", "Mark Twain", "Emily Bronte"], "answer": 2},
    {"question": "What is the largest planet in our solar system?", "options": ["Earth", "Mars", "Jupiter", "Saturn"], "answer": 3},
    {"question": "What is the chemical symbol for Gold?", "options": ["Ag", "Au", "Pb", "Fe"], "answer": 2},
    {"question": "Which country hosted the 2016 Summer Olympics?", "options": ["China", "Brazil", "USA", "Germany"], "answer": 2},
    {"question": "Which language is primarily spoken in Brazil?", "options": ["Spanish", "Portuguese", "English", "French"], "answer": 2},
    {"question": "Who painted the Mona Lisa?", "options": ["Vincent van Gogh", "Pablo Picasso", "Leonardo da Vinci", "Claude Monet"], "answer": 3},
    {"question": "What is the hardest natural substance on Earth?", "options": ["Gold", "Iron", "Diamond", "Platinum"], "answer": 3},
    {"question": "Which is the smallest continent by land area?", "options": ["Europe", "Australia", "Antarctica", "South America"], "answer": 2},
    {"question": "Who developed the theory of relativity?", "options": ["Isaac Newton", "Albert Einstein", "Galileo Galilei", "Nikola Tesla"], "answer": 2},
    {"question": "Which country is famous for the Eiffel Tower?", "options": ["Germany", "Italy", "France", "Spain"], "answer": 3},
    {"question": "Which is the longest river in the world?", "options": ["Nile", "Amazon", "Yangtze", "Mississippi"], "answer": 1},
    {"question": "Which organ in the human body is primarily responsible for filtering blood?", "options": ["Heart", "Lungs", "Kidneys", "Liver"], "answer": 3},
    {"question": "Who is known as the father of computers?", "options": ["Bill Gates", "Charles Babbage", "Steve Jobs", "Alan Turing"], "answer": 2},
    {"question": "What is the square root of 64?", "options": ["6", "8", "10", "12"], "answer": 2},
    {"question": "What is the capital of Canada?", "options": ["Toronto", "Vancouver", "Ottawa", "Montreal"], "answer": 3},
    {"question": "What is the largest desert in the world?", "options": ["Sahara", "Gobi", "Arctic", "Kalahari"], "answer": 1},
    {"question": "What is the speed of light?", "options": ["299,792,458 m/s", "150,000,000 m/s", "9,460,730,472,580.8 km/year", "500,000,000 m/s"], "answer": 1},
    {"question": "Which gas is most abundant in the Earth’s atmosphere?", "options": ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"], "answer": 2},
    {"question": "Which city is known as the Big Apple?", "options": ["Los Angeles", "San Francisco", "New York", "Chicago"], "answer": 3},
    {"question": "Which planet is closest to the Sun?", "options": ["Venus", "Mars", "Mercury", "Earth"], "answer": 3},
    {"question": "What is the national currency of Japan?", "options": ["Yen", "Won", "Dollar", "Peso"], "answer": 1},
    {"question": "What is the freezing point of water?", "options": ["0°C", "32°C", "100°C", "273°C"], "answer": 1},
    {"question": "Which country is known as the Land of the Rising Sun?", "options": ["China", "Thailand", "Japan", "South Korea"], "answer": 3},
    {"question": "What is the chemical symbol for Water?", "options": ["H2O", "O2", "CO2", "HO"], "answer": 1},
    {"question": "Which is the largest mammal in the world?", "options": ["Elephant", "Blue Whale", "Giraffe", "Polar Bear"], "answer": 2},
    {"question": "Which programming language is used for web development?", "options": ["C++", "Python", "JavaScript", "Java"], "answer": 3},
    {"question": "Who was the first president of the United States?", "options": ["Abraham Lincoln", "George Washington", "Thomas Jefferson", "John Adams"], "answer": 2},
    {"question": "What is the capital of Italy?", "options": ["Milan", "Florence", "Venice", "Rome"], "answer": 4},
    {"question": "Which continent has the largest population?", "options": ["Asia", "Africa", "Europe", "North America"], "answer": 1},
]

# Randomly select 50 questions (ensure you have enough in your list, or adjust the number)
selected_questions = random.sample(questions, min(len(questions), 50))

# Create CSV file with random questions
with open('mcq_questions.csv', mode='w', newline='') as file:
    writer = csv.writer(file)
    
    # Write header
    writer.writerow(["question", "option1", "option2", "option3", "option4", "correct_option"])
    
    # Write questions and options with answers in numerical format
    for q in selected_questions:
        writer.writerow([q["question"], q["options"][0], q["options"][1], q["options"][2], q["options"][3], q["answer"]])

print("CSV file with 50 random MCQ questions has been created.")
