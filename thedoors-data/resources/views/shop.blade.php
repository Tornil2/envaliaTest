
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

    #container_shop {
        display: grid;
        grid-gap: 2em;
        grid-template-columns: repeat(4, 1fr);
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
        right: 01em;
        background-color: var(--bs-danger-bg-subtle);
        cursor: pointer;
    }

    .cross-delete:hover {
        scale: 1.125;
    }

    .card > .cross-delete {
        top: 1em;
    }
    .card > img {
        aspect-ratio: 1 / 1;
    }
    @media (max-width: 991px){
        #container_shop {
            grid-template-columns: repeat(3, 1fr);
            padding: 7em 0px 3em 0px;
        }
    }
    @media (max-width: 768px){
        #container_shop {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 576px){
        #newCategoryButton {
            left: -2.75em;
        }
        #container_shop {
            grid-template-columns: repeat(1, 1fr);
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

<div class="container overflow-hidden" id="container_shop">
    
</div>

<script>

    const ADMIN_BUTTON = document.querySelector('#inputLogin')
    
    let admin = localStorage.getItem("admin") == 'true'
    toggleAdmin(false)
    ADMIN_BUTTON.parentElement.addEventListener("click",()=>{toggleAdmin(true)})
    
    start()

    async function start(){
        let category = getCategory()
        let categories = await getData("api/categories")
        let items = await getData("api/items",category)
        layoutCategories(categories)
        layoutItems(items)
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
        const DROP_BUTTON = document.querySelector('#dropdownCategories')
        const NAB_BAR = document.querySelector('#navbarNavDropdown')
        
        let category = getCategory() - 1
        categories.forEach(cat=>{
            DROP_MENU.insertAdjacentHTML('beforeend',`<a class="dropdown-item" href="/shop?category=${cat.id}" category="${cat.id}">${cat.name}</a>`)
        })
        DROP_BUTTON.classList.remove('disabled')
        if(categories.length > 0){
            category++
            if(categories.find(({ id }) => id == category) != undefined){
                DROP_BUTTON.innerText = categories.find(({ id }) => id == category).name
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
            const CATEGORIES = document.querySelectorAll(".dropdown-item[category]")
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
        }
    }

    function layoutItems(items){
        const CONTAINER_SHOP = document.querySelector('#container_shop')
        const PREV_PAGE = items.links
        
        let category = getCategory()
        let item_id = 0
        items.data.forEach(item=>{
            item_id = item.id
            const ITEM_NAME = item.name
            const ITEM_DESCRIPTION = item.description
            const ITEM_PRICE = item.price
            const ITEM_IMAGE = item.images == "[]" ? '/storage/img/no-img.png' : JSON.parse(JSON.parse(item.images))
            CONTAINER_SHOP.insertAdjacentHTML('beforeend',`\
            <div class="card text-center" items="${item_id}">\
                <img src="${ITEM_IMAGE}" class="card-img-top" alt="${ITEM_IMAGE}">\
                <div class="card-body">\
                    <h5 class="card-title">${ITEM_NAME}</h5>\
                    <p class="card-text text-start">${ITEM_DESCRIPTION}</p>\
                    <a href="/item?id=${item_id}" class="btn btn-primary">VER MÁS</a>\
                </div>\
            </div>`)
        })
        if(admin){
            const CARDS_ITEMS = document.querySelectorAll('.card')
            CARDS_ITEMS.forEach(card=>{
                card.insertAdjacentHTML('afterbegin','<div class="cross-delete">✚</div>')
                const DELETE = card.querySelector('.cross-delete')
                DELETE.addEventListener("click",async (event)=>{
                    category = getCategory()
                    const THIS_ITEM = card.attributes.items.value
                    const DATA = {"id":THIS_ITEM}
                    const RESPONSE = await setData(`api/items/${THIS_ITEM}`,DATA,"DELETE")
                    DELETE.parentElement.remove()
                })
            })
            if(category != 0){
                CONTAINER_SHOP.insertAdjacentHTML('beforeend',`\
                <div class="card text-center">\
                    <img src="/storage/img/nuevo.png" class="card-img-top" alt="/storage/img/nuevo.png">\
                    <div class="card-body">\
                        <h5 class="card-title">NUEVO OBJETO</h5>\
                        <p class="card-text text-start">DESCRIPCIÓN</p>\
                        <a class="btn btn-primary" id="newItemButton">CREAR OBJETO</a>\
                    </div>\
                </div>`)
                const NEW_ITEM_BUTTON = document.querySelector('#newItemButton')
                NEW_ITEM_BUTTON.addEventListener("click",async ()=>{
                    const DATA = {
                        "name":"NUEVO OBJETO",
                        "category_id":category,
                        "material":"MATERIAL",
                        "price":"10000",
                        "dimension":"90x200x9",
                        "description":"DESCRIPCIÓN",
                        "images":"[]",
                        "armored":"0",
                        "hidden":"0"
                    }
                    const RESPONSE = await setData("api/items",DATA,"POST")
                    location.reload()
                })
            }
        }
    }

    function getCategory(){
        let category = 0
        window.location.search.slice(1).split("&").forEach((search)=>{
            if(search.split("=")[0] == "category"){
                category = search.split("=")[1]
            }
        })
        return category
    }
</script>