# Yii2 REST API — Sum Even Numbers

REST API built with Yii2 that accepts a JSON request with an array of numbers and returns the sum of even numbers.

## Installation

```bash
make build
make up
```

The application will be available at `http://localhost:8000`.

## Usage

```bash
curl -X POST http://localhost:8000/api/sum-even -H "Content-Type: application/json" -d '{"numbers": [1, 2, 3, 4, 5, 6]}'
```

Response:
```json
{"sum": 12}
```

### Edge-case examples

Empty array:
```bash
curl -X POST http://localhost:8000/api/sum-even -H "Content-Type: application/json" -d '{"numbers": []}'
# {"errors": {"numbers": ["Numbers cannot be blank."]}}
```

Invalid data:
```bash
curl -X POST http://localhost:8000/api/sum-even -H "Content-Type: application/json" -d '{"numbers": [1, "abc", 3]}'
# {"errors": {"numbers": [...]}}
```

Missing numbers field:
```bash
curl -X POST http://localhost:8000/api/sum-even -H "Content-Type: application/json" -d '{}'
# {"error": "Field \"numbers\" is required and must be an array."}
```

## Tests

```bash
make test
```

## Project Structure

```
├── controllers/
│   ├── ApiController.php          # REST controller
│   └── SiteController.php         # Root endpoint
├── dto/
│   └── NumbersRequestDto.php      # DTO with validation
├── interfaces/
│   ├── NumberFilterInterface.php   # Number filter interface
│   └── SumCalculatorInterface.php  # Sum calculator interface
├── services/
│   ├── EvenNumberFilter.php       # Even number filter
│   ├── SumCalculator.php          # Sum calculator
│   └── SumEvenService.php         # Orchestrator service
├── tests/
│   └── unit/                      # Unit tests
├── config/
│   └── web.php                    # Configuration and routing
├── Dockerfile
├── docker-compose.yml
├── entrypoint.sh
└── Makefile
```
