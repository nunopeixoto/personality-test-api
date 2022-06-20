# Personality test challenge

## Overview
The project is divided in two repositories:
  - [personality-test-api](https://github.com/nunopeixoto/personality-test-api) Laravel 9 <br>
  - [personality-test](https://github.com/nunopeixoto/personality-test) Angular 13 w/ Material and TailwindCSS

## Project setup instructions
#### Setup personality-test-api
- Create a MySQL database (for example: personality_test)
- Clone the repo and make the first-time setup
```bash
git clone https://github.com/nunopeixoto/personality-test-api.git
cd personality-test-api
composer i

cp .env.example .env
# Make sure you properly fill DB_DATABASE, DB_USERNAME, DB_PASSWORD
vi .env

php artisan key:generate
php artisan migrate
php artisan db:seed --class="QuestionsSeeder"
php artisan test
php artisan serve
```
___

#### Setup personality-test
- If you don't have Angular CLI on your machine, be sure to add it as the first step: `npm install -g @angular/cli`
- Clone the repo and make the first-time setup
```bash
git clone https://github.com/nunopeixoto/personality-test.git
cd personality-test
npm install

npm run start

```
___

## Notes and possible discussion about the assignment
- For demonstration purposes, I developed a complete CRUD for the "Question" resource and respective tests. (The create, update and delete part can't be used via the UI)  
- I didn't implement any sort of authentication
- For simplicity, you will only receive 5 questions (and I assumed that at least 5 questions will always be in the database)
- My algorithm to determine the personality trait is stricly binary (each answer only adds 0 or 1 to the score). A better solution would probably have a score between 0-5 for each answer
- If you wish to test all of the endpoints available in the API [here is a collection that you can import on Postman/Insomnia](https://www.dropbox.com/s/ht90ox4ampl4ts8/Nuno%20Peixoto%20Personality%20Test.postman_collection?dl=0)
___

## Taks covered
- [x] Landing screen
- [x] Start personality test
- [x] Following
- [x] Dynamic screen, that reads question and answers from a the backend (Just build CRUD, with in memory DB)
- [x] Finish screen, where you can see your personality trait.
