# Submissions

## Steps

1. Clone the repository and navigate into the project directory.
2. Install dependencies:
    ```sh
    composer install
    ```
3. Configure your `.env` file, especially the database connection.
4. Run the migrations:
    ```sh
    php artisan migrate
    ```

## Testing the API

- Use the `/api/submit` endpoint to submit data. Example payload:
    ```json
    {
        "name": "John Doe",
        "email": "john.doe@example.com",
        "message": "This is a test message."
    }
    ```

- To run the unit tests:
    ```sh
    php artisan test
    ```

## Error Handling

- The API will return a `422` status code with validation errors if required fields are missing.
- Any errors during job processing will be logged.
