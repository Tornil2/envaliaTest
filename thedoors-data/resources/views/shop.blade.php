
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

<!--
http://localhost:8000/storage/img/The_Doors_Logo.png
-->


<nav class="navbar navbar-expand-lg navbar-light bg-light p-2 position-fixed z-2 w-100">
    <a class="navbar-brand" href="/index"><img src="/storage/img/The_Doors_Logo.png" width="128" height="32" class="d-inline-block align-top" alt="/storage/img/The_Doors_Logo.png"></a>
    <div class="navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="form-group mx-sm-3 mb-2 d-inline-block">
                    <input type="text" class="form-control" id="newCategoryInput" placeholder="NUEVA CATEGORÍA">
                </div>
                <button type="submit" class="btn btn-primary mb-2" id="newCategoryButton">✚</button>
            </li>
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

<div class="container overflow-hidden" id="container_shop">
    
</div>

<script>

    let admin = true

    start()

    async function start(){
        let category = getCategory()
        let categories = await getData("api/categories")
        let items = await getData("api/items",category)
        console.log("categories",categories,"items",items)
        layoutCategories(categories)
        layoutItems(items)
    }

    async function getData(apiUrl,category){
        console.log(category)
        let url = category == undefined ? `http://127.0.0.1:8000/${apiUrl}` : `http://127.0.0.1:8000/${apiUrl}?category=${category}`
        let data = await fetch(url).then(response=>{return response.json()})
        return data
    }

    function layoutCategories(categories){
        const DROP_MENU = document.querySelector('#categories_dropdown > .dropdown-menu')
        const DROP_BUTTON = document.querySelector('#dropdownCategories')
        
        let category = getCategory() - 1
        categories.forEach(cat=>{
            DROP_MENU.insertAdjacentHTML('beforeend',`<a class="dropdown-item" href="?category=${cat.id}">${cat.name}</a>`)
        })
        DROP_BUTTON.classList.remove('disabled')
        if(categories.length > 0){
            console.log(categories,category,categories[category].name)
            DROP_BUTTON.innerText = categories[category].name
        }
        if(admin){
            //DROP_MENU.insertAdjacentHTML('beforeend',`<span class="dropdown-item">NUEVA CATEGORÍA</span>`)
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
            const ITEM_IMAGE = JSON.parse(JSON.parse(item.images))
            console.log("ITEM_IMAGES",ITEM_IMAGE)
            CONTAINER_SHOP.insertAdjacentHTML('beforeend',`\
            <div class="card text-center">\
                <img src="${ITEM_IMAGE}" class="card-img-top" alt="${ITEM_IMAGE}">\
                <div class="card-body">\
                    <h5 class="card-title">${ITEM_NAME}</h5>\
                    <p class="card-text text-start">${ITEM_DESCRIPTION}</p>\
                    <a href="/item?id=${item_id}" class="btn btn-primary">VER MÁS</a>\
                </div>\
            </div>`)
        })
        if(admin){
            CONTAINER_SHOP.insertAdjacentHTML('beforeend',`\
            <div class="card text-center">\
                <img src="/storage/img/nuevo.png" class="card-img-top" alt="/storage/img/nuevo.png">\
                <div class="card-body">\
                    <h5 class="card-title">NUEVO OBJETO</h5>\
                    <p class="card-text text-start">DESCRIPCIÓN</p>\
                    <a href="/item?id=${item_id+1}" class="btn btn-primary">CREAR OBJETO</a>\
                </div>\
            </div>`)
        }
    }

    function getCategory(){
        let category 
        window.location.search.slice(1).split("&").forEach((search)=>{
            if(search.split("=")[0] == "category"){
                category = search.split("=")[1]
            }
        })
        return category
    }
</script>