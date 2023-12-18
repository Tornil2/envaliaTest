# envaliaTest

<h2>Introducción</h2>
<p>Nos encontramos con un proyecto para una empresa que requiere digitalizar su
catálogo de productos. La empresa se dedica a la venta y fabricación de todo tipo de
puertas (puertas de jardín, puertas de rellano, puertas de garaje, puertas principales,
incluso puertas para castillos …).</p>

<h2>Objetivo</h2>
<ul>
  <li>Desarrollar una API/REST para crear un CRUD (Create – Read - Update - Delete) para gestionar el catálogo de puertas.</li>
  <li>Mini APP en front para consumir la API REST.</li>
</ul>


<h2>Herramientas / Frameworks / lenguajes</h2>
<ul>
  <li>Laravel</li>
  <li>Clase <a href="https://www.moneyphp.org/">Money</a> de PHP</li>
  <li>JavaScript</li>
  <li>Docker</li>
  <li>Composer</li>
  <li>Postman</li>
  <li>VS Code</li>
</ul>

<h2>Instrucciones de uso</h2>
<ul>
  <li>Descargar repositorio</li>
  <li>Abrir una terminal en la raiz del repositorio</li>
  <li>Ejecutar el comando "mv .\thedoors-data\enviroment.env .\thedoors-data\.env"</li>
  <li>Ejecutar el comando "docker compose up -d"</li>
  <li>Ejecutar el comando "docker exec envaliatest-theDoors-1 composer require moneyphp/money"</li>
  <li>Ejecutar el comando "docker exec envaliatest-theDoors-1 php artisan migrate:refresh"</li>
  <li>Ejecutar el comando "docker exec envaliatest-theDoors-1 php artisan storage:link"</li>
  <li>Entrar en <a href="http://localhost:8080">localhost:8080</a> para entrar a la base de datos mediante phpMyAdmin</li>
  <li>Entrar en <a href="http://localhost:8000/shop">localhost:8000/shop</a> para ver la mini APP de front</li>
</ul>

<h2>Observaciones</h2>
<p>Los tres primeros días estuve estudiando Laravel y Docker ya que no los había usado nunca, los siguientes dos días de desarrollo de la API/REST y los dos restantes la mini APP, y aunque he conseguido desarrollarlo a tiempo (por poco), no estoy conforme con el resultado; subestimé el tiempo que tenía y sobreestimé mis habilidades, dando como resultado una API/REST con posibilidad de dejar datos sin acceso y un código desastroso en general.</p>
<p>Por otro lado, no dejo de sentir cierto orgullo, ya que esta ha sido mi primera API/REST, y mi primera vez usando Docker y Laravel.</p>
<p>Sea cual sea el resultado, he aprendido, así que estoy contento. Gracias. 💚</p>
