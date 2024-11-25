SELECT * FROM `payments`
WHERE paymentDate LIKE "%-%-05" 
OR paymentDate LIKE "%-%-06";