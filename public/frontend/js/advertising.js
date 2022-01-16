 const array=[
    {
        id:28,
        image:'productSting(bottle)28.jpg',
        name:'Sting',
    },
    {
        id:31,
        image:'productSting(Can).jpg',
        name:'Sting',
    },
    {
        id:32,
        image:'productVinamilk.jpg',
        name:'Vinamilk',
    },
    {
        id:33,
        image:'productbia33.jpg',
        name:'Beer'
    },
    {
        id:34,
        image:'productAquafina.jpeg',
        name:'Aquafina'
    }
]
function check_length(e){
    (e>=array.length-1)?e=0:e++;
    return e;
}
let i=0;
$('.left-sidebar').append(`
    <div class="brands_products">                           
    <div class="content"></div>
    </div>`
);
    const setInter=setInterval(() => {
        
    $('.left-sidebar >.brands_products >.content').empty();
    $('.left-sidebar >.brands_products >.content').append(`
       <h2>Advertising</h2>
       <div class="brands-name">
           <ul class="nav nav-pills nav-stacked advertising" style="display:flex">
               <li><a href="/product-details/${array[i]['id']}"><img src="backend/uploads/product/${array[i]['image']}" width="120"
               height="auto" /></a>
               </li>
               <li>
                    <h3 class="sale-up">Sale up 50%</h3>
                    <p>${array[i]['name']}</p>
               </li>
           </ul>
    </div>`);
    i=check_length(i);
    }, 10000);
    $('.brands_products >.content').empty();

// clearInterval(setInter);