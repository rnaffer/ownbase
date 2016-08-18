# API driven application base (Laravel + Angular)

## Guia API

### Links basicos
(GET)           api/v1/[modelName]              index       Todos los registros
(POST)          api/v1/[modelName]              store       Guarda un nuevo registro
(GET)           api/v1/[modelName]/[modelId]    show        Registro específico
(DELETE)        api/v1/[modelName]/[modelId]    destroy     Elimina un registro
(PUT/PATCH)     api/v1/[modelName]/[modelId]    update      Edita un registro

### Métodos de Repositorio Base

> Extensión del BaseRepository de https://github.com/InfyOmLabs/laravel-generator

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

#### findWhere(array donde, columnas = `['*']`)
Encuentra registros por múltiples campos

#### findWhereIn(campo, array valores, columnas = `['*']`)
Encuentra registros por múltiples valores en un campo

#### findWhereNotIn(campo, array valores, columnas = `['*']`)
Encuentra registros excluyendo múltiples valores en un campo

#### create(array atributos)
Guarda una nueva entidad en el Repositorio

#### update(array atributos, id)
Actualiza una entidad en el repositorio por id

#### updateOrCreate(array atributos, array valores = [])
Actualiza o crea una entidad en el Repositorio

#### delete(id)
Elimina una entidad del repositorio por id

#### deleteWhere(array donde)
Elimina múltiples entidades según el criterio indicado

#### has(relación)
Chequea si la entidad tiene relación

#### with(aray relaciones)
Carga las relaciones

#### whereHas(relaciones, cierre)
Carga la relación con cierre

#### hidden(array campos)
Asigna los campos ocultos

#### orderBy(columna, direccion = asc)
Ordena las entidades

#### visible(array campos)
Asigna los campos visibles

#### resetScope()
Resetea el ambito de la consulta

#### applyScope()
Aplica el ambito a la consulta Actual

#### applyConditions(array donde)
Aplica las condiciones dadas al modelo

#### pushCriteria(solicitud)
Aplica los criterios solicitados en la consulta

#### searchCriteria(valor, solicitud)
Criterio de busqueda, busca un valor en la columna indicada.

#### limitCriteria(valor = 10, solicitud)
Criterio de límite, limita la cantidad registros devueltos

#### offsetCriteria(valor = 0)
Criterio de inicio, indica desde que posición debe devolver los registros

#### orderByCriteria(columna)
Criterio de ordenación, ordena los registros según la columna indicada

#### withCriteria(relaciones)
Criterio de relación, devuelve el registro con la información relacionada

#### fieldsCriteria(campos)
Criterio de campos, devuelve el registro solo con los campos especificados

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
Ordena los registros según la columna indicada de forma ascendente

/api/v1/users?orderBy=nombre

#### with
Adjunta información adicional de las relaciones. full: trae las relaciones completas, short: trae una versión reducida de las relaciones.

/api/v1/users?with=short

#### fields
Especifica los campos que debe devolver la consulta separados por coma.

/api/v1/users?fields=name,second,email,address
