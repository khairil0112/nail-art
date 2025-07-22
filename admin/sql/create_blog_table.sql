CREATE TABLE IF NOT EXISTS blog (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    photo VARCHAR(255) DEFAULT NULL
);

-- Insert initial row with id=1 if not exists
INSERT INTO blog (id, title, content, photo)
SELECT 1, 'Default Title', 'Default content', NULL
WHERE NOT EXISTS (SELECT 1 FROM blog WHERE id = 1);
