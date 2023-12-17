
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>THE DOORS | TIENDA</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<style>

    #newCategoryButton {
        border-radius: 0px 0.375rem 0.375rem 0px;
        position: relative;
        left: -3.75em;
        top: 1.5px;
    }

    #loginButton{
        position: fixed;
        right: 1em;
        top: 0.75em;
        padding: 0;
        cursor:pointer;
    }

    #loginButton > *{
        pointer-events:none;
    }

    #container_item {
        display: grid;
        grid-gap: 2em;
        grid-template-columns: repeat(3, 1fr);
        padding: 6em 0px 3em 0px;
    }

    .card {
        display: grid;
        text-wrap: pretty;
    }

    .card-text {
        height: 6em;
        overflow: auto;
        padding: 0.5em;
        border-radius: 0.5em;
        border: 1px solid var(--bs-border-color-translucent);
    }

    .card-title {
        height: 1.25em;
        overflow: hidden;
    }

    .cross-delete {
        color: var(--bs-danger);
        rotate: 45deg;
        aspect-ratio: 1/1;
        display: inline-grid;
        height: 1.5em;
        text-align: center;
        border-radius: 100%;
        border: 1px solid;
        align-content: center;
        position: absolute;
        right: 1em;
        background-color: var(--bs-danger-bg-subtle);
        cursor: pointer;
    }

    .cross-delete:hover {
        scale: 1.125;
    }

    .card > .cross-delete {
        top: 1em;
    }

    .carousel-control-prev-icon,.carousel-control-next-icon {
        color: red;
        background-color: red;
        border-radius: 100%;
        background-size: 1.5em;
    }

    #carouselControls {
        border: 1px solid;
        border-radius: 0.375rem;
        overflow: hidden;
        grid-column: 1;
        grid-row: 1;
    }

    #contentItem {
        grid-column: 2 / 4;
        grid-row: 1;
    }

    #descriptionItem {
        grid-column: 1 / 4;
        grid-row: 2;
    }

    .carousel-item > img {
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }

    #contentItem  *[contenteditable], #descriptionItem  *[contenteditable] {
        width: max-content;
        display: inline-block;
        min-width: 2em;
        max-width: 100%;
        text-wrap: pretty;
        background: var(--bs-secondary-bg);
        overflow: auto;
        padding: 0.375rem;
        border-radius: 0.375rem;
        vertical-align: middle;
    }
    #descriptionItem  *[contenteditable] {
        width: 100%;
    }
    #updateItemButton {
        bottom: 1em;
        right: 1em;
        position: fixed;
        display:none;
    }
    .form-check {
        margin: 0px;
        padding: 0px;
    }
    .form-check > * {
        float: left;
        padding: 0px;
    }
    .form-check > input {
        margin: 0.125em !important;
    }
    #imgs-carousel {
        width: 0px;
        height: 0px;
        border-top: 0px;
        position: relative;
        z-index: -1;
        padding: 0px;
        overflow: hidden;
    }
    #imgs-carousel[contenteditable] {
        width: 100%;
        min-height: 2em;
        height: fit-content;
        border-top: 1px solid;
        z-index: 2;
        padding: 0.25em;
        overflow: auto;
    }
    #contCategoryItem {
        display: none;
    }
    .dropdown-item{
        cursor:pointer;
    }
    @media (max-width: 991px){
        #container_item {
            padding: 12em 0px 3em 0px;
        }
    }
    @media (max-width: 768px){
        #container_item {
            grid-template-columns: repeat(1, 1fr);
        }
        #carouselControls {
            border: 1px solid;
            border-radius: 0.375rem;
            overflow: hidden;
            grid-column: 1;
            grid-row: 1;
        }

        #contentItem {
            grid-column: 1;
            grid-row: 2;
        }

        #descriptionItem {
            grid-column: 1;
            grid-row: 3;
        }
    }
    @media (max-width: 576px){
        #newCategoryButton {
            left: -2.75em;
        }
        #container_item {
            grid-template-columns: repeat(1, 1fr);
        }
        #carouselControls {
            border: 0px solid;
            border-radius: 0px;
        }
        .card{
            border-radius: 0px;
            border: 0px;
            border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
        }
        .card-text {
            height: inherit;
            border: inherit;
        }
        .card-title {
            height: inherit;
            overflow: inherit;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light p-2 position-fixed z-2 w-100">
    <a class="navbar-brand" href="/index"><img src="/storage/img/The_Doors_Logo.png" width="128" height="32" class="d-inline-block align-top" alt="/storage/img/The_Doors_Logo.png"></a>
    <div class="navbar-collapse">
        <ul class="navbar-nav" id="navbarNavDropdown">
            <li class="nav-item dropdown" id="categories_dropdown">
                <a class="nav-link dropdown-toggle disabled" href="#" id="dropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                CATEGORÍAS
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownCategories">
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="z-2" id="loginButton">
    <input type="checkbox" class="btn-check" id="inputLogin" autocomplete="off" checked="false">
    <label class="btn btn-primary" for="inputLogin">INICIAR SESIÓN</label>
</div>

<div class="container overflow-hidden" id="container_item">
    <div id="carouselControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/storage/img/no-img.png">
            </div>
            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
        
        <div id="imgs-carousel" class="adminEditable"></div>
    </div>
    <div id="contentItem">
        <h2 id="nameItem" class="adminEditable"></h2>
        <h6>PRECIO: <span id="priceItem" class="adminEditable"></span><span id="coinItem"></span></h6>
        <h6>MATERIAL: <span id="materialItem" class="adminEditable"></span></h6>
        <h6>ANCHURA: <span id="dimensionXItem" class="adminEditable"></span>cm</h6>
        <h6>ALTURA: <span id="dimensionYItem" class="adminEditable"></span>cm</h6>
        <h6>ESPESOR: <span id="dimensionZItem" class="adminEditable"></span>cm</h6>
        <h6>
            <div class="form-check">
                <label class="form-check-label" for="armoredItem">BLINDADA:</label>
                <input class="form-check-input adminEditable" type="checkbox" id="armoredItem" disabled>
            </div>
        </h6>
        <div id="contCategoryItem">
            <h6 class="nav-item dropdown" id="categories_dropdown_item">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownCategoriesItem" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORÍA</a>
                <div class="dropdown-menu" aria-labelledby="dropdownCategoriesItem">
                </div>
            </h6>
            <h6 id="categoryItem" category="22"></h6>
        </div>
        <button type="button" class="btn btn-primary" id="updateItemButton">ACTUALIZAR</button>
    </div>
    <h6 id="descriptionItem">
        <span id="descriptionItem2" class="adminEditable"></span>
    </h6>
</div>

<script>

    const ADMIN_BUTTON = document.querySelector('#inputLogin')
    let category_global = 0
    let admin = localStorage.getItem("admin") == 'true'
    toggleAdmin(false)
    ADMIN_BUTTON.parentElement.addEventListener("click",()=>{toggleAdmin(true)})
    
    start()

    async function start(){
        let item_id = getItem()
        if(item_id == 0){
            window.open(`/shop`,'_self')
        }
        let categories = await getData("api/categories")
        let items = await getData(`api/items/${item_id}`)
        layoutItems(items)
        layoutCategories(categories)
    }

    async function getData(apiUrl,category){
        let url = category == undefined ? `http://127.0.0.1:8000/${apiUrl}` : `http://127.0.0.1:8000/${apiUrl}?category=${category}`
        let data = await fetch(url).then(response=>{return response.json()})
        return data
    }

    async function setData(apiUrl,data,method){
        let url = `http://127.0.0.1:8000/${apiUrl}`
        let request
        if(method == "DELETE"){
            request = await fetch(url,{method:method})
        }else if(method == "PUT" || method == "POST"){
            request = await fetch(url,{method:method,headers:{"Content-Type": "application/json"},body:JSON.stringify(data)}).then(response=>{return response.json()})
        }
        
        return request
    }

    function toggleAdmin(reload){
        if(admin === true){
            ADMIN_BUTTON.checked = false
            ADMIN_BUTTON.nextElementSibling.textContent = 'CERRAR SESIÓN'
            if(reload){
                admin = false
                localStorage.setItem("admin", false);
            }
        }else if (admin === false){
            ADMIN_BUTTON.checked = true
            ADMIN_BUTTON.nextElementSibling.textContent = 'INICIAR SESIÓN'
            if(reload){
                admin = true
                localStorage.setItem("admin", true);
            }
        }
        if(reload){
            location.reload();
        }
    }

    function layoutCategories(categories){
        const DROP_MENU = document.querySelector('#categories_dropdown > .dropdown-menu')
        const DROP_MENU_ITEM = document.querySelector('#categories_dropdown_item > .dropdown-menu')
        const DROP_BUTTON = document.querySelector('#dropdownCategories')
        const CATEGORY_ITEM = document.querySelector('#categoryItem')
        const NAB_BAR = document.querySelector('#navbarNavDropdown')
        
        let category = getCategory() - 1
        categories.forEach(cat=>{
            DROP_MENU.insertAdjacentHTML('beforeend',`<a class="dropdown-item" href="/shop?category=${cat.id}" category="${cat.id}">${cat.name}</a>`)
            DROP_MENU_ITEM.insertAdjacentHTML('beforeend',`<a class="dropdown-item" category="${cat.id}">${cat.name}</a>`)
        })
        DROP_BUTTON.classList.remove('disabled')
        if(categories.length > 0){
            category++
            if(categories.find(({ id }) => id == category) != undefined){
                DROP_BUTTON.innerText = categories.find(({ id }) => id == category).name
                CATEGORY_ITEM.innerText = categories.find(({ id }) => id == category).name
                CATEGORY_ITEM.attributes.category.value = category
            }
        }
        if(admin){
            NAB_BAR.insertAdjacentHTML('afterbegin',`\
            <li class="nav-item">\
                <div class="form-group mx-sm-3 mb-2 d-inline-block">\
                    <input type="text" class="form-control" id="newCategoryInput" placeholder="NUEVA CATEGORÍA">\
                </div>\
                <button type="submit" class="btn btn-primary mb-2" id="newCategoryButton">✚</button>\
            </li>`)
            const NEW_CATEGORY_BUTTON = document.querySelector('#newCategoryButton')
            const CATEGORIES = document.querySelectorAll("#categories_dropdown .dropdown-item[category]")
            CATEGORIES.forEach(category=>{
                category.insertAdjacentHTML('beforeend','<div class="cross-delete">✚</div>')
                const DELETE = category.querySelector('.cross-delete')
                DELETE.addEventListener("click",async (event)=>{
                    event.stopPropagation()
                    event.preventDefault()
                    category = getCategory()
                    const THIS_CATEGORY = DELETE.parentElement.attributes.category.value
                    const DATA = {"id":THIS_CATEGORY}
                    const RESPONSE = await setData(`api/categories/${THIS_CATEGORY}`,DATA,"DELETE")
                    if(THIS_CATEGORY == category){
                        window.open(`/shop`,'_self')
                    }else{
                        DELETE.parentElement.remove()
                    }
                })
            })
            NEW_CATEGORY_BUTTON.addEventListener("click",async ()=>{
                const NEW_CATEGORY_INPUT = document.querySelector('#newCategoryInput')
                const DATA = {"name":NEW_CATEGORY_INPUT.value}
                const RESPONSE = await setData("api/categories",DATA,"POST")
                category = RESPONSE.id
                window.open(`/shop?category=${category}`,'_self')
            })
            
            const CATEGORIES_ITEM = document.querySelectorAll("#categories_dropdown_item .dropdown-item[category]")
            CATEGORIES_ITEM.forEach(category=>{
                category.addEventListener("click",()=>{
                    CATEGORY_ITEM.innerText = category.innerText
                    CATEGORY_ITEM.attributes.category.value = category.attributes.category.value
                })
            })

        }
    }

    function layoutItems(items){
        let item_id = items.id
        let item_name = items.name
        let item_category_id = items.category_id
        let item_material = items.material
        let item_price = items.price
        let item_dimension = items.dimension
        let item_description = items.description
        let item_images = items.images
        let item_armored = items.armored
        let item_hidden = items.hidden

        category_global = item_category_id

        document.querySelector("#nameItem").innerText = item_name
        document.querySelector("#priceItem").innerText = item_price.amount/100
        document.querySelector("#coinItem").innerText = item_price.currency
        document.querySelector("#materialItem").innerText = item_material
        document.querySelector("#dimensionXItem").innerText = item_dimension.X
        document.querySelector("#dimensionYItem").innerText = item_dimension.Y
        document.querySelector("#dimensionZItem").innerText = item_dimension.Z
        document.querySelector("#descriptionItem2").innerText = item_description
        document.querySelector("#imgs-carousel").innerText = item_images
        document.querySelector("#armoredItem").checked = item_armored == "1" ? true : false

        const CAROUSEL_IMGS = document.querySelector("#carouselControls > .carousel-inner")
        if(item_images.length != 0){
            item_images = JSON.parse(item_images)
            CAROUSEL_IMGS.querySelector(".carousel-item").remove()
            item_images.forEach((image,index)=>{
                CAROUSEL_IMGS.insertAdjacentHTML('beforeend',`\
                    <div class="carousel-item ${index == 0 ? "active" : ""}">
                        <img class="d-block w-100" src="${image}">
                    </div>`)
            })
        }

        if(admin){
            const EDITABLES = document.querySelectorAll(".adminEditable")
            const UPDATE_BUTTON = document.querySelector("#updateItemButton")
            const CATEGORY_CONT = document.querySelector("#contCategoryItem")
            UPDATE_BUTTON.style.display = "block"
            CATEGORY_CONT.style.display = "block"
            EDITABLES.forEach(edit=>{
                if(edit.type == "checkbox"){
                    edit.disabled = false
                }else{
                    edit.contentEditable = true
                }
            })
            UPDATE_BUTTON.addEventListener("click",async ()=>{
                item_name = document.querySelector("#nameItem").innerText
                item_material = document.querySelector("#materialItem").innerText
                item_description = document.querySelector("#descriptionItem2").innerText
                item_dimension = `${document.querySelector("#dimensionXItem").innerText}x${document.querySelector("#dimensionYItem").innerText}x${document.querySelector("#dimensionZItem").innerText}`
                item_price = Math.round(document.querySelector("#priceItem").innerText * 100)%10 == 9 ? Math.round(document.querySelector("#priceItem").innerText * 100) + 1 : Math.round(document.querySelector("#priceItem").innerText * 100)
                item_armored = document.querySelector("#armoredItem").checked ? 1 : 0
                item_images = document.querySelector("#imgs-carousel").innerText == "" ? "[]" : JSON.stringify(document.querySelector("#imgs-carousel").innerText)
                item_id = item_id
                item_hidden = item_hidden
                item_category_id = document.querySelector("#categoryItem").attributes.category.value
                const DATA = {
                    "id":item_id,
                    "name":item_name,
                    "material":item_material,
                    "dimension":item_dimension,
                    "price":item_price,
                    "armored":item_armored,
                    "images":item_images,
                    "hidden":item_hidden,
                    "description":item_description,
                    "category_id":item_category_id
                }
                const RESPONSE = await setData(`api/items/${item_id}`,DATA,"PUT")
                category = RESPONSE.id
                location.reload()
            })
        }
    }

    function getCategory(){
        let category = category_global
        return category
    }

    function getItem(){
        let item = 0
        window.location.search.slice(1).split("&").forEach((search)=>{
            if(search.split("=")[0] == "id"){
                item = search.split("=")[1]
            }
        })
        return item
    }
</script>