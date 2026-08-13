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