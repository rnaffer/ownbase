# API driven application base (Laravel + Angular)

## Guia API

### Links basicos
(GET)           api/v1/[modelName]              index       Todos los registros
(POST)          api/v1/[modelName]              store       Guarda un nuevo registro
(GET)           api/v1/[modelName]/[modelId]    show        Registro específico
(DELETE)        api/v1/[modelName]/[modelId]    destroy     Elimina un registro
(PUT/PATCH)     api/v1/[modelName]/[modelId]    update      Edita un registro

### Métodos de Repositorio Base

> Extensión del BaseRepository de https://github.com/InfyOmLabs/laravel-generator - automatic!

#### resetModel()
Resetea el modelo eliminado los criterios de busqueda.

#### makeModel()
Crea la instancia del modelo

#### list(columna, key = null)
Devuelve un arreglo de datos para llenar un select

#### all(columnas = `['*']`)
Devuelve todos los datos del Repositorio

#### first(columnas = `['*']`)
Devuelve el primer registro del Repositorio

#### paginate(limite = null, columnas = `['*']`, metodo = 'paginate')
Devuelve todos los datos del Repositorio, paginados

#### simplePaginate(limite = null, columnas = `['*']`)
Devuelve todos los datos del Repositorio, paginados de forma simple

#### find(id, columnas = `['*']`)
Encuentra un registro por id

#### findByField(campo, valor = null, columnas = `['*']`)
Encuentra un registro por campo y valor


### Criterios de consulta

#### search
Busca los registros que contengan el valor indicado según la columna especificada.

Parámetro secundario

column: Indica la columna

Ejemplo /api/v1/users?search=raynor&column=nombre

Si la columna no es especificada o no existe en el modelo, devuelve todos los registros.

#### limit
Limita los registros devueltos según el número indicado

Parámetro secundario

offset: Indica la cantidad de registros que omitirá

Ejemplo /api/v1/users?limit=2&offset=1

#### orderBy
ordena los registros según la columna indicada de forma ascendente

/api/v1/users?orderBy=nombre
