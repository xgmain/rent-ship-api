# Restful api to rent ships

## How to use

- run: composer install
- database: /database/database.sqlite
- start server: php artisan serve
- migrtion&seeding: php artisan migrate:fresh --seed
- visit http://127.0.0.1:8000/setup to obtain tokens
- I use Postman, so enter the first token(admin) to authorization section
- run php artisan cache:clear, in case return empty

## Endpoints
- [GET] http://127.0.0.1:8000/api/v1/members
- [GET] http://127.0.0.1:8000/api/v1/ships
- [GET] http://127.0.0.1:8000/api/v1/members/34
- [POST] http://127.0.0.1:8000/api/v1/members
- [PUT] http://127.0.0.1:8000/api/v1/members/34
- [GET] http://127.0.0.1:8000/api/v1/members?postal_code[lt]=89998&state[eq]=New Mexico&includeShips=true
...

## Features
- Versioning
- Naming convention
- Filtering, Sorting, and Pagination
- Caching
- Sanctum authorisation
- Set token permission
- SSl security [Disabled] (app\Http\Middleware\HttpsProtocol.php)
- Rate limit exceeded; request rejected (app\Providers\RouteServiceProvider.php)
- Validate incoming request, organzie outcoming response
- Test: php artisan test

## To do
- Documentation
- Better test
- OrderBy, SortBy
- Change to Oauth?
- Token revoke, expire