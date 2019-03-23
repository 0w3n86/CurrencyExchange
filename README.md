# Currency Exchange
Simple currency exchange calculator created with Laravel. 

[Project link](https://limitless-stream-56216.herokuapp.com/)

## Project Brief 

Build a Currency exchange calculator app in Laravel… 

Create an API Endpoint which converts an amount between 2 currencies. The API endpoint should get its conversion rates from http://www.floatrates.com/daily/gbp.xml as XML data.

Ability to switch conversion rate providers via config (EG: https://api.exchangeratesapi.io) as JSON data.

Example Request: /api/currency?from=GBP&to=USD&amount=99.00 
 
Create a page which calls your API endpoint via AJAX to convert between 2 currencies. The page should be styled using standard bootstrap 4 styles.  
