# Power BI Embedded PHP API

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Version](https://img.shields.io/github/release/victorap93/powerbiembedded-php-api.svg?style=flat-square)](https://github.com/victorap93/powerbiembedded/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/victorap93/powerbiembedded-php-api.svg?style=flat-square)](https://packagist.org/packages/victorap93/powerbiembedded)


## Installing Power BI Embedded PHP API

With Docker

```bash
git clone https://github.com/victorap93/powerbiembedded-php-api.git
cd .\powerbiembedded-php-api\
docker-compose up -d
cd .\html\
docker run --rm --interactive --tty --volume $PWD\:/app composer install
```

Without Docker

```bash
git clone https://github.com/victorap93/powerbiembedded-php-api.git
cd .\powerbiembedded-php-api\
composer install
```


## Get the embedding parameter values

Read this [step](https://docs.microsoft.com/en-us/power-bi/developer/embedded/embed-sample-for-customers?tabs=net-core#step-5---get-the-embedding-parameter-values) to know how to get neded params.


## How to use

Rename the `.env.example` to `.env` and replace the values ​​with the same ones obtained from Microsoft

You can use a [Postman hosted example](https://www.postman.com/victorap93/workspace/power-bi-embedded-php-api/request/5723430-918ef964-e34e-44cb-9a0c-66d58735d68f) or simply use the below command via curl filling the *report_id*.

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


## License

Power BI Embedded PHP API is made available under the MIT License (MIT). Please see [License File](LICENSE) for more information.