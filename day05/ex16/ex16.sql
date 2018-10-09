SELECT COUNT(*) as 'movies'
FROM member_history
WHERE (DATE(date) >= '10-30-2006' AND DATE(date) <= '07-27-2007') OR (MONTH(date) = 12 AND DAY(date) = 24);