SELECT creditLimit FROM `customers`
WHERE country = "USA"
AND phone LIKE "%5555%"
ORDER BY creditLimit DESC 
LIMIT 1 OFFSET 5;