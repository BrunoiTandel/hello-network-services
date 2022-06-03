SELECT COUNT(candidate_id) as total, monthname(created_date) as month FROM candidate where date(created_date) BETWEEN CURDATE() - INTERVAL 1 MONTH AND CURDATE() AND is_submitted !=4 AND client_id=".$value['client_id']


SELECT YEAR(SalesDate) [Year], MONTH(SalesDate) [Month], 
 DATENAME(MONTH,SalesDate) [Month Name], COUNT(1) [Sales Count]
FROM #Sales
GROUP BY YEAR(SalesDate), MONTH(SalesDate), 
 DATENAME(MONTH, SalesDate)
ORDER BY 1,2

SELECT `user_purchased_package_id`, `user_id`, `package_id`, `payment_id`, `amount_paid`, `gst_applied`, `package_details`, `purchased_date` FROM `user_purchased_package` WHERE 1


SELECT YEAR(purchased_date) as Year, MONTH(purchased_date)  as Month, COUNT(*) as SalesCount, DATE_FORMAT(date(purchased_date),'%M') as monthname
FROM user_purchased_package
GROUP BY YEAR(purchased_date), MONTH(purchased_date) 
ORDER BY user_purchased_package_id DESC

SELECT YEAR(purchased_date) as Year, MONTH(purchased_date)  as Month, COUNT(*) as SalesCount, DATE_FORMAT(date(purchased_date),'%M %Y') as monthname, SUM(amount_paid) as amount_paid
            FROM user_purchased_package
            GROUP BY YEAR(purchased_date), MONTH(purchased_date) 
            ORDER BY user_purchased_package_id DESC