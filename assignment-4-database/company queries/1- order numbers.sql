SELECT DISTINCT orderNumber, productCode FROM `orderdetails`
WHERE productCode LIKE "S18%"
AND priceEach > 100;