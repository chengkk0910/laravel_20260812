SELECT
    *
FROM
    `students`;

SELECT
    *
FROM
    `phones`;

SELECT
    ProductID,
    ProductName,
    CategoryName
FROM
    Products
    INNER JOIN Categories ON Products.CategoryID = Categories.CategoryID;

SELECT
    `students`.`id`,
    `students`.`name`,
    `phones`.`name`
FROM
    `students`
    INNER JOIN `phones` ON `students`.`id` = `phones`.`student_id`;

SELECT
    c.CompanyName,
    SUM(od.UnitPrice * od.Quantity * (1 - od.Discount)) AS TotalSpent
FROM
    Customers c
    JOIN Orders o ON c.CustomerID = o.CustomerID
    JOIN [Order Details] od ON o.OrderID = od.OrderID
GROUP BY
    c.CompanyName
ORDER BY
    TotalSpent DESC;

INSERT INTO
    `hobbies` (
        `id`,
        `student_id`,
        `name`,
        `created_at`,
        `updated_at`
    )
VALUES
    (NULL, '1', 'html', NULL, NULL),
    (NULL, '1', 'css', NULL, NULL),
    (NULL, '1', 'js', NULL, NULL),
    (NULL, '2', 'css', NULL, NULL),
    (NULL, '2', 'js', NULL, NULL),
    (NULL, '3', 'php', NULL, NULL),
    (NULL, '3', 'laravel', NULL, NULL),
    (NULL, '3', 'css', NULL, NULL),
    (NULL, '3', 'js', NULL, NULL);

SELECT
    `students`.`id`,
    `students`.`name`,
    `hobbies`.`name`
FROM
    `students`
    INNER JOIN `hobbies` ON `students`.`id` = `hobbies`.`student_id`;

SELECT
    `students`.`id`,
    `students`.`name` AS `student_name`,
    `phones`.`name` AS `phone_name`,
    `hobbies`.`name` AS `hobby_name`
FROM
    `students`
    INNER JOIN `phones` ON `students`.`id` = `phones`.`student_id`
    INNER JOIN `hobbies` ON `students`.`id` = `hobbies`.`student_id`;

INSERT INTO
    `hobbies` (
        `id`,
        `student_id`,
        `name`,
        `created_at`,
        `updated_at`
    )
VALUES
    (NULL, '4', 'php', NULL, NULL),
    (NULL, '4', 'js', NULL, NULL);