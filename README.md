# Power BI Embedded PHP API

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Version](https://img.shields.io/github/release/victorap93/powerbiembedded-php-api.svg?style=flat-square)](https://github.com/victorap93/powerbiembedded-php-api/releases)


## Installation

### With Docker:

Make sure you have the **Docker** installed and running, open the terminal, navigate to your working directory and run the commands below:

```bash
git clone https://github.com/victorap93/powerbiembedded-php-api.git
cd .\powerbiembedded-php-api\
docker-compose up -d
cd .\html\
docker run --rm --interactive --tty --volume $PWD\:/app composer install
```

### With Apache:

Make sure you have **PHP**, **Composer** and **Apache** installed in your machine and **Apache** service running, open terminal, navigate to your working directory and run the commands below:

```bash
git clone https://github.com/victorap93/powerbiembedded-php-api.git
cd .\powerbiembedded-php-api\html\
composer install
```


## How to use

### Get the nedded parameters:

Read this [step](https://docs.microsoft.com/en-us/power-bi/developer/embedded/embed-sample-for-customers?tabs=net-core#step-5---get-the-embedding-parameter-values) to know how to get neded params.

### Put paramters in project:

Create a copy from `.env.example` named `.env` and replace the empty values ​​with those obtained from Microsoft.

### Call API:

You can copy this [Postman hosted example](https://www.postman.com/victorap93/workspace/power-bi-embedded-php-api/request/5723430-918ef964-e34e-44cb-9a0c-66d58735d68f) or simply run the below command in a terminal, in all cases adjusting the *url* and *report_id* values ​​to your project structure.

```bash
curl --location --request POST 'http://localhost/getToken' \
--header 'Content-Type: application/json' \
--data-raw '{
    "report_id": "",
    "params": {
        "accessLevel": "view"
    }
}'
```


## More
For the interface implementation see this [project](https://github.com/victorap93/powerbiembedded-react-app) in React.


## License

Power BI Embedded PHP API is made available under the MIT License (MIT). Please see [License File](LICENSE) for more information.