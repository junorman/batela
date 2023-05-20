SELECT HOUR(`created_at`) AS 'hour' FROM `signaler_probleme`;
SELECT * FROM signaler_probleme WHERE EXTRACT(YEAR FROM created_at) = 2023;

SELECT EXTRACT(MONTH FROM "2017-06-15");

SELECT MONTH(`created_at`) AS 'months' FROM `signaler_probleme`;

SELECT MONTH(`created_at`) AS 'months' FROM `signaler_probleme` GROUP BY MONTH(created_at);