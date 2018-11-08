# xmen

# Mutant Check 1.0

Magneto quiere reclutar la mayor cantidad de mutantes para poder luchar
contra los X-Mens.
Te ha contratado a ti para que desarrolles un proyecto que detecte si un
humano es mutante basándose en su secuencia de ADN.
Para eso te ha pedido crear un programa con un método o función con la siguiente firma:
boolean isMutant(String[] dna);
En donde recibirás como parámetro un array de Strings que representan cada fila de una tabla
de (NxN) con la secuencia del ADN. Las letras de los Strings solo pueden ser: (A,T,C,G), las
cuales representa cada base nitrogenada del ADN.

### Method: /mutant

Metodo: POST / JSON

```sh
Request:
URL: https://xmen-221503.appspot.com/mutant/
BODY: {"dna":["GAGATA","CAAGAT","CTGAAG","CCACGC","GCGGGA","ACAGTG"]}

Response:
Es mutante: http_response_code: 200
No es mutante: http_response_code: 403

```

### Method: /stats

Metodo: GET

```sh
Request:
URL: https://xmen-221503.appspot.com/stats/

Response:
{"count_mutant_dna":2,"count_human_dna":713,"ratio":0}

```
