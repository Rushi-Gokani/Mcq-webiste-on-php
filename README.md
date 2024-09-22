# Mcq-webiste-on-php

## Overview
This is an end-to-end MCQ (Multiple Choice Questions) website developed using **PHP**, **SQL**, **HTML**, and **CSS**. The website allows users to take exams without requiring login or registration, while the admin can manage the exams, view results, and update content.

## Features
- **User Access**: Users can attempt exams by providing their name and mobile number before starting the test. No login or registration is required.
- **Admin Panel**: Admin can create and manage exams, add and update questions, and view user results.
- **Randomized Questions**: The website displays a randomized set of questions for each user.
- **Result Storage**: After the exam, user scores, names, and dates are stored in the database, allowing the admin to view results at any time.

## Setup Instructions

### 1. Clone the Repository
git clone https://github.com/yourusername/mcq-website.git
### 2. Import SQL Database
### 3. Update Database Connection
Navigate to the db.php file.
Update the MySQL connection details (e.g., username, password, and database name) to match your local setup.
### 4. Run the Project
Set up your local server using XAMPP or any other PHP server.
Place the project files in the appropriate directory (usually the htdocs folder in XAMPP).
Open your browser and navigate to http://localhost/mcq-website to start using the website.
## Panels
### 1. User Panel
Users can take exams without needing to register or log in.
Users must enter their name and mobile number before starting the exam.
### 2. Admin Panel
Admin can create new exams, add/edit questions, and manage the question database.
Admin can view the results of all users, including their names, scores, and exam dates.
Randomized Question Feature
The website will select a random set of questions for each user, ensuring that no two users get the exact same set of questions. This enhances the fairness and integrity of the exam process.

## Technologies Used
### Frontend: HTML, CSS
### Backend: PHP
### Database: MySQL

## Screenshots
### User Panel
![image](https://github.com/user-attachments/assets/e2e7d073-d48a-45f8-840a-e5a72deabc3e)
![image](https://github.com/user-attachments/assets/1461df3d-33ee-401f-9ac2-01b3c1a1573f)
![image](https://github.com/user-attachments/assets/02ae4e5b-f115-4b4c-8f0c-a62451cfd9ef)

### Admin Panel (Username: - admin Password : - admin123
![image](https://github.com/user-attachments/assets/1beb1024-0623-471f-af69-8546391aab43)
![image](https://github.com/user-attachments/assets/94821eaf-3d23-4a2c-a501-92f938b519d6)

