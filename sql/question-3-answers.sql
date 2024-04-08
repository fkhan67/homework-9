-- Select a post by id = 1
SELECT * FROM posts WHERE id = 1;

-- Select posts where title includes “title 2”
SELECT * FROM posts WHERE title LIKE '%title 2%';

-- Select and order posts alphabetically by name
SELECT * FROM posts ORDER BY title ASC;

-- Write an insert statement to make 3 new posts
INSERT INTO posts (title, content) VALUES ('New Post 1', 'Content of new post 1');
INSERT INTO posts (title, content) VALUES ('New Post 2', 'Content of new post 2');
INSERT INTO posts (title, content) VALUES ('New Post 3', 'Content of new post 3');

-- Write an update statement to update post with id = 1 and change the name to “Updated Post”
UPDATE posts SET title = 'Updated Post' WHERE id = 1;

-- Write a delete statement to delete post id = 2
DELETE FROM posts WHERE id = 2;
