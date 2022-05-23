# Matcher microservice Case Study

The Matcher microservice is a Laravel application developed to help Real Estate Agents or Brokers easily match a property with Search Profiles. A Search Profile is essentially preferences of customers. The matcher microservice will show Real Estate Agents or Brokers  which customers would be a relevant fit for a new property they are begining to market. 

As a user, I would like to be able to know which (customer) search profile fit on a property so that I can send these customers an offer. 

## Project Requirement
- Run Laravel 8, PHP 8.1+
- MySQL or Postgres database

## Installation & Setup
- Clone the repository 
- Create a copy of .env.example as .env in the root directory
- Update the .env with your ``DATABASE DETAILS``
- Run `composer install` to install the dependencies
- Run `php artisan key:generate` to generate the Laravel App Key
- Run `php artisan migreate` to create the database tables
- Run `php artisan test` to test the application, ensure all tests pass successfully.
- Run `php artisan db:seed` to populate the property and search_profiles tables with the default records.
- Run `php artisan serve` to start the application : `Starting Laravel development server: http://127.0.0.1:8000`

## Usage
Using Postman or any other API testing tool, make a call to the `{base_url}/api/match/property_id`, where `base_url` is your server ip eg. `http://127.0.0.1:8000/api/match/3`.

### Sample Response:
```
{
    "code": "200",
    "message": "Property search profile macthed successfully",
    "data": [
        {
            "searchProfileId": 42,
            "score": 5,
            "strictMatchesCount": 2,
            "looseMatchesCount": 3
        },
        {
            "searchProfileId": 46,
            "score": 3,
            "strictMatchesCount": 1,
            "looseMatchesCount": 2
        },
        {
            "searchProfileId": 47,
            "score": 3,
            "strictMatchesCount": 1,
            "looseMatchesCount": 2
        },
        {
            "searchProfileId": 57,
            "score": 3,
            "strictMatchesCount": 1,
            "looseMatchesCount": 2
        },
        {
            "searchProfileId": 41,
            "score": 2,
            "strictMatchesCount": 1,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 45,
            "score": 2,
            "strictMatchesCount": 0,
            "looseMatchesCount": 2
        },
        {
            "searchProfileId": 49,
            "score": 2,
            "strictMatchesCount": 0,
            "looseMatchesCount": 2
        },
        {
            "searchProfileId": 55,
            "score": 2,
            "strictMatchesCount": 1,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 58,
            "score": 2,
            "strictMatchesCount": 1,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 59,
            "score": 2,
            "strictMatchesCount": 1,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 43,
            "score": 1,
            "strictMatchesCount": 1,
            "looseMatchesCount": 0
        },
        {
            "searchProfileId": 44,
            "score": 1,
            "strictMatchesCount": 0,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 48,
            "score": 1,
            "strictMatchesCount": 1,
            "looseMatchesCount": 0
        },
        {
            "searchProfileId": 50,
            "score": 1,
            "strictMatchesCount": 0,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 51,
            "score": 1,
            "strictMatchesCount": 0,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 52,
            "score": 1,
            "strictMatchesCount": 0,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 53,
            "score": 1,
            "strictMatchesCount": 0,
            "looseMatchesCount": 1
        },
        {
            "searchProfileId": 60,
            "score": 1,
            "strictMatchesCount": 0,
            "looseMatchesCount": 1
        }
    ]
}
```