<p align="center"><a href="https://www.theinnovationfactory.it/" target="_blank"><img src="https://www.theinnovationfactory.it/wp-content/uploads/2019/06/logo-tif@2x.png" width="400"></a></p>

## Currency Converter for The Innovation Factory

A simple PHP exercise for my apply for The Innovation Factory. The purpose was to return a list of money transactions,
converted in Euro.

I have used Laravel because the Artisan CLI included in the framework. The code is build using Service-Repository Pattern.

To install and launch the application follow the following steps:
- Clone the repository from command line: <i>git clone git@github.com:agiovinazzi/currency-converter.git</i>
- Navigate to project root folder
- Run <i>composer install</i> command
- Copy the .<i>env.example</i> file and rename it to <i>.env</i>
- Run <i>php artisan key generate</i> command
- Run <i>php artisan serve</i> command to launch the application
- Run <i>php artisan currency:get</i> followed a customer id to get all the transactions for the given customer
- Run <i>./vendor/bin/phpunit</i> to execute the PHPUnit tests

Some little notes:
1. I have updated your .csv file, substituting currency symbols with the corresponding ISO codes, to avoid bad
interpretations of the characters in the application
2. An unhandled case in this app is a record in .csv file with an unknow currency: handle this event would have involved 
   a significant amount of code changes
   

