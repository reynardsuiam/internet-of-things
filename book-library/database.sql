CREATE DATABASE IF NOT EXISTS book_library;

USE book_library;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL
);

INSERT INTO books (title, author) VALUES
('The Alchemist', 'Paulo Coelho'),
('Wings of Fire', 'A. P. J. Abdul Kalam'),
('Atomic Habits', 'James Clear'),
('The Great Gatsby', 'F. Scott Fitzgerald'),
('Harry Potter and the Philosopher''s Stone', 'J. K. Rowling');
